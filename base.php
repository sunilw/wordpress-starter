<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

    <div class="page-row">
        <?php
        do_action('get_header');
        get_template_part('templates/header');
        ?>
    </div><!-- ENDS .page-row -->
    
  <div class="page-row page-row-expanded">
        <div class="wrap" role="document">
            <div class="content row">
                <main class="main" role="main">
                    <?php include roots_template_path(); ?>
                </main><!-- /.main -->
                <?php if (roots_display_sidebar()) : ?>
                    <aside class="sidebar" role="complementary">
                        <?php include roots_sidebar_path(); ?>
                    </aside><!-- /.sidebar -->
                <?php endif; ?>
            </div><!-- /.content -->
        </div><!-- /.wrap -->
  </div> <!-- ENDS .page-row -->

  <div class="page-row">
    <?php get_template_part('templates/footer'); ?>
  </div> <!-- ENDS .page-row -->
  
    <?php wp_footer(); ?>
</body>
</html>
