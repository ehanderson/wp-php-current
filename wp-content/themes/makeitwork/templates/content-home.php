<?php //while (have_posts()) : the_post(); ?>
<?php //endwhile; ?>


<?php get_template_part('templates/carousel','home'); ?>


<div class="row">
  <div class="col-md-8 col-md-push-4">
    <?php get_template_part('templates/signup','home'); ?>
  </div>
  <div class="col-md-4 col-md-pull-8">
    <?php get_template_part('templates/social','home'); ?>
  </div>
</div>

<?php get_template_part('templates/feature','home'); ?>

<?php get_template_part('templates/quote','home'); ?>
