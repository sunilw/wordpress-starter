<?php

// ------------------------------------------------------------------
// woocommerce support
// http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
// ------------------------------------------------------------------

// first, prevent woocommerce from loading it's own stylesheet
define('WOOCOMMERCE_USE_CSS', false);

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main" class="group">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_theme_support( 'woocommerce' );

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}

// try to alter product template
// http://krogsgard.com/2012/wrapper-woocommerce-archives

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/**
 * WooCommerce Loop Product Thumbs
 **/

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

  function woocommerce_template_loop_product_thumbnail() {
    echo woocommerce_get_product_thumbnail();
  }
}


/**
 * WooCommerce Product Thumbnail
 **/
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

  function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
    global $post, $woocommerce;

    if ( ! $placeholder_width )
      $placeholder_width = $woocommerce->get_image_size( 'shop_catalog_image_width' );
    if ( ! $placeholder_height )
      $placeholder_height = $woocommerce->get_image_size( 'shop_catalog_image_height' );

    $output = '<div class="imagewrapper">';

    if ( has_post_thumbnail() ) {

      $output .= get_the_post_thumbnail( $post->ID, $size );

    } else {

      $output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="' . $placeholder_width . '" height="' . $placeholder_height . '" />';

    }

    $output .= '</div>';

    return $output;
  }
}


// remove breadcrumbs
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

///////////////////////////////////////////////////
//  change order of things on product page
///////////////////////////////////////////////////

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title',5);
