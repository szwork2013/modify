<?php
class ISC_ARCHIVES
{
	private $pageTitle = "";

	public function __construct()
	{
		// Setup the page title
		$this->pageTitle = GetConfig('StoreName') . " - " . "Ever Mod Ever";
	}

	public function HandlePage()
	{

		$GLOBALS['AdditionalStylesheets'][] = "https://fonts.googleapis.com/css?family=PT+Sans+Caption&v2";
		
		if(isset($_GET['watch'])) {
		  $fatArray = array("face3strap3" => "San Francisco Dress Code - Thank god we're open minded in this city, because we can't manage colors to save our life.",
							"face3strap4" => "Cruella Deville - Save the dalmations!!!!",
							"face3strap5" => "MST 3000 - If you were born after 1990. Or you don't appreciate incredible humor, you wont get this",
							"face3strap1" => "Million Dollar Baby - Nothing like getting punched in the face over and over to help you win an Oscar",
							"face3strap6" => "Arachnaphobia - Remember kids, if your watch has bright colors, it may be poisonous",
							"face3strap2" => "Lawn Ornament - The flamingo is clearly the most underated lawn ornament of all time.  Suck it gnomes.",
							"face3strap7" => "Smoky the Bear - Because only YOU can prevent forest fires.",
							"face3strap9" => "Of Mice and Modify - Living off the fatta the land and tending rabbits.  Was there ever a more noble desire?",
							"face3strap8" => "Heaven in a Handbasket - Why should people only go to hell in a handbasket?  And what's a handbasket?",
							"face7strap3" => "Old Faithful - It's always on when you're wearing Black and Silver",
							"face7strap4" => "25 Years - Silver anniversary for you and your lover?  Why not Modify her wrist with a lovely gift?",
							"face7strap5" => "Goldblum - You know you're in store for a great flick if the actor is either (a) Modifying as such or (b) named after the watch",
							"face7strap1" => "Mr. Spock - Helping young men avoid popularity since 1965",
							"face7strap6" => "KungFu Pandamonium - Nothing",
							"face7strap2" => "Grizzled Veteran - If you have any suggestions for a description that ties these colors to that name, email aaron@modifywatches.com",
							"face7strap7" => "The Man Purse - Call it what you want, but if you dare to don one, make sure you have a Modify to match",
							"face7strap9" => "The Clubber Lang - Trying to conquer the world without your Modify?  We pity the fool!!!",
							"face7strap8" => "Oscar the Grouch - We hope that someday you will love our watches as much as Oscar loves trash.",
							"face4strap3" => "Discount Willy - Yeah, we know Shamu was Free Willy, but we can't make a business selling watches for nothing.",
							"face4strap4" => "Memoirs of a Geisha - Carry yourself with grace and strum your shimedaiko in style with this tidy color combo.",
							"face4strap5" => "Salt and Pepper - With it's your favorite hip hop group, the color of your beard or the spice of your life, it's all good.",
							"face4strap1" => "Juneau? - Alaska!",
							"face4strap6" => "Ka-ra-te - One day you'll be a green belt. Maybe even a brown belt. Until that day, wear your cute yellow belt with pride",
							"face4strap2" => "Kid Sister - Looks like she's all grown up. Did you hear that yesterday she rejected my Buddy?",
							"face4strap7" => "Modi-Die Hard - Yippie kaiyaiyay Modifier!!!",
							"face4strap9" => "The Costanza Effect - Just go do everything the opposite of what you would normally do.  Unless you would normally buy a Modify, of course.",
							"face4strap8" => "The G.I. Joe - Because knowing is half the battle.  The other half?  Wearing better looking watches than the enemy.",
							"face6strap3" => "Bar Fight - Our most popularly named watch has always been the Bar Fight. So we're bringing it back",
							"face6strap4" => "There's Something About Marriage - Just like our watches - it may seem scary, but you'll love it once you try it out.",
							"face6strap5" => "Frowny Face Emoticon - Now you know how I feel",
							"face6strap1" => "El Mago - Don't trust the blue magician. The green guy - Derek - is cool. But beware El Mago",
							"face6strap6" => "Settlers of Catanistan - Why couldn't the same principles behind that amazing board game help solve the war in Afghanistan?",
							"face6strap2" => "Finkle is Einhorn - And Einhorn is Finkle… Think Ace, think!!!",
							"face6strap7" => "Barthhh-elona - We considered basing the Modify HQ there, but Aaron's apartment was just too good to leave.",
							"face6strap9" => "Saved by the Modify - Kelly and Zac.  AC and Jessie.  Screech and Lisa.  Modify and Mr. Belding.  Just makes sense.",
							"face6strap8" => "PNW - Green forrests, blue ocean and a whole lot of rain.  Who doesn't love the Pacific Northwest?",
							"face2strap3" => "Your Fat Uncle - Irish guy.  Good with the gifts.  Never stays too long.  Deserves a watch named after him.",
							"face2strap4" => "Lejerk Jabandoner - This is definitely not a reference to a back-stabbing St. Vincent St. Mary graduate who left the Cleve (this is written in Comic Sans)",
							"face2strap5" => "99 problems - But a love of the environment ain't one",
							"face2strap1" => "Totes Magotes - Totally -- > Totes -- > Totes Magotes.",
							"face2strap6" => "Chartreuse - We thought this was a made-up word, but it actually approximates yellow-green!",
							"face2strap2" => "Modifiddle - The devil went down to Georgia looking for a watch to steal…",
							"face2strap7" => "Bob Modifarley - 'Three little faces, for my watchstrap, singing sweet songs, of Modify pure and true. Singing this is my Modify for you-u-u.'",
							"face2strap9" => "Modijito - Nothing is as fresh as a Modify or as refreshing as a Mojito.",
							"face2strap8" => "Superfood - Just like that fruit juice, a Modify is good for the body and soul, except it doesn't look disgusting",
							"face1strap3" => "Caped Crusader - Wear this watch and use a slightly deeper voice, and no one will ever know your superhero secret…",
							"face1strap4" => "My Cousin Vineet - We can't wait for the Bollywood version to come out… and we have just the accessory to help you get there on time.",
							"face1strap5" => "Dad's Dance Moves - The stomp.  The clap and twist.  Embarrasing at the least, but at least he still gets out there right?",
							"face1strap1" => "Rubicon - Once you wear this modification there's no going back",
							"face1strap6" => "Tall Bird - He's friendly. He's tall. If we call him out by name we probably infringe on a trademark",
							"face1strap2" => "Mixed Signal - If you really loved her, you would have bought red roses. Everyone knows yellow connotes enthusiasm and pink signifies both joy and appreciation.",
							"face1strap7" => "Modifelly Belly - Popcorn is the most popular flavor.  WHAT IS WRONG WITH THIS WORLD?!?!?!",
							"face1strap9" => "Hulkamania - What you gonna do, when Modify runs wild all over you?!!?!  BROTHER!!!!!",
							"face1strap8" => "Fantasy Football Champion - Was it worth the 300 hours, losing your girlfriend and possibly your job?  We know it was.",
							"face5strap3" => "The Machine - When you're a champion, you're allowed to be a little weird.",
							"face5strap4" => "Red Velvet - Also known as the one treat it's worth consuming even if you're lactose and gluten intolerant",
							"face5strap5" => "Pinky and The Brain - What are we gonna do tonight, Brain?",
							"face5strap1" => "Friends, yes. Benefits, no. - Dude! She doesn't like you. She. Does. Not. Like. You.",
							"face5strap6" => "Hipster Ballerina - Just because they're more camouflaged does not mean ballerinas don't exist anymore. We're pretty sure there are emo ballerinas too, we just don't care enough to look for them.",
							"face5strap2" => "Amsterdam - People from all over the world travel to the Netherlands because it's the place for tulips",
							"face5strap7" => "The Taco Tuesday - Because without tacos, Tuesdays are just like Mondays.  And without a Modify, your wrist is just like your ankle.",
							"face5strap9" => "The Hippo - Hungry Hungry?",
							"face5strap8" => "Girl Scout Cookies - Amazing organization with a tough business model to emulate:  legalized child labor selling addictive cookie contraband.",
							"face8strap3" => "Berries - Some like it black. Some like it rasp.",
							"face8strap4" => "BadgerBadgerBadger - www.badgerbadgerbadger.com",
							"face8strap5" => "Harry and Hermione - I don't care what you say.  They're meant for each other and some day JK is going to make it happen.",
							"face8strap1" => "Inadequate - What's wrong guys? Lonely without Green? Can't make a well-balanced picture? Sad? Miss your friend? Miss old greeny?",
							"face8strap6" => "Swedish Fish - The only good ones are the red ones. You know it and we know it.",
							"face8strap2" => "Dimples and Pimples - You don't want too many of either, but more dimples are always preferred.",
							"face8strap7" => "WWMD? - What Would Modify Do? Right now? It's unclear between eating goldfish and planning the rubber revolution",
							"face8strap9" => "Harpo's Last Show - Maybe Oprah gives away a Modify on her final show?  You're right - probably too expensive for her tastes.",
							"face8strap8" => "New Coke - If three people actually like our product, we will have better than New Coke… with a few billion saved in marketing",
							"face9strap1" => "Tiger's Blood - What? You think our watches run on batteries?",
							"face9strap2" => "The Rachel - Someday, we hope to get so big that we'll get a haircut named after us too. The Modify! Maybe a mullet combover?",
							"face9strap3" => "The Monkey's Uncle - Turns out he's a nice guy.  Successful.  Owns a coffee shop.  And to think that no one wanted to be him.",
							"face9strap4" => "Laces Out, Dan - Remember to always keep the Modify face facing out.  No need to go all Ray Finkel on us.",
							"face9strap5" => "Many Leatherbound Books - And our Modify HQ also smells of rich mahogany.",
							"face9strap6" => "Banana Bandana - Browning banana?  Time to make some banana bread, or maybe some fancy headwear",
							"face9strap7" => "The Delivery Truck - What can brown do for you?  Besides tell time?  Isn't that enough?",
							"face9strap9" => "The Rick James - There is nothing we can possibly say here that will be appropriate for all audiences.",
							"face9strap8" => "Timmmmberrrrr!!!! - No trees were harmed in the creation of this watch, except the ones that hold up the hammock that is the Modify HQ ",
							"face10strap1" => "Beverly Hills 9-0-2-1-Old - BH90210 high school years ended 18 years ago.  Can't help but think a Modify would have looked awesome back then too.",
							"face10strap2" => "The Bubble Bobble - Greatest Nintendo game ever deserves a watch named after it.  Stand down all of you Tyson's Punchout fans.",
							"face10strap3" => "Brian Wilson's Beard - The man and his beard wear orange spikes.  Wouldn't a Modify go just as well?",
							"face10strap4" => "The Oompa Loompa - Oompa loompa doompa dee do, a Modify will give you happiness too.",
							"face10strap5" => "The Count of Mod-e Christo - Revenge will be ours!!!!",
							"face10strap6" => "Lord of the Modiflies - The pig-head-on-a-stake is currently outside Aaron's office.  And the rest of Modify are all very, very scared.",
							"face10strap7" => "Orange Mocha Frappuccino - Just be sure when you wear it not to get into a freak gasoline fighting accident.",
							"face10strap9" => "The Nothing - This watch is so hot that not even Atreyu could tame it.  But maybe with the help of… Faaalllkkkkooorrrrrr!!!!",
							"face10strap8" => "FantaFanta - Don't you wanna?");	
			
		  $sku = $_GET['watch'];         

		  $GLOBALS['AdditionalHTML'] = "<meta name=\"description\" content=\"" . $fatArray[$sku] ."\" />" .
			"<link rel=\"image_src\" href=\"https://www.modifywatches.com/templates/modify/images/oldphotos/combos/".$sku.".JPG\" />";
			
		}

		$this->showAbout();

	}

	private function showAbout()
	{
		// Show the Sandbox!!
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetPageTitle($this->GetPageTitle());
		$GLOBALS['ISC_CLASS_TEMPLATE']->SetTemplate("CompanyArchives");
		$GLOBALS['ISC_CLASS_TEMPLATE']->ParseTemplate();
	}

	private function GetPageTitle()
	{
		return $this->pageTitle;
	}

}
