<?php
/**
 * modified by sunil
 *
 * The template for displaying product content on the frontpage
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author       WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
$woocommerce_loop['loop'] = 0;

// Ensure visibility
if ( ! $product->is_visible() )
return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes

?>
  <li class="feature" >

    <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

    <a href="<?php the_permalink(); ?>">

      <?php
      /**
       * woocommerce_before_shop_loop_item_title hook
       *
       * @hooked woocommerce_show_product_loop_sale_flash - 10
       * @hooked woocommerce_template_loop_product_thumbnail - 10
       */
      do_action( 'woocommerce_before_shop_loop_item_title' );
      ?>

    </a>

  </li>