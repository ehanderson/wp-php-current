<?php wp_reset_query(); ?>
<?php
$args = array( 'post_type' => 'carousel', 'posts_per_page' => 3, 'order'=> 'ASC', 'orderby' => 'menu_order' );
$carousel = get_posts( $args );
if($carousel) {
  $c=-1;
?>
<div id="feature-carousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner">


<?php
foreach ( $carousel as $post ) :
  $c++;
  setup_postdata( $post ); ?>
    <div class="item<?php if($c == 0) { echo ' active'; } ?>">
      <?php the_post_thumbnail('carousel', array('class'=>'img-responsive')); ?>
      <div class="carousel-caption">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <p><a class="btn btn-carousel <?php the_field('button_color'); ?>" href="<?php the_field('button_target') ?>"><?php the_field('button_text'); ?></a></p>
      </div>
    </div>
<?php
endforeach; ?>

  </div>  <!-- close carousel-inner -->
  <!-- Indicators -->
  <?php if(count($carousel) > 1) { ?>
  <?php rewind_posts(); ?>
  <?php $c=-1; ?>
  <ol class="carousel-indicators">
    <?php foreach ( $carousel as $post ) : $c++; ?>
    <li data-target="#feature-carousel" data-slide-to="<?php echo $c; ?>" <?php if($c==0) { ?>class="active"} <?php } ?>></li>
    <?php endforeach; ?>
  </ol>

  <!-- Controls -->
  <a class="left carousel-control" href="#feature-carousel" data-slide="prev">
    <span class="fa fa-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#feature-carousel" data-slide="next">
    <span class="fa fa-chevron-right"></span>
  </a>
    <?php } ?>
</div>

<?php
wp_reset_postdata();
}
?>