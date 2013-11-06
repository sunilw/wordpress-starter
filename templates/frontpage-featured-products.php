<?php
/*
/* template by Sunil Williams
/* Copyright for this template belongs to Sunil Williams
/* sunil@sunil.co.nz
/ * This template produces featured products
/*
 */?>
<section id="featured-products">
  <div class="outer-row group">
    <ul id="list-featured-products" class="group">
      <?php
      $args = array(
        'post_type' => 'product',
        'meta_key' => '_featured',
        'posts_per_page' => 6
      );
      $loop = new WP_Query( $args );
      if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();

        woocommerce_get_template_part('frontpage-content-product');

        endwhile;
      }
      wp_reset_postdata();
      ?>
    </ul>
  </div><!-- ENDS .outer-row -->
</section> <!-- ENDS #featured-products -->