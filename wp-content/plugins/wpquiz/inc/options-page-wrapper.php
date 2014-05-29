<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<!--  add php tags before and after this blurb
//define variables and set to empty
$email = $question1 = $question2 = $question3 = $question4 = $question5 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST["email"])){
    $emailErr = "Please Enter an Email Address"
  }
  else{
    $email = $_POST["email"];
  }
  if(empty($_POST["question1"])){
    $question1Err = "*required"
  }
  else{
    $question1 = $_POST["question1"];
  }
  if(empty($_POST["question2"])){
    $question1Err = "*required"
  }
  else{
    $question2 = $_POST["question2"];
  }
  if(empty($_POST["question3"])){
    $question1Err = "*required"
  }
  else{
    $question3 = $_POST["question3"];
  }
  if(empty($_POST["question4"])){
    $question1Err = "*required"
  }
  else{
    $question4 = $_POST["question4"];
  }
  if(empty($_POST["question5"])){
    $question1Err = "*required"
  }
  else{
    $question5 = $_POST["question5"];
  }
}

}
 -->
<style type="text/css">
#wpquiz_form{
  text-align:center;
  margin: 50px auto;
  width: 400px;
}
fieldset{
  border-radius: 3px;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
  padding: 20px 30px;

  box-sizing: border-box;
  width: 80%;
  margin: 0 10%;

}
#wpquiz_form action-button{
  cursor: pointer;
}

#wpquiz_form fieldset:not(:first-of-type) {
  display: none;
}
#wpquiz_form .action-button:hover, #wpquiz_form .action-button:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
</style>
<div class="wrap">

  <div id="icon-options-general" class="icon32"></div>
  <h2>Name String</h2>

  <div id="poststuff">

    <div id="post-body" class="metabox-holder columns-2">

      <!-- main content -->
      <div id="post-body-content">

        <div class="meta-box-sortables ui-sortable">

          <div class="postbox">

            <h3><span>Welcome to you Quiz!</span></h3>
            <div class="inside">
              <form id ="wpquiz_form" name='wpquiz_form' method = 'post' action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <!-- <table class="form-table"> -->
                  <fieldset>
                    <h3>Question 1</h3>
                    <input name="wpquiz_question1" id='wpquiz_question_1' type='radio' value='a' class='radio-option'/>Option 1
                    <?php if (isset($wpquiz_question1) && $wpquiz_question1 == 'a') echo "checked"?>
                    <br>
                    <input name="wpquiz_question1" id='wpquiz_question_1' type='radio' value='b' class='radio-option'/>Option 2
                    <?php if (isset($wpquiz_question1) && $wpquiz_question1 == 'b') echo "checked"?>
                    <br>
                    <input name="wpquiz_question1" id='wpquiz_question_1' type='radio' value='c' class='radio-option'/>Option 3
                    <?php if (isset($wpquiz_question1) && $wpquiz_question1 == 'c') echo "checked"?>
                    <br>
                    <input type="button" name="next" class="next action-button" value="Next" />
                    <p>(1 of 5)</p>
                  </fieldset>
                  <fieldset>
                     <h3>Question 2</h3>

                    <input name="wpquiz_question2" id='wpquiz_question_2' type='radio' value='a' class='radio-option'/>Option 1
                    <?php if (isset($wpquiz_question2) && $wpquiz_question2 == 'a') echo "checked"?>
                    <br>
                    <input name="wpquiz_question2" id='wpquiz_question_2' type='radio' value='b' class='radio-option'/>Option 2
                    <?php if (isset($wpquiz_question2) && $wpquiz_question2 == 'b') echo "checked"?>
                    <br>
                    <input name="wpquiz_question2" id='wpquiz_question_2' type='radio' value='c' class='radio-option'/>Option 3
                    <?php if (isset($wpquiz_question2) && $wpquiz_question2 == 'c') echo "checked"?>
                    <br>
                    <input type="button" name="previous" class="previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />
                    <p>(2 of 5)</p>
                  </fieldset>
                  <fieldset>
                     <h3>Question 3</h3>

                    <input name="wpquiz_question3" id='wpquiz_question_3' type='radio' value='a' class='radio-option'/>Option 1
                    <br>
                    <input name="wpquiz_question3" id='wpquiz_question_3' type='radio' value='b' class='radio-option'/>Option 2
                    <br>
                    <input name="wpquiz_question3" id='wpquiz_question_3' type='radio' value='c' class='radio-option'/>Option 3
                    <br>
                    <input type="button" name="previous" class="previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />

                    <p>(3 of 5)</p>
                  </fieldset>
                  <fieldset>
                     <h3>Question 4</h3>

                    <input name="wpquiz_question4" id='wpquiz_question_4' type='radio' value='a' class='radio-option'/>Option 1
                    <br>
                    <input name="wpquiz_question4" id='wpquiz_question_4' type='radio' value='b' class='radio-option'/>Option 2
                    <br>
                    <input name="wpquiz_question4" id='wpquiz_question_4' type='radio' value='c' class='radio-option'/>Option 3
                    <br>
                    <input type="button" name="previous" class="previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next" />

                    <p>(4 of 5)</p>
                  </fieldset>
                  <fieldset>


                     <h3>Question 5</h3>


                    <input name="wpquiz_question5" id='wpquiz_question_5' type='radio' value='a' class='radio-option'/>Option 1
                    <br>
                    <input name="wpquiz_question5" id='wpquiz_question_5' type='radio' value='b' class='radio-option'/>Option 2
                    <br>
                    <input name="wpquiz_question5" id='wpquiz_question_5' type='radio' value='c' class='radio-option'/>Option 3



                    <br>
                    <label for= 'wpquiz_email'>Email</label>


                    <input name="wpquiz_email" id="wpquiz_email" type="text" value="<?php echo htmlspecialchars($email);?>" class="regular-text" />
                    <span class="error"><?php echo $emailErr?></span>
                    <br>
                    <input type="button" name="previous" class="previous" value="Previous" />
                  <br>
                  <input class="button-primary" id= 'submit' type="submit" name="wpquiz_email_submit" value="Find Results" />

                  </fieldset>
              </form>
            </div> <!-- .inside -->

          <div class="postbox">

            <h3><span>Welcome to you Quiz!</span></h3>
            <div class="inside">
              <div class ='previous results'>
                <p>Below are 20 more recent results</p>
                  <div class= 'wpquiz'>
                    <p>Emily</p>
                    <img class ="wpquiz-pic" width='120px' src="<?php echo $plugin_url . '/images/facebook.png'; ?>">
                  </div>
              </div>
            </div> <!-- .inside -->
          </div> <!-- .postbox -->

        </div> <!-- .meta-box-sortables .ui-sortable -->

      </div> <!-- post-body-content -->

      <!-- sidebar -->
      <div id="postbox-container-1" class="postbox-container">

        <div class="meta-box-sortables">

        </div> <!-- .meta-box-sortables -->

      </div> <!-- #postbox-container-1 .postbox-container -->

    </div> <!-- #post-body .metabox-holder .columns-2 -->

    <br class="clear">
  </div> <!-- #poststuff -->

</div> <!-- .wrap -->

<script type="text/javascript">
//jQuery time
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
  if(animating) return false;
  animating = true;

  current_fs = $(this).parent();
  next_fs = $(this).parent().next();

  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

  //show the next fieldset
  next_fs.show();
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'transform': 'scale('+scale+')'});
      next_fs.css({'left': left, 'opacity': opacity});
    },
    duration: 800,
    complete: function(){
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;

  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();

  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

  //show the previous fieldset
  previous_fs.show();
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    },
    duration: 800,
    complete: function(){
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".submit").click(function(){
  return false;
})
