<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('content-block'); ?>>
      <header class="row">
        <div class="col-sm-2 issue-image"><?php the_post_thumbnail('full'); ?></div>
        <div class="col-sm-10"><h1 class="entry-title"><?php the_title(); ?></h1></div>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <footer>
        <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      </footer>
      <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
