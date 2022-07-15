<?php 

function register_styles(){
  wp_enqueue_style('followandrer-boostrap', get_template_directory_uri()."/style.css", array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'register_styles');

?>