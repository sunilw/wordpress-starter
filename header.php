<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8" />
    <title><?php wp_title()  ?></title>
    <meta name="generator" content="emacs" />
    <!--[if lt IE 9]>
    <script src="cdnjs.cloudflare.com/ajax/libs/es5-shim/2.1.0/es5-shim.min.js"></script>
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css"
          href="<?php  echo get_template_directory_uri()  ; ?>/css/site.css" />
    <!--   ###################### -->
    <!--   call to head() starts     -->
    <!--   ###################### -->
    <?php wp_head() ?>
    <!--   ###################### -->
    <!--   call to head() ends    -->
    <!--   ###################### -->
  </head>
  <body id="<?php get_template_part("templates/body-id-tag")  ?>">
    <div id="outer-wrapper">
      <?php
      if ( ! is_front_page() ) {
        get_template_part('templates/page-header') ;
      }
      ?>
