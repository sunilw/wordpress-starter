<?php

/*
 *
 *Testing custom meta box and fields library
 *
 */

?>

<?php


function be_sample_metaboxes( $meta_boxes ) {
  $prefix = '_cmb_'; // Prefix for all fields
  $meta_boxes[] = array(
    'id' => 'test_metabox',
    'title' => 'Video Modal Details',
    'pages' => array('videos'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(
      array(
        'name'   =>   'video title',
        'desc'   =>   'field description (optional)',
        'id'     =>   $prefix . 'video_title',
        'type'   =>   'text'
      ),

      array(
        'name'   =>   'video link',
        'desc'   =>   'youtube embed code',
        'id'     =>   $prefix . 'video_link',
        'type'   =>   'text'
      ),

      array(
	'name'   =>   'cover',
	'desc'   =>   'the video link image',
	'id'     =>   $prefix . 'video_cover',
	'type'   => 'file'
      ),
    ),
  );

  return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );


// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
  if ( !class_exists( 'cmb_Meta_Box' ) ) {
    require_once( get_template_directory() . '/lib/cmb/init.php');
  }
}
