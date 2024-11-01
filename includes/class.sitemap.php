<?php

class sitemap{

	function get_sitemap(){
		
		$result_counter=0;
		
		//parsing posts
		$posts = get_posts();
		foreach($posts as $post) : setup_postdata($post);	
			
			if(($post->post_status)=='publish'){
				$result[$result_counter]['permalink']=get_permalink($post->ID);
				$result[$result_counter]['post_title']=$post->post_title;
				$result[$result_counter]['post_modified_gmt']=substr($post->post_modified_gmt,0,10);
				$result[$result_counter]['type']='posts';
			}
			
			$result_counter=$result_counter+1;
			
		endforeach;
		
		//parsing pages
		$pages= get_pages();
		foreach($pages as $page) : setup_postdata($page);	
			
			if(($page->post_status)=='publish'){
				$result[$result_counter]['permalink']=get_permalink($page->ID);
				$result[$result_counter]['post_title']=$page->post_title;
				$result[$result_counter]['post_modified_gmt']=substr($page->post_modified_gmt,0,10);
				$result[$result_counter]['type']='pages';
			}
			
			$result_counter=$result_counter+1;
			
		endforeach;
		
		//parsing categories
		$categories=get_categories();
		
		foreach($categories as $category){
			
			$result[$result_counter]['permalink']=get_category_link($category->term_id);
			$result[$result_counter]['post_title']=$category->name;
			$result[$result_counter]['post_modified_gmt']='';
			$result[$result_counter]['type']='categories';	
			
			$result_counter=$result_counter+1;		
			
		}
		
		//parsing tags

		$tags = get_tags();
		foreach ($tags as $tag){
			
			$result[$result_counter]['permalink']=get_tag_link($tag->term_id);
			$result[$result_counter]['post_title']=$tag->name;
			$result[$result_counter]['post_modified_gmt']='';
			$result[$result_counter]['type']='tags';	
			
			$result_counter=$result_counter+1;		
			
		}
		
		//add homepage
		
		$result[$result_counter]['permalink']=home_url();
		$result[$result_counter]['post_title']='Home';
		$result[$result_counter]['post_modified_gmt']='';
		$result[$result_counter]['type']='home';	
		
		return $result;	
		
	}
}

?>
