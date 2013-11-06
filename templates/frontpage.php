<?php
/*
/* template by Sunil Williams
/* Copyright for this template belongs to Sunil Williams
/* sunil@sunil.co.nz
/
/ * Template Name: Frontpage
/*
 */?>
<header id="frontpage-header">
  <section id="identity" class="delta">
    <div class="logo">
      <a href="#">
        <img src="<?php echo get_stylesheet_directory_uri()  ?>/img/logo.png"
        class="" alt="identity" />
      </a>
    </div>
    <div id="nav-toggle-container" class="mobile-only">
      <article id="menu-access">
        <a href="#" id="nav-toggle">Menu</a>
      </article> <!-- ENDS #menu-access -->
    </div>
  </section>  <!-- ENDS identity -->
</header> <!-- ENDS #frontpage-header -->

<nav id="header-navigation" class="tablet-plus">
  <?php get_template_part('templates/navigation-pages')  ?>
</nav>

<section id="offering" class="group">
  <div class="outer-container">
    <h1 class="alpha">We attackclone all of your grithub repos.</h1>
    <h2>Then we rubygem the lymphnode js shawarma modules</h2>
  </div>
</section> <!-- ENDS #offering  -->
