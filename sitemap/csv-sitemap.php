<?php

//send the header

header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=sitemap".uniqid().".csv");

//Generate a CSV sitemap

//including library to use the get_posts() function
require_once('../../../../wp-load.php');

//get_sitemap return the sitemap as an array
require_once('../includes/class.sitemap.php');
$sitemap_i=new sitemap();
$sitemap_array=$sitemap_i->get_sitemap();
 
$nl = "\n";

foreach($sitemap_array as $element){

	//set the link priority, based on the saved options
	switch($element['type']){
	case 'posts':
		$priority=get_option('sg_posts_priority');
		break;
	case 'pages':
		$priority=get_option('sg_pages_priority');
		break;
	case 'categories':
		$priority=get_option('sg_categories_priority');
		break;
	case 'tags':
		$priority=get_option('sg_tags_priority');
		break;											  
	case 'home':
		$priority='1';
		break;
	}

	if($priority!="0"){		
	  $sitemap.='"'.$element['post_title'].'",';
	  $sitemap.='"'.$element['permalink'].'"'.$nl;
	 }
 
}

echo $sitemap;

?>
