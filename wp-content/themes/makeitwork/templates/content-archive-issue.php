<?php
$oddeven = ($wp_query->current_post) % 2;
if($oddeven == 0 ) { $alt = 'odd'; }
elseif($oddeven == 1 ) { $alt = 'even'; }
?>

<article <?php post_class('row '. $alt); ?>>
  <div class="col-sm-3 issue-icon">
    <?php the_post_thumbnail('full') ?>
  </div>
  <div class="col-sm-9 issue-content">
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="entry-summary">
      <?php the_content('Read More'); ?>
    </div>
  </div>
</article>
