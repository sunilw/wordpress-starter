<footer id="page-footer">
  <div class="footer-content">
    <h4>In Footer</h4>
  </div>  <!-- ENDS .footer-content -->
</footer>
  </div>  <!-- outer-wrapper ends -->
  <!-- call to wp_footer starts here -->
  <?php wp_footer(); ?>
  <!-- call to wp_footer has ended -->
  <script type="text/javascript"
          src="<?php echo get_stylesheet_directory_uri() ?>/js/reloader.js">
  </script>
  <script>
   <?php
   $styledir = get_template_directory_uri() ;
   ?>
   Reloadr.go([
     '<?php echo $styledir  ?>/site.css',
     '<?php echo $styledir  ?>/js/site.js'
   ]) ;
  </script>
  </body>
</html>