<?php

/*
 *
 *Testing custom meta box and fields library
 *
 */

?>

<?php

//
// in order to get this to work, we need to load
// the right libraries: javascript and wp php.
//

// lets start with loading the js library

add_action("wp_enqueue_scripts", "cmb_modal_scripts") ;

function cmb_modal_scripts()
{
  // add our own js

  wp_register_script('modaljs', get_template_directory_uri()  . "/js/jquery.simplemodal-1.4.4.js" , array('jquery') ) ;
  wp_enqueue_script('modaljs', get_template_directory_uri() . "/js/jquery.simplemodal-1.4.4.js" , array('jquery') ) ;
} ;


// and the cmb library



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
        'type'   =>   'textarea_code'
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

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
  if ( !class_exists( 'cmb_Meta_Box' ) ) {
    require_once( get_template_directory() . '/lib/cmb/init.php');
  }
}

add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );


