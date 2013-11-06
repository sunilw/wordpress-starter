<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author              WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
/**
 * woocommerce_before_single_product hook
 *
 * @hooked woocommerce_show_messages - 10
 */
do_action( 'woocommerce_before_single_product' );
?>
<section class="product">

  <header class="product-title-header">
    <h1><?php echo the_title()  ?></h1>
    <p>By <a href="<?php echo get_the_author_link()  ?>"><?php echo get_the_author()  ?></a></p>
  </header>

  <article itemscope itemtype="http://schema.org/Product"
    id="product-<?php the_ID(); ?>"
    class="group">

    <?php
    /**
     * woocommerce_show_product_images hook
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action( 'woocommerce_before_single_product_summary' );
    ?>


    <?php
    /**
     * woocommerce_single_product_summary hook
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     */
    //do_action( 'woocommerce_single_product_summary' );
    ?>

    <div class="summary entry-summary">
      <header>
        <h2><?php echo get_the_title($ID)  ?></h2>
      </header>
      <?php
      /**
       * woocommerce_after_single_product_summary hook
       *
       * @hooked woocommerce_output_product_data_tabs - 10
       * @hooked woocommerce_output_related_products - 20
       */
      do_action( 'woocommerce_after_single_product_summary' );
      ?>
    </div><!-- .summary -->
    <?php
    do_action( 'woocommerce_single_product_summary' );

    ?>


  </article> <!-- #product-<?php the_ID(); ?> -->
  <?php do_action( 'woocommerce_after_single_product' ); ?>

</section><!-- ENDS.product -->
