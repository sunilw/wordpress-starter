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
    'title' => 'Test Metabox',
    'pages' => array('page'), // post type
    'context' => 'normal',
    'priority' => 'high',
    'show_names' => true, // Show field names on the left
    'fields' => array(
      array(
        'name' => 'Test Text',
        'desc' => 'field description (optional)',
        'id' => $prefix . 'test_text',
        'type' => 'text'
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