<?php

/**
* "Controller"-esque class for handling remote requests for the control panel's photowall image management user interface
*/
class ISC_ADMIN_PHOTOWALL_IMAGE extends ISC_ADMIN_BASE {

	/**
	* Remote request router for photowall image management
	*
	* @param ISC_ADMIN_REMOTE $remote
	*/
	public function routeRemoteRequest(ISC_ADMIN_REMOTE $remote)
	{
		$methodName = 'remote' . ucfirst(preg_replace('#[^a-zA-Z0-9]#', '', $_REQUEST['photowallimageshandler']));
		if (!method_exists($this, $methodName)) {
			throw new Exception("No handler found for: " . $_REQUEST['photowallimageshandler']);
		}

		// load language files we need
		$GLOBALS['ISC_CLASS_ADMIN_ENGINE']->LoadLangFile('photowalls');
		$GLOBALS['ISC_CLASS_ADMIN_ENGINE']->LoadLangFile('imagemanager');

		return $this->$methodName($remote);
	}

	/**
	* Handler for accepting a new photowall image via browser upload
	*
	* @param ISC_ADMIN_REMOTE $remote
	*/
	public function remoteNewImageUpload(ISC_ADMIN_REMOTE $remote)
	{
		$response = array(
			'error' => false,
			'files' => array(),
		);
		
		try {
			ISC_UPLOADHANDLER::processUploads();

			$files = ISC_UPLOADHANDLER::getAllFiles();

			foreach ($files as $file) {
				// each $file is instance of UploadHandlerFile

				$responseFile = array(
					'fieldName' => $file->fieldName,
					'name' => $file->name,
					'error' => false,
				);

				$response['files'][] = &$responseFile;

				// check if the individual image was uploaded correctly
				if (!$file->getSuccess()) {
					$responseFile['error'] = $file->getErrorMessage();
					continue;
				}

				// move the image out of php's tmp directory so functions that aren't exempt from open_basedir restrictions can access it
				while (true) {
					$temporaryPath = ISC_CACHE_DIRECTORY . 'photowallimage_' . ISC_PHOTOWALL_IMAGE::randomString(16) . '.' . $file->getExtension();

					if (!file_exists($temporaryPath)) {
						break;
					}
				}

				try {
					$file->moveAs($temporaryPath);
				} catch (UploadHandlerFileMoveNotWritableException $exception) {
					$responseFile['error'] = $exception->getMessage();
					continue;
				}

				try {
					$image = ISC_PHOTOWALL_IMAGE::importImage($temporaryPath, $file->name);	
				} catch (ISC_PHOTOWALL_IMAGE_IMPORT_EXCEPTION $exception) {
					// these exceptions should have language-powered messages so are safe to return to the user
					$responseFile['error'] = $exception->getMessage();
					@unlink($temporaryPath);
					continue;
				} catch (Exception $exception) {
					// other unknown error
					$responseFile['error'] = GetLang('PhotowallImageProcessUnknownError');
					@unlink($temporaryPath);
					continue;
				}

				try {
					$preview = $image->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_THUMBNAIL, true);
					$zoom = $image->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_ZOOM, true);
				} catch (ISC_PHOTOWALL_IMAGE_SOURCEFILEDOESNTEXIST_EXCEPTION $exception) {
					$preview = false;
					$zoom = false;
				}

				// these field names should match the constructor of the javascript PhotowallImages.Image object, see /admin/script/photowall.images.js, or search for "PhotowallImages.Image = function" if it gets moved
				// not all fields are mandatory though
				$responseFile['preview'] = $preview;
				$responseFile['zoom'] = $zoom;
				$responseFile['description'] = $image->getDescription();
				$responseFile['sort'] = $image->getSort();
			}

		} catch (UploadHandlerProcessNoInputException $ex) {
			$response['error'] = $ex->getMessage();

		} catch (UploadHandlerProcessPostSizeException $ex) {
			$response['error'] = $ex->getMessage();

		} catch (Exception $ex) {
			$response['error'] = 'Unhandled exception: ' . $ex->getMessage();

		}

		die(isc_json_encode($response));
	}

	/**
	* Handler for accepting a new photowall images from the image manager or other photowalls
	*
	* @param ISC_ADMIN_REMOTE $remote
	*/
	public function remoteUseSourceImages(ISC_ADMIN_REMOTE $remote)
	{
		GetLib('class.imagedir');
		$db = $GLOBALS["ISC_CLASS_DB"];

		$sourceImages = @$_POST['images'];

		$tags = array();
		$errors = array();
		$images = array();

		if (empty($errors) && count($sourceImages)) {
			// only proceed if they had images selected
			$imageDir = new ISC_IMAGEDIR();

			foreach ($sourceImages as $imageId) {

				if(substr($imageId, 0, strlen('photowallimage_')) == 'photowallimage_') {
					// image from another photowall
					$photowallImageId = (int)str_replace('photowallimage_', '', $imageId);
					$photowallImage = new ISC_PHOTOWALL_IMAGE($photowallImageId);
					$sourceFilePath = $photowallImage->getAbsoluteSourceFilePath();
					$originalFilename = $photowallImage->getFileName();

				} elseif (substr($imageId, 0, strlen('imagemanager_')) == 'imagemanager_') {
					// image from the image manager
					$imageManagerId = str_replace('imagemanager_', '', $imageId);
					$originalFilename = $imageDir->findFileNameById($imageManagerId);
					$sourceFilePath = $imageDir->GetImagePath() . '/' . $originalFilename;

				} else {
					// not a valid selection
					continue;
				}

				try {
				$image = ISC_PHOTOWALL_IMAGE::importImage($sourceFilePath, $originalFilename, false, false);
				} catch (ISC_PHOTOWALL_IMAGE_IMPORT_INVALIDIMAGEFILE_EXCEPTION $exception) {
					$errors[] = $url . ": " . $exception->getMessage() . ' ' . GetLang('PhotowallImageInvalidFileFromSource');
					continue;
				} catch (ISC_PHOTOWALL_IMAGE_IMPORT_EXCEPTION $exception) {
					// these exceptions should have language-powered messages so are safe to return to the user
					$errors[] = $url . ": " . $exception->getMessage();
					continue;
				} catch (Exception $exception) {
					// other unknown error
					$errors[] = $url . ': ' . GetLang('PhotowallImageProcessUnknownError') . var_dump($exception);
					continue;
				}

				// all done, add to list of successful images
				$images[] = $image;
			}
		}

		foreach ($images as /*ISC_PHOTOWALL_IMAGE*/$image) {
			$json = array(
				'id' => $image->getPhotowallImageId(),
				'preview' => $image->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_THUMBNAIL, true),
				'zoom' => $image->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_ZOOM, true),
				'description' => $image->getDescription(),
				'baseThumbnail' => $image->getIsThumbnail(),
				'sort' => $image->getSort(),
			);

			$tags[] = $remote->MakeXMLTag('image', isc_json_encode($json), true);
		}

		foreach ($errors as $message) {
			$tags[] = $remote->MakeXMLTag('error', $message, true);
		}

		$remote->SendXMLHeader();
		$remote->SendXMLResponse($tags);
		die();
	}

	/**
	* Processor for importing an image via external URL
	*
	* @param int|string $photowallId Id of a photowall to import images to, or  of a photowall being created if $ is true
	* @param array $urls A list of image urls to import
	* @param array $images By reference blank array to be populated with successful images
	* @param array $errors By reference blank array to be populated with errors - each element may be a string or an array(url, error)
	* @param bool $ If true, $photowallId will be treated as a photowall 
	* @param bool $generateImages If true, when importing, will attempt to generate thumbnail images -- may not be desirable if importing many images at once
	*/
	public function importImagesFromUrls($urls, &$images, &$errors, $hash = false, $generateImages = true)
	{
		foreach ($urls as $originalUrl) {
			$url = $originalUrl;
			if (!preg_match('#^[a-zA-Z0-9\.]+://#i', $url)) {
				// no scheme provided in the url, assume http
				$url = 'http://' . $url;
			}

			$urlInfo = @parse_url($url);

			if (!$urlInfo) {
				$errors[] = array($originalUrl, sprintf(GetLang('PhotowallImageInvalidUrl'), $originalUrl));
				continue;
			}

			if ($urlInfo['scheme'] != 'http' && $urlInfo['scheme'] != 'https') {
				$errors[] = array($originalUrl, sprintf(GetLang('PhotowallImageHttpOnly'), $originalUrl));
				continue;
			}

			$response = PostToRemoteFileAndGetResponse($url, '', 90, $ptrfError);

			if (!$response) {
				// show error with details from PostToRemoteFileAndGetResponse

				switch ($ptrfError) {
					case ISC_REMOTEFILE_ERROR_TIMEOUT:
						$error = GetLang('PhotowallImageCouldNotBeDownloadedTimeout');
						break;

					case ISC_REMOTEFILE_ERROR_HTTPERROR:
						$error = GetLang('PhotowallImageCouldNotBeDownloadedHttpError');
						break;

					case ISC_REMOTEFILE_ERROR_EMPTY:
						$error = GetLang('PhotowallImageCouldNotBeDownloadedEmpty');
						break;

					case ISC_REMOTEFILE_ERROR_DNSFAIL:
						$error = GetLang('PhotowallImageCouldNotBeDownloadedDns');
						break;

					default:
						$error = sprintf(GetLang('PhotowallImageCouldNotBeDownloadedOther'), $ptrfError);
						break;
				}
				$errors[] = array($originalUrl, $error);
				continue;
			}

			// to work correctly with the photowall image 'import' process the image must be a file, so save it to the cache directory temporarily
			while (true) {
				// we can name it .tmp because the extension will be corrected after the image type is detected
				$temporaryPath = ISC_CACHE_DIRECTORY . 'photowallimage_' . ISC_PHOTOWALL_IMAGE::randomString(16) . '.tmp';

				if (!file_exists($temporaryPath)) {
					break;
				}
			}

			$fh = @fopen($temporaryPath, 'wb');
			if (!$fh) {
				$errors[] = array($originalUrl, GetLang('PhotowallImageCacheWriteError'));
				continue;
			}

			if (!@fwrite($fh, $response)) {
				$errors[] = array($originalUrl, GetLang('PhotowallImageCacheWriteError'));
				@fclose($fh);
				continue;
			}

			@fclose($fh);

			// determine original filename based on request path
			$originalFilename = @$urlInfo['path'];
			if ($originalFilename) {
				$pathInfo = pathinfo($urlInfo['path']);
			}

			if ($originalFilename && $pathInfo['basename']) {
				$originalFilename = $pathInfo['basename'];
			} else {
				// if no original filename was specified (e.g.: the image was the result of a script like http://www.example.com/) then generate a random name for it
				// don't need an extension because importImage will add the correct one for the type of image it is
				$originalFilename = 'image' . ISC_PHOTOWALL_IMAGE::randomString(3);
			}

			try {
				$image = ISC_PHOTOWALL_IMAGE::importImage($temporaryPath, $originalFilename, true, $generateImages);
			} catch (ISC_PHOTOWALL_IMAGE_IMPORT_INVALIDIMAGEFILE_EXCEPTION $exception) {
				$errors[] = array($originalUrl, $exception->getMessage() . ' ' . GetLang('PhotowallImageInvalidFileFromWeb'));
				@unlink($temporaryPath);
				continue;
			} catch (ISC_PHOTOWALL_IMAGE_IMPORT_EXCEPTION $exception) {
				// these exceptions should have language-powered messages so are safe to return to the user
				$errors[] = array($originalUrl, $exception->getMessage());
				@unlink($temporaryPath);
				continue;
			} catch (Exception $exception) {
				// other unknown error
				$errors[] = array($originalUrl, GetLang('PhotowallImageProcessUnknownError'));
				@unlink($temporaryPath);
				continue;
			}

			// all done, add to list of successful images
			$images[] = $image;
		}
	}
	/**
	* Handler for accepting a new photowall image via external URL
	*
	* @param ISC_ADMIN_REMOTE $remote
	*/
	public function remoteNewImageWeb(ISC_ADMIN_REMOTE $remote)
	{
		$db = $GLOBALS["ISC_CLASS_DB"];

		$imageUrls = @$_POST['imageurls'];

		$tags = array();
		$errors = array();
		$images = array();

		if (empty($errors)) {
			if (is_array($imageUrls)) {
				// remove blank urls from array -- do this first so that the count() check next will catch an array of all blank urls and give the proper error
				foreach ($imageUrls as $index => $url) {
					$url = trim($url);
					$imageUrls[$index] = $url;

					if (!$url || $url == 'http://') {
						unset($imageUrls[$index]);
						continue;
					}
				}
			}

			if (!is_array($imageUrls) || empty($imageUrls)) {
				$errors[] = GetLang('PhotowallImageNoUrls');
			}
		}

		if (empty($errors)) {
			// no errors in initial validation -- try processing the images
				$this->importImagesFromUrls($imageUrls, $images, $errors);
		}

		foreach ($images as $image) {
			/** @var ISC_PHOTOWALL_IMAGE $image */
			try {
				$preview = $image->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_THUMBNAIL, true);
				$zoom = $image->getResizedUrl(ISC_PHOTOWALL_IMAGE_SIZE_ZOOM, true);
			} catch (ISC_PHOTOWALL_IMAGE_SOURCEFILEDOESNTEXIST_EXCEPTION $exception) {
				$preview = false;
				$zoom = false;
			}

			$json = array(
				'id' => $image->getPhotowallImageId(),
				'preview' => $preview,
				'zoom' => $zoom,
				'description' => $image->getDescription(),
				'baseThumbnail' => $image->getIsThumbnail(),
				'sort' => $image->getSort(),
			);

			$tags[] = $remote->MakeXMLTag('image', isc_json_encode($json), true);
		}

		foreach ($errors as $message) {
			if (is_array($message)) {
				$tags[] = $remote->MakeXMLTag('error', $message[1], true, array('url' => $message[0]));
			} else {
				$tags[] = $remote->MakeXMLTag('error', $message, true);
			}
		}

		$remote->SendXMLHeader();
		$remote->SendXMLResponse($tags);
		die();
	}

	/**
	* Handler for accepting a new photowall image via a gallery selection
	*
	* @param ISC_ADMIN_REMOTE $remote
	*/
	public function remoteNewImageExisting(ISC_ADMIN_REMOTE $remote)
	{
		throw new Exception('Not Yet Implemented');
	}

	public function remoteDeleteMultiple(ISC_ADMIN_REMOTE $remote)
	{
		$db = $GLOBALS["ISC_CLASS_DB"];

		$deletes = array();
		$errors = array();
		$warnings = array();
		$newThumbnailId = null;

		if (!isset($_POST['images']) || !is_array($_POST['images'])) {
			$response['error'] = GetLang('InvalidPhotowallImageId');
			die(isc_json_encode($response));
		}

		$_POST['images'] = array_unique(@$_POST['images']);

		foreach ($_POST['images'] as $imageId) {
			if (!(int)$imageId) {
				$errors[$imageId] = GetLang('InvalidPhotowallImageId');
				continue;
			}

			$imageId = (int)$imageId;

			try {
				$image = new ISC_PHOTOWALL_IMAGE($imageId);
			} catch (ISC_PHOTOWALL_IMAGE_RECORDNOTFOUND_EXCEPTION $exception) {
				// record was not found in database, so it's already been deleted, mark it as deleted and skip it
				$deletes[] = $imageId;
				continue;
			} catch (Exception $exception) {
				// some other error occurred when trying to load the image, note it in errors list
				$errors[$imageId] = GetLang('PhotowallImageDeleteDatabaseError');
				continue;
			}


			try {
				$image->delete(true, true, $newThumbnailId);
				$deletes[] = $imageId;
			} catch (ISC_PHOTOWALL_IMAGE_CANNOTDELETEFILE_EXCEPTION $exception) {
				// indicates that the record was deleted but files weren't
				$deletes[] = $imageId;
				$warnings[$imageId] = GetLang('PhotowallImageDeleteFileDeleteError');
			} catch (Exception $exception) {
				// any other error indicates a failure to delete the record
				$errors[$imageId] = GetLang('PhotowallImageDeleteUnknownError');
			}
		}

		$tags = array();

		foreach ($errors as $imageId => $message) {
			$tags[] = $remote->MakeXMLTag('error', $message, true, array('image' => $imageId));

		}

		foreach ($warnings as $imageId => $message) {
			$tags[] = $remote->MakeXMLTag('warning', $message, true, array('image' => $imageId));
		}

		foreach ($deletes as $imageId) {
			$tags[] = $remote->MakeXMLTag('delete', false, false, array('image' => $imageId));
		}

		if ($newThumbnailId) {
			$tags[] = $remote->MakeXMLTag('thumbnail', false, false, array('image' => $newThumbnailId));
		}

		$remote->SendXMLHeader();
		$remote->SendXMLResponse($tags);
		die();
	}

	public function remoteDelete(ISC_ADMIN_REMOTE $remote)
	{
		// route to deleteMultiple with a single image argument
		$_POST['images'] = array((int)$_POST['image']);
		unset($_POST['image']);
		$this->remoteDeleteMultiple($remote);
	}
	/**
	* Takes a photowall image id and makes it the base thumbnail image for it's photowall.
	*
	* @param ISC_ADMIN_REMOTE $remote
	*/
	public function remoteUpdateBaseThumbnail(ISC_ADMIN_REMOTE $remote)
	{
		$imageId = (int)$_POST['image'];

		$response = array();

		try {
			$image = new ISC_PHOTOWALL_IMAGE($imageId);

			$image->setIsThumbnail(true);
			$image->saveToDatabase(false);
			$response[] = $remote->MakeXMLTag('success', GetLang('PhotowallImageBaseThumbnailUpdated'), true);
		} catch (Exception $exception) {
			// if necessary, capture specific exceptions to create friendly error messages, but, for the most part, the exceptions generated by ISC_PHOTOWALL_IMAGE are language based
			$response[] = $remote->MakeXMLTag('error', $exception->getMessage());
		}

		$remote->SendXMLHeader();
		$remote->SendXMLResponse($response);
		die();
	}
	/**
	* Takes a photowall image id and description and updates the record in the database accordingly
	*
	* @param ISC_ADMIN_REMOTE $remote
	*/
	public function remoteUpdateImageDescription(ISC_ADMIN_REMOTE $remote)
	{
		$imageId = (int)$_POST['image'];
		$description = trim(@$_POST['description']);

		$response = array();
		try {
			$image = new ISC_PHOTOWALL_IMAGE();

			$image->loadFromDatabase($imageId);
			$image->setDescription($description);
			$image->saveToDatabase(false);
			$response[] = $remote->MakeXMLTag('success', GetLang('PhotowallImageDescriptionUpdated'), true);
		} catch (Exception $exception) {
			// if necessary, capture specific exceptions to create friendly error messages, but, for the most part, the exceptions generated by ISC_PHOTOWALL_IMAGE are language based
			$response[] = $remote->MakeXMLTag('error', $exception->getMessage(), true);
		}

		$remote->SendXMLHeader();
		$remote->SendXMLResponse($response);
		die();
	}

	/**
	* Takes a photowall id and photowall image id and modifies the sorting values of all affected photowall images to "move this image after another image"
	*
	* @param ISC_ADMIN_REMOTE $remote
	*/
	public function remoteMoveImageAfterOtherImage(ISC_ADMIN_REMOTE $remote)
	{
		// this method is used instead of simply receiving a full serialize of the new photowall order, it allows us to update more efficiently by knowing which image was moved and only updating the affected sort orders

		$response = array();

		if (!empty($response)) {
			$remote->SendXMLHeader();
			$remote->SendXMLResponse($response);
			die();
		}

		$moveId = (int)$_POST['move'];

		try {
			$moveImage = new ISC_PHOTOWALL_IMAGE($moveId);
		} catch (ISC_PHOTOWALL_IMAGE_INVALIDID_EXCEPTION $e) {
			$response[] = $remote->MakeXMLTag('error', sprintf(GetLang('PhotowallImageInvalidId'), $moveId), true);
		} catch (ISC_PHOTOWALL_IMAGE_RECORDNOTFOUND_EXCEPTION $e) {
			$response[] = $remote->MakeXMLTag('error', sprintf(GetLang('PhotowallImageNotFound'), $moveId), true);
		} catch (Exception $e) {
			$response[] = $remote->MakeXMLTag('error', GetLang('PhotowallImageMoveDatabaseError'), true);
		}

		if (!empty($response)) {
			$remote->SendXMLHeader();
			$remote->SendXMLResponse($response);
			die();
		}

		$moveSort = $moveImage->getSort();

		if (isset($_POST['after'])) {
			$afterId = (int)$_POST['after'];

			try {
				$afterImage = new ISC_PHOTOWALL_IMAGE($afterId);
			} catch (ISC_PHOTOWALL_IMAGE_INVALIDID_EXCEPTION $e) {
				$response[] = $remote->MakeXMLTag('error', sprintf(GetLang('PhotowallImageInvalidId'), $afterId), true);
				$remote->SendXMLHeader();
				$remote->SendXMLResponse($response);
				die();
			} catch (ISC_PHOTOWALL_IMAGE_RECORDNOTFOUND_EXCEPTION $e) {
				$response[] = $remote->MakeXMLTag('error', sprintf(GetLang('PhotowallImageNotFound'), $afterId), true);
				$remote->SendXMLHeader();
				$remote->SendXMLResponse($response);
				die();
			} catch (Exception $e) {
				$response[] = $remote->MakeXMLTag('error', GetLang('PhotowallImageMoveDatabaseError'), true);
				$remote->SendXMLHeader();
				$remote->SendXMLResponse($response);
				die();
			}
			
			$afterSort = $afterImage->getSort();
		} else {
			$after = false;
			$afterSort = -1;
		}

		// create an sql query to shift all sorting values between the two anchor points
		if ($moveSort > $afterSort) {
			$sql = "UPDATE `[|PREFIX|]photowall` SET imagesort = imagesort + 1 WHERE imagesort > " . $afterSort . " AND imagesort < " . $moveSort;
			$newSort = $afterSort + 1;
		} else {
			$sql = "UPDATE `[|PREFIX|]photowall` SET imagesort = imagesort - 1 WHERE imagesort > " . $moveSort . " AND imagesort <= " . $afterSort;
			$newSort = $afterSort;
		}

		$db = $GLOBALS['ISC_CLASS_DB'];

		$db->Query("SET autocommit = 0");
		$db->Query("LOCK TABLES `[|PREFIX|]photowall` WRITE");

		$result = $db->Query($sql);

		if ($result) {
			$moveImage->setSort($newSort);

			try {
				$moveImage->saveToDatabase(false);
				$db->Query("COMMIT");
				$response[] = $remote->MakeXMLTag('success', GetLang('PhotowallImagesSortOrderChanged'), true);
			} catch (Exception $e) {
				$db->Query("ROLLBACK");
				$response[] = $remote->MakeXMLTag('success', GetLang('PhotowallImageMoveDatabaseError'), true);
			}
			$db->Query("UNLOCK TABLES");

		} else {
			$db->Query("ROLLBACK");
			$db->Query("UNLOCK TABLES");
			$response[] = $remote->MakeXMLTag('success', GetLang('PhotowallImageMoveDatabaseError'), true);
		}

		$remote->SendXMLHeader();
		$remote->SendXMLResponse($response);
		die();
	}

}
