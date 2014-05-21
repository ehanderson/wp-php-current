<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>


<div class="row">

  <div class="col-sm-4">
    <div class="partners content-block">
      <h3>Partners</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      <p><button class="btn btn-block btn-black" data-toggle="modal" data-target="#modal-partners">Meet our Partners</button></p>
    </div>
    <div class="join content-block">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/jointheteam.svg" />
      <p><a class="btn btn-block btn-black" href="#">Learn More</a></p>
    </div>
  </div>

  <div class="col-sm-8">
    <div class="content-block people">
      <div class="founders">
        <h2>Founders</h2>
        <?php
        if( have_rows('founder') ): ?>
        <div class="row">
          <?php while ( have_rows('founder') ) : the_row();
            $name = get_sub_field('staff_name');
            $title = get_sub_field('staff_title');
            $twitter = get_sub_field('staff_twitter_handle');
            $photo = get_sub_field('staff_photo');
          ?>
          <div class="col-sm-6 person founder">
            <?php if( !empty($photo) ) { ?>
              <?php echo wp_get_attachment_image($photo['id'], 'thumb', 0, array('class'=>'img-circle')) ?>
            <?php }; ?>
            <h4 class="staff-name"><?php echo $name ?></h4>
            <?php if($twitter) { ?><p class="staff-twitter"><a href="https://twitter.com/<?php echo $twitter ?>">@<?php echo $twitter; ?></a></p><?php } ?>
          </div>
          <?php endwhile; ?>
        </div>
        <?php endif;

        ?>
      </div>

      <div class="staff">
        <h2>Staff</h2>
        <?php
        if( have_rows('staff') ): ?>
        <div class="row">
          <?php while ( have_rows('staff') ) : the_row();
            $name = get_sub_field('staff_name');
            $title = get_sub_field('staff_title');
            $twitter = get_sub_field('staff_twitter_handle');
            $email = get_sub_field('staff_email');
            //$photo = get_sub_field('staff_photo');
          ?>
          <div class="col-sm-6 person staffer">
            <h5 class="staff-name">
              <?php echo $name ?>
              <?php if($twitter) { ?><small class="staff-twitter"><a href="https://twitter.com/<?php echo $twitter ?>">@<?php echo $twitter; ?></a></small><?php } ?>
            </h5>
            <?php if($title) { ?>
            <span class="staff-title"><?php echo $title; ?></span><br/>
            <?php } ?>
            <?php if($email) { ?>
            <span class="staff-email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
            <?php } ?>


          </div>
          <?php endwhile; ?>
        </div>
        <?php endif;

        ?>
      </div>

    </div>
  </div>

</div>

<div id="modal-partners" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-partners" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Our Partners</h3>
      </div>
      <div class="modal-body">
        <?php
        if( have_rows('partner') ):
        while ( have_rows('partner') ) : the_row();
        $name = get_sub_field('partner_name');
        $description = get_sub_field('partner_description');
        $website = get_sub_field('partner_website');
        $logo = get_sub_field('partner_logo');
        ?>
        <div class="partner">
          <?php if( !empty($logo) ) { ?>
            <p><?php echo wp_get_attachment_image($logo['id'], 'medium', 0, array('class'=>'partner-logo desaturate')) ?></p>
          <?php }; ?>

          <h4><?php echo $name; ?></h4>
          <p><?php echo $description; ?></p>
          <a class="partner-link" target="_blank" href="<?php echo $website; ?>"><span class="fa fa-2x fa-external-link-square"></span></a>
        </div>
        <?php
        endwhile;
        endif;
        ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
