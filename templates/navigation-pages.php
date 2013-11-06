<?php
/*
/* template by Sunil Williams
/* Copyright for this template belongs to Sunil Williams
/* sunil@sunil.co.nz
/*
/* This page lists top-level pages
/*
/*
 */?>
<ul class="group">
  <?php
  $args = array(
    'depth' => 0,
    'title_li' => ''
  ) ;

  wp_list_pages($args) ;


  ?></ul>