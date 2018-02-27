<?php 

/*
Plugin Name:Simple Fb likebox
Plugin URI:
Author: Rafiq
Author URI:http://twitter.com/vairafiq
Description: You can see your social profile
Version:1.0


*/


//Hook to start primary widget

add_action('widgets_init', 'facebook_profile');



function facebook_profile(){

	register_widget('pssj_facebook_like_box');
}

//We gonna extends the core file by our custom widget
class pssj_facebook_like_box extends WP_Widget{


	public function __construct(){

		parent::__construct('pssj-facebook-like-box', 'Facebook Like Box', array(
			'description' => 'Our Facebook Like Box'
			));

	}



	public function widget( $arg, $instance ){
		

		//addiding the framework 1 by 1

		$data = $arg['before_widget'];
		$data .=$arg['before_title'];
		$data .=$instance['title'];
		$data .=$arg['after_title'];

		$data .='<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));</script>';

		$page_url = $instance['url'];
		$page_height = $instance['height'];
		$page_width = $instance['width'];
		$page_title = $instance['page_title'];

		$data .='<div class="fb-page" data-href="'.$page_url.'" data-tabs="timeline" data-width="'.$page_width.'" data-height="'.$page_height.'" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="'.$page_url.'" class="fb-xfbml-parse-ignore"><a href="'.$page_url.'">'.$page_title.'</a></blockquote></div>';

		

		$data .=$arg['after_widget'];

		echo $data;

		
	}

	public function form( $instance ){
		// Widget's fields goes here
		?>

		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input type="text" value="<?php echo $instance['title']; ?>" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat">

		<label for="<?php echo $this->get_field_id('url'); ?>">Page URL</label>
		<input type="url" value="<?php echo $instance['url']; ?>" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" class="widefat">

		<label for="<?php echo $this->get_field_id('width'); ?>">Page Width</label>
		<input type="number" value="<?php echo $instance['width']; ?>" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" class="widefat">

		<label for="<?php echo $this->get_field_id('height'); ?>">Page Height</label>
		<input type="number" value="<?php echo $instance['height']; ?>" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" class="widefat">

		<label for="<?php echo $this->get_field_id('page_title'); ?>">Page Title</label>
		<input type="text" value="<?php echo $instance['page_title']; ?>" id="<?php echo $this->get_field_id('page_title'); ?>" name="<?php echo $this->get_field_name('page_title'); ?>" class="widefat">

		

		<?php 
	}

	

}

////// Its done ,,,,have a smile...