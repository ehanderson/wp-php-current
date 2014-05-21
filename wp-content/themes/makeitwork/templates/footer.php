<footer class="content-info container" role="contentinfo">
  <p class="social-links">

    <a class="social-link twitter" href="https://twitter.com/<?php the_field('twitter_user','options'); ?>">
      <span class="fa-stack fa-2x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
      </span>
    </a>

    <a class="social-link facebook" href="<?php the_field('facebook_page','options'); ?>">
      <span class="fa-stack fa-2x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
      </span>
    </a>

    <?php $instagram = get_field('instagram_user','options'); ?>
    <?php if($instagram) : ?>
    <a class="social-link instagram" href="https://instagram.com/<?php echo $instagram; ?>">
      <span class="fa-stack fa-2x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
      </span>
    </a>
    <?php endif; ?>

  </p>

  <p class="donate">
    <a class="btn btn-donate" href="<?php echo home_url(); ?>/donate">Donate to Make it Work</a>
  </p>

  <?php
    if (has_nav_menu('footer_navigation')) :
      wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav footer-nav '));
    endif;
  ?>


  <p><small class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</small></p>
</footer>

<?php wp_footer(); ?>
