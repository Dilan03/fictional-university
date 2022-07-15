<?php
//Event post type
function university_post_tpes(){
  register_post_type('event', array(
    'capability_type' => 'event',
    'map_meta_cap'=> true, // it has post as default
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-calendar',
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event'
    ),
  ));
  //Program post type
  register_post_type('program', array(
    'supports' => array('title'),
    'rewrite' => array('slug' => 'prgrams'),
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-awards',
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Programs',
      'add_new_item' => 'Add New Programs',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
  ));

  // Professor Post Type
  register_post_type('professor', array(
    
    'supports' => array('title', 'thumbnail'),
    'public' => true,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Professors',
      'add_new_item' => 'Add New Professors',
      'edit_item' => 'Edit Professor',
      'all_items' => 'All Professors',
      'singular_name' => 'Professor'
    ),
  ));

  register_post_type('campus', array(
    'supports' => array('title', 'editor', 'excerpt'),
    'rewrite' => array('slug' => 'campuses'),
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-location-alt',
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Campuses',
      'add_new_item' => 'Add New Campus',
      'edit_item' => 'Edit Campus',
      'all_items' => 'All Campuses',
      'singular_name' => 'Campus'
    ),
  ));
  
  //Note Post Type
  register_post_type('note', array(
    'capability_type' => 'note',
    'map_meta_cap' => true,
    'supports' => array('title', 'editor'),
    'public' => false,
    'menu_icon' => 'dashicons-welcome-write-blog',
    'show_in_rest' => true,
    'show_ui' => true,
    'labels' => array(
      'name' => 'Notes',
      'add_new_item' => 'Add New Notes',
      'edit_item' => 'Edit Note',
      'all_items' => 'All Notes',
      'singular_name' => 'Note'
    ),
  ));

  //Like Post Type
  register_post_type('like', array(
    'supports' => array('title'),
    'public' => false,
    'menu_icon' => 'dashicons-heart',
    'show_ui' => true,
    'labels' => array(
      'name' => 'Likes',
      'add_new_item' => 'Add New Like',
      'edit_item' => 'Edit Like',
      'all_items' => 'All Likes',
      'singular_name' => 'Like'
    ),
  ));
}
add_action('init', 'university_post_tpes');



?>