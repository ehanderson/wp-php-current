<?php while (have_posts()) : the_post(); ?>
<?php
$issues = get_field('link_issue');
$share_your_story_text = get_field('share_your_story_text');
?>

  <article <?php post_class(); ?>>
    <header>
      <?php get_template_part('templates/quote'); ?>
    </header>
    <div class="row">
      <div class="col-sm-7">
        <div class="entry-content content-block">
          <p><?php the_post_thumbnail('campaign-feature') ?></p>
          <?php the_content(); ?>
          <?php if($issues) : ?>
          <ul class="issues">
          <?php foreach( $issues as $post): setup_postdata( $post ); ?>
            <li class="issue row">
              <a class="col-sm-3" href="<?php the_permalink() ?>"><?php the_post_thumbnail($post->ID, 'thumb',array('class'=>'img-responsive')); ?></a>
              <div class="col-sm-9">
                <h5><?php the_title() ?></h5>
                <a class="btn btn-black" href="<?php the_permalink(); ?>">Read More</a>
              </div>
            </li>
          <?php
            endforeach;
            wp_reset_postdata();
           ?>
          </ul>
          <?php endif; ?>

          <?php
          if(get_field('content_links')) { ?>
            <ul class="content-links">
              <?php while(have_rows('content_links')) : the_row(); ?>
              <li><a href="<?php  the_sub_field('link_url') ?>"><?php the_sub_field('link_title');  ?></a></li>
              <?php endwhile; ?>
            </ul>
          <?php } ?>




        </div>
      </div>

      <div class="col-sm-5">
        <?php get_template_part('templates/signup','campaign') ?>
        <div class="share-your-story content-block">
          <p><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/img/shareyourstory.svg"/></p>
          <p><?php echo $share_your_story_text; ?></p>
          <p><a class="btn btn-black" href="#">Share Your Story</a></p>
          <p><a class="btn btn-default" href="#">See Other Stories</a></p>
        </div>
      </div>


    </div>



    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
