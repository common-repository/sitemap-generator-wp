<?php

//menu send page
function menu_options_sitemap_generator() {
	
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	
	?>
	
	<div class="sitemap-generator-container wrap">
	<div class="title-img-sitemap-generator"></div>
	<h2>Sitemap Generator Options</h2>
	
	<?php
	
    // Save options if user has posted some information
    if(isset($_POST['posts_priority']) or isset($_POST['pages_priority']) or isset($_POST['categories_priority']) or isset($_POST['tags_priority'])){
        
        //check input values
	    if(floatval($_POST['posts_priority'])<0 or floatval($_POST['posts_priority'])>1){$errors[]='Set posts priority with a value between 0 and 1';}
	    if(floatval($_POST['pages_priority'])<0 or floatval($_POST['pages_priority'])>1){$errors[]='Set pages priority with a value between 0 and 1';}
	    if(floatval($_POST['categories_priority'])<0 or floatval($_POST['categories_priority'])>1){$errors[]='Set categories priority with a value between 0 and 1';}
	    if(floatval($_POST['tags_priority'])<0 or floatval($_POST['tags_priority'])>1){$errors[]='Set tags priority with a value between 0 and 1';}
	    
        if(count($errors)==0){
			// Save into database
			update_option('sg_posts_priority',$_POST['posts_priority']);
			update_option('sg_pages_priority',$_POST['pages_priority']);
			update_option('sg_categories_priority',$_POST['categories_priority']);
			update_option('sg_tags_priority',$_POST['tags_priority']);
			
			//set success message
			$messages[]='<div class="updated"><p>Your options have been saved</p></div>';
		}else{
			//set error messages
			foreach($errors as $error){$messages[]='<div class="error"><p>'.$error.'</p></div>';}
		}
	}	
	
	//START OUTPUT
	
	//display update/error messages
	if(!empty($messages)){foreach($messages as $message){echo $message;}}
	
	?>
	
	<!-- SHOW THE OPTIONS -->
	
	<p>Set the priorities with a value between 0 and 1, set 0 if you want to exclude a category from the sitemap.</p>
	
	<form method="post" action="">
		<label>Posts Priority</label><input maxlength="3" type="text" name="posts_priority" value="<?php echo get_option('sg_posts_priority'); ?>">
		<label>Pages Priority</label><input maxlength="3" type="text" name="pages_priority" value="<?php echo get_option('sg_pages_priority'); ?>">
		<label>Categories Priority</label><input maxlength="3" type="text" name="categories_priority" value="<?php echo get_option('sg_categories_priority'); ?>">
		<label>Tags Priority</label><input maxlength="3" type="text" name="tags_priority" value="<?php echo get_option('sg_tags_priority'); ?>">
		<input class="button-primary" type="submit" value="Save">
	</form>	
	
	<?php
	
	//show credits
	sg_danycode_credits('Sitemap Generator WP','http://www.danycode.com/sitemap-generator-wp');
		
	?>
	
	</div> <!-- END .wrap -->
	
	<?php
	
}

?>
