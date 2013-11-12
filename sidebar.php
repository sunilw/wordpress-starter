<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0
 *
 * This file is here for Backwards compatibility with old themes and will be removed in a future version
 *
 */
_deprecated_file( sprintf( __( 'Theme without %1$s' ), basename(__FILE__) ), '3.0', null, sprintf( __('Please include a %1$s template in your theme.'), basename(__FILE__) ) );
?>
<section class="sidebar" role="complementary">

  <?php
  // uncomment if we are using woocommerce
  // get_template_part('templates/cart_links')  
  ?>


  <ul>
    <?php       /* Widgetized sidebar, if you have the plugin installed. */
    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('altart_sidebar') ) : ?>
    <li>
      <?php get_search_form(); ?>
    </li>

    <ul>
      <?php
      // list latest articles
      get_template_part('templates/sidebar-latest-entries')
      ?>
    </ul>


    <?php if ( is_404() || is_category() || is_day() || is_month() ||
              is_year() || is_search() || is_paged() ) {
    ?> <li>

      <?php /* If this is a 404 page */ if (is_404()) { ?>
      <?php /* If this is a category archive */ } elseif (is_category()) { ?>
      <p><?php printf(__('You are currently browsing the archives for the %s category.'), single_cat_title('', false)); ?></p>

      <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
      <p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the day %3$s.'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('l, F jS, Y'))); ?></p>

      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for %3$s.'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('F, Y'))); ?></p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives for the year %3$s.'), get_bloginfo('url'), get_bloginfo('name'), get_the_time('Y')); ?></p>

      <?php /* If this is a search result */ } elseif (is_search()) { ?>
      <p><?php printf(__('You have searched the <a href="%1$s/">%2$s</a> blog archives for <strong>&#8216;%3$s&#8217;</strong>. If you are unable to find anything in these search results, you can try one of these links.'), get_bloginfo('url'), get_bloginfo('name'), esc_html( get_search_query() ) ); ?></p>

      <?php /* If this set is paginated */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <p><?php printf(__('You are currently browsing the <a href="%1$s/">%2$s</a> blog archives.'), get_bloginfo('url'), get_bloginfo('name')); ?></p>

      <?php } ?>

    </li>
    <?php }?>
  </ul>
  <ul role="navigation">
    <li>
      <a href="<?php echo site_url()  ?>/cart">cart</a>
    </li>

  </ul>
  <ul>
    <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
    <?php wp_list_bookmarks(); ?>

    <li><h3><?php _e('Meta'); ?></h3>
      <ul>
        <?php wp_register(); ?>
        <li><?php  wp_loginout(); ?></li>
        <?php  wp_meta(); ?>
      </ul>
    </li>
    <?php } ?>

    <?php endif; ?>
  </ul>
</section>
