<?php

//menu send page
function menu_generator_sitemap_generator() {
	
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	?>
	
	<div class="sitemap-generator-container wrap">
	<div class="title-img-sitemap-generator"></div>
	<h2>Sitemap Generator</h2>
	
	<?php
	
	//XML sitemap
	$xml_sitemap_url=WP_PLUGIN_URL.'/sitemap-generator-wp/sitemap/xml-sitemap.php';
	echo '<h3>XML sitemap URL</h3><a href="'.$xml_sitemap_url.'" target="_blank">'.$xml_sitemap_url.'</a>';
	
	//HTML sitemap shortcode
	$html_sitemap_url=WP_PLUGIN_URL.'/sitemap-generator-wp/sitemap/html-sitemap.php';
	echo '<h3>HTML sitemap URL</h3><a href="'.$html_sitemap_url.'" target="_blank">'.$html_sitemap_url.'</a>';
	
	//CSV sitemap
	$csv_sitemap_url=WP_PLUGIN_URL.'/sitemap-generator-wp/sitemap/csv-sitemap.php';
	echo '<h3>CSV sitemap URL</h3><a href="'.$csv_sitemap_url.'" target="_blank">'.$csv_sitemap_url.'</a>';
	
	//show credits
	sg_danycode_credits('Sitemap Generator WP','http://www.danycode.com/sitemap-generator-wp');
		
	?>
	
	</div> <!-- END .wrap -->
	
	<?php
	
}

?>
