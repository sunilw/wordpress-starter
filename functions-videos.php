<?php 

/***************************************************************************************/
/* videos custom post type                                                           */
/***************************************************************************************/

function my_custom_post_videos() {
  $labels = array(
    'name'               => _x( 'Videos', 'post type general name' ),
    'singular_name'      => _x( 'Videos', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Videos' ),
    'edit_item'          => __( 'Edit Video' ),
    'new_item'           => __( 'New Video' ),
    'all_items'          => __( 'All Videos' ),
    'view_item'          => __( 'View Video' ),
    'search_items'       => __( 'Search Videos' ),
    'not_found'          => __( 'No packages found' ),
    'not_found_in_trash' => __( 'No packages found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Videos'
  );

  $video_args = array(
    'labels' => $labels,
    'description'   => 'Holds our products and product specific data',
    'public'        => true,
    'menu_position' => 6,
    'supports'      => array( 'title',  'custom-fields' ),
    'taxonomies'=>array('category','post_tag'),
    'has_archive'   => true,
  ) ;

  register_post_type( 'videos', $video_args );
}
add_action( 'init', 'my_custom_post_videos' );

?>
