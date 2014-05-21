<?php
wp_reset_postdata();
if(have_rows('feature_block')) {
  while(have_rows('feature_block')) : the_row();
  $campaign   = get_sub_field('campaign');
  $id         = $campaign->ID;
  $title      = $campaign->post_title;
  $permalink  = get_permalink($id);
  $author     = get_post_meta($id, 'campaign_author', true);
  $excerpt    = get_post_meta($id, 'home_excerpt', true);
  ?>
  <div class="feature-block">
    <div class="row">
      <div class="col-sm-8 col-sm-push-4">
        <div class="feature-graphic">
          <?php
          if(get_post_format($id) == 'video') { ?>
          <div class="video">
            <?php echo apply_filters('the_content', get_post_meta($id, '_format_video_embed', true)); ?>
          </div>
          <?php }
          else { ?><a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($id, 'campaign-feature') ?></a>
          <?php } ?>
          <div class="feature-buttons">
            <a class="feature-like" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($id)) ?>"><i class="fa fa-3x fa-fw fa-thumbs-up"></i></a>
            <a class="feature-tweet" href="https://twitter.com/intent/tweet?text=<?php echo urlencode($title); ?>&via=<?php the_field('twitter_user','options'); ?>&url=<?php echo urlencode(get_permalink($id)); ?>"><i class="fa fa-3x fa-fw fa-twitter"></i></a>
            <a class="feature-share" href="#"><i class="fa fa-3x fa-fw fa-envelope"></i></a>
          </div>

        </div>
      </div>

      <div class="col-sm-4 col-sm-pull-8">
        <div class="feature-content">
          <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
          <?php if($author) { ?><p class="author">by <?php echo $author; ?></p><?php } ?>
          <p class="excerpt"><?php echo $excerpt; ?></p>
        </div>
      </div>


    </div>
  </div>

   <?php
  endwhile;
}
wp_reset_postdata();
?>
