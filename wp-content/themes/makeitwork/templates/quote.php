<?php
wp_reset_postdata();
$quotes = get_field('quote_block');
if($quotes) {
  if(count($quotes) > 1) {
    echo '<div id="quote-carousel" class="carousel " data-ride="carousel"><div class="carousel-inner">';
    $c=-1;
  }
  while(have_rows('quote_block')) : the_row();
  if(count($quotes) > 1) {
    $c++; ?>
    <div class="item<?php if($c==0) { echo ' active'; } ?>">
  <?php }
  $quote = get_sub_field('quote');
  $id = $quote->ID;
  $quote_text = get_post_meta($id, 'quote_text', true);
  $quote_author = get_post_meta($id,'quote_author',true);
  $tweet_text = urlencode($quote_text);
  $tweet_url  = urlencode(home_url());
  $tweet_via  = get_field('twitter_user','options');
  ?>
  <div class="quote-block">
    <blockquote class="quote">
      <span class="quote-text"><?php echo $quote_text; ?></span>
      <small class="quote-author"><?php echo $quote_author; ?></small>
    </blockquote>
    <a class="btn btn-quote-share" href="https://twitter.com/intent/tweet?text=<?php echo $tweet_text; ?>&url=<?php echo $tweet_url; ?>&via=<?php echo $tweet_via; ?>">Share</a>
  </div>
  <?php
  if(count($quotes) > 1) { echo '</div>'; };
  endwhile;
  if(count($quotes) > 1) { echo '</div></div>'; };
  wp_reset_postdata();
} ?>