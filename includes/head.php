<?php

add_action( 'admin_head', 'back_end_head_sitemap_generator' );

//writing in backend head
function back_end_head_sitemap_generator(){
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.WP_PLUGIN_URL.'/sitemap-generator-wp/css/style.css" />';
}

?>
