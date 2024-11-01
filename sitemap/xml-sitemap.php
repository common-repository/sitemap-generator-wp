<?php

//send the header

header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');

//Generate the XML sitemap

//including library to use the get_posts() function
require_once('../../../../wp-load.php');

//get_sitemap return the sitemap as an array
require_once('../includes/class.sitemap.php');
$sitemap_i=new sitemap();
$sitemap_array=$sitemap_i->get_sitemap();

$sitemap="<?xml version=\"1.0\"  encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";  
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
			  $sitemap.="\t<url>";
			  $sitemap.='<loc>'.$element['permalink'].'</loc>';
			  if(strlen($element['post_modified_gmt'])>0){$sitemap.='<lastmod>'.$element['post_modified_gmt'].'</lastmod>';}
			  $sitemap.='<priority>'.$priority.'</priority>';
			  $sitemap.='</url>';
		  }	  	  	  
	  
 }

$sitemap.="</urlset>";
echo $sitemap;

?>
