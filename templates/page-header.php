<?php
/*
/* template by Sunil Williams
/* Copyright for this template belongs to Sunil Williams
/* sunil@sunil.co.nz
/*
/* This template will show at the top of all pages
/* that are not the front page
/*
 */?>
<header id="page-header">
  <section id="identity" class="delta">
    <div class="logo">
      <a href="#">
        <img src="<?php echo get_stylesheet_directory_uri()  ?>/img/logo.png"
        class="" alt="identity" />
      </a>
    </div>
  </section>  <!-- ENDS identity -->
</header> <!-- ENDS #frontpage-header -->
<div id="nav-toggle-container" class="mobile-only">
  <article id="menu-access">
    <a href="#" id="nav-toggle">Menu</a>
  </article> <!-- ENDS #menu-access -->
</div>
<nav id="header-navigation" class="tablet-plus">
  <?php get_template_part('templates/navigation-pages')  ?>
</nav>
