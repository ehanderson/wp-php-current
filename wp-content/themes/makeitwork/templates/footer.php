<footer class="content-info container" role="contentinfo">
  <p class="social-links">

    <a class="social-link twitter" href="https://twitter.com/<?php the_field('twitter_user','options'); ?>">
      <span class="fa-stack fa-2x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
      </span>
    </a>

    <a class="social-link facebook" href="<?php the_field('facebook_page','options'); ?>">
      <span class="fa-stack fa-2x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
      </span>
    </a>

    <?php $instagram = get_field('instagram_user','options'); ?>
    <?php if($instagram) : ?>
    <a class="social-link instagram" href="https://instagram.com/<?php echo $instagram; ?>">
      <span class="fa-stack fa-2x">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
      </span>
    </a>
    <?php endif; ?>

  </p>

  <p class="donate">
    <a class="btn btn-donate" href="<?php echo home_url(); ?>/donate">Donate to Make it Work</a>
  </p>

  <p class="bsd">
    <a class="btn btn-donate" href="<?php echo home_url(); ?>/donate">BLUE STATE DIGITAL REQUEST</a>
  </p>

  <div class='bsd-response'></div>

  <?php
    if (has_nav_menu('footer_navigation')) :
      wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav footer-nav '));
    endif;
  ?>


  <p><small class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</small></p>
</footer>

<?php wp_footer(); ?>

<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/hmac-sha1.js"></script>
<script>

  $(".bsd").on('click', function(e) {
    e.preventDefault()
    
    // STEP 1: API CREDENTIALS
    // From BSD Control Panel -> Make It Work -> Administrative Tools 
    var api_id = 'bsd_quiz_123'
    var api_secret = 'c833f11d174ea3625973f450c8f86968bffbe70e'
    var timestamp = new Date().getTime();
    var api_ver = 2

    // STEP 2: SIGNING STRING
    var signing_string = api_id + "\n" + timestamp + "\n/page/api/cons/get_constituents_by_ext_id\napi_ver=" + api_ver + "&api_id=" + api_id + "&api_ts=" + timestamp
    
    // STEP 3: API_MAC
    // From BSD API Docs -> Understanding the api_mac
    // http://stackoverflow.com/questions/4337959/need-hmac-sha1-encryption-library-for-javascript
    // docs: https://code.google.com/p/crypto-js/#HMAC

    var hash = CryptoJS.HmacSHA1(signing_string, api_secret);
    var api_mac = hash.toString();

    // STEP 4: Build URL
    // http://tools.bluestatedigital.com/pages/our-API#toc-blue_state_digital_xml_api:understanding_the_api_mac
    var requestUrl = "http://tools.bluestatedigital.com/page/api/cons/test?api_ver=" + api_ver + "&api_id=" + api_id + "&api_ts=" + timestamp + "&api_mac=" + api_mac

    // STEP 5: Send Request
    $.ajax({
      url: requestUrl,
      type: "GET",
      dataType: 'jsonp',
      success: function(response) { 
        alert('Success!');
        $('.bsd-response').append("<p>" + response + "</p>")
      }
    });

  })

</script>