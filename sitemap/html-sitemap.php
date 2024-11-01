<!-- generate the header -->

<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<head>
</head>
<body>

<?php

//Generate an HTML sitemap

//including library to use the get_posts() function
require_once('../../../../wp-load.php');

//get_sitemap return the sitemap as an array
require_once('../includes/class.sitemap.php');
$sitemap_i=new sitemap();
$sitemap_array=$sitemap_i->get_sitemap(); 
 
$nl = "\n";
$sitemap='<ul>';
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
		$sitemap.='<li><a href="'.$element['permalink'].'">'.$element['post_title'].'</a></li>';
	}
	
}
$sitemap.='</ul>';

echo $sitemap;

?>

</body>
</html>
