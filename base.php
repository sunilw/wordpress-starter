<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
<div class="page-row page-row-expanded">
  <div class="wrap group" role="document">

	  
      <div class="" role="main">
        <?php include roots_template_path(); ?>
      </div><!-- ENDS .page-container -->
      
      <?php // if (roots_display_sidebar()) : ?>
      <?php     // <aside class="sidebar" role="complementary">	  ?>
          <?php // include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php // endif; ?>

  </div><!-- /.wrap -->
</div>

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>

</body>
</html>
