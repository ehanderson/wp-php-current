<div class="social content-block">

  <div class="social-twitter">
    <?php $twitter_handle = get_field('twitter_user','options'); ?>
    <p><a class="btn btn-twitter btn-block" href="https://twitter.com/intent/user?screen_name=<?php echo $twitter_handle; ?>">Follow @<?php echo $twitter_handle; ?> <span class="fa fa-fw fa-lg fa-twitter"></span></a></p>
    <?php echo latest_tweets_render_html( $screen_name = $twitter_handle, $num = 1, $rts = false, $ats = false, $pop = 0 );?>
  </div>

  <hr>

  <div class="social-facebook">
    <p><a class="btn btn-facebook btn-block" href="<?php the_field('facebook_page','options') ?>">Like Us on Facebook <span class="fa fa-fw fa-lg fa-facebook"></span></a></p>
    <?php recent_facebook_posts(array('number' => 1, 'likes' => 0, 'comments' => 0, 'show_link_previews' => 0, 'excerpt_length' => 140)); ?>
  </div>

</div>