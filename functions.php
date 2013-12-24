<?php

// ------------------------------------------------------------------
// Custom settings
// ------------------------------------------------------------------
//

// actually reaturn the post title
// replace spaces in title with hyphens
function starter_post_title()
{
  
  $id = get_the_ID() ;  
  $str =  get_the_title($id) ;
  
  echo str_replace(" ", "-", $str) ;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function altart_widgets_init() {

  register_sidebar( array(
    'name' => 'main sidebar',
    'id' => 'home_right_1',
    'before_widget' => '<article>',
    'after_widget' => '</article>',
    'before_title' => '<h2 class="rounded">',
    'after_title' => '</h2>',
  ) );
}
add_action( 'widgets_init', 'altart_widgets_init' );


show_admin_bar( false );


/*********************************************************/
/*  Admin panel hacks                                    */
/*********************************************************/

function admin_css() {
  wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin.css' );
}
add_action('admin_print_styles', 'admin_css' );

/*********************************************************/
/* template wrappers, introduced by scribu               */
/* http://scribu.net/wordpress/theme-wrappers.html       */
/*********************************************************/


function my_template_path() {
  return My_Wrapping::$main_template;
}

function my_template_base() {
  return My_Wrapping::$base;
}

class My_Wrapping {

  /**
   * Stores the full path to the main template file
   */
  static $main_template;

  /**
   * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
   */
  static $base;

  static function wrap( $template ) {
    self::$main_template = $template;

    self::$base = substr( basename( self::$main_template ), 0, -4 );

    if ( 'index' == self::$base )
      self::$base = false;

    $templates = array( 'wrapper.php' );

    if ( self::$base )
      array_unshift( $templates, sprintf( 'wrapper-%s.php', self::$base ) );

    return locate_template( $templates );
  }
}

add_filter( 'template_include', array( 'My_Wrapping', 'wrap' ), 99 );


/*********************************************************/
/*       Wrappers done. Move on to other stuff....       */
/*********************************************************/



/*********************************************************/
/*       Add support for post excerpts in pages          */
/*********************************************************/
add_post_type_support( 'page', 'excerpt' );


/*********************************************************/
/*       Add support for post thumbnails                 */
/*********************************************************/

add_theme_support('post-thumbnails') ;


/*********************************************************/
/*     Get rid of dots in excerpts                       */
/*********************************************************/

function wpf_excerpt_more($more) {
  global $post;
  return '' ;
}
add_filter('excerpt_more', 'wpf_excerpt_more') ;


// ------------------------------------------------------------------
// Time ago
// ------------------------------------------------------------------

function time_ago( $type = 'post' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}


/************************/
/* enqueue scripts      */
/************************/

add_action("wp_enqueue_scripts", "wps_scripts") ;

function wps_scripts()
{

  wp_deregister_script('jquery');
  
  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", false, null);
  wp_enqueue_script('jquery');

  // add our own js 
  wp_register_script('starterjs', get_template_directory_uri() . "/js/starter.js" , array('jquery') ) ;
  wp_enqueue_script('starterjs', get_template_directory_uri() . "/js/starter.js" , array('jquery') ) ;
  
}


require('functions-commentform.php') ;
require('functions-videos.php') ;

require('functions-woocommerce.php') ;
require('functions-videomodal.php') ;
