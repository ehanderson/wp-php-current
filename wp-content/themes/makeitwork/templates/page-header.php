<?php
if( (get_post_type() == 'page') && has_post_thumbnail() ) {  ?>
  <div class="page-header header-graphic">
    <?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>
    <div class="header-graphic-caption">
      <h1><?php echo roots_title(); ?></h1>
      <p><?php the_field('header_graphic_text'); ?></p>
    </div>
  </div>
<?php
}

else {
?>
  <div class="page-header">
      <h1><?php echo roots_title(); ?></h1>
  </div>
<?php } ?>
