<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="banner-inner">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="logo" href="<?php echo home_url(); ?>/">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>"/>
        </a>
      </div>

      <nav class="collapse navbar-collapse" role="navigation">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav '));
          endif;
        ?>
      <a class="navbar-btn btn btn-donate navbar-right" href="<?php echo home_url(); ?>/donate">Donate</a>
      </nav>
    </div>
  </div>
</header>
