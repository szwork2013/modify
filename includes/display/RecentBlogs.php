<?php

CLASS ISC_RECENTBLOGS_PANEL extends PANEL
{
	public function SetPanelSettings()
	{
		$xml = "http://dev.modifywatches.com/blog/feed/";

		$xmlDoc = new DOMDocument();
		$xmlDoc->load($xml);
		$x=$xmlDoc->getElementsByTagName('item');
		$GLOBALS['SNIPPETS']['BlogPostItems'] = '';
		
		for ($i=0; $i<4; $i++) {
			$GLOBALS['BlogTitle'] = $x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
			$GLOBALS['BlogLink'] = $x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
			$GLOBALS['BlogDescription'] = $this->substrwords($x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue, 100);
			$GLOBALS['SNIPPETS']['BlogPostItems'] .= $GLOBALS['ISC_CLASS_TEMPLATE']->GetSnippet("BlogPostItem");
		}
	}
	
	public function substrwords($text, $maxchar, $end='...') {
		if (strlen($text) > $maxchar || $text == '') {
			$words = preg_split('/\s/', $text);      
			$output = '';
			$i      = 0;
			while (1) {
				$length = strlen($output)+strlen($words[$i]);
				if ($length > $maxchar) {
					break;
				} 
				else {
					$output .= " " . $words[$i];
					++$i;
				}
			}
			$output .= $end;
		} 
		else {
			$output = $text;
		}
		return $output;
	}
}
