<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

<div class="wrap">

  <div id="poststuff">

    <div id="post-body" class="metabox-holder columns-2">

      <!-- main content -->
      <div id="post-body-content">

        <div class="meta-box-sortables ui-sortable">

          <div class="postbox">

            <h3><span>Welcome to you Quiz!</span></h3>
            <div class="inside">
              <form id ="wpquiz_form" name='wpquiz_form' method = 'post' action = "http://localhost:8888/make-it-work/quiz-results/" onsubmit="return validateForm()">
                <fieldset name="first">
                  <h3>Question 1</h3>
                  <div style="color:red" class="wperror">Please Select A Response</div>
                  <input name="wpquiz_question1" id='wpquiz_question_1' type='radio' value='1' class='radio-option' onchange="toggleStatus()"/><span class='wpquiz_option'> Option 1</span>
                  <br>
                  <input name="wpquiz_question1" id='wpquiz_question_1' type='radio' value='2' class='radio-option' onchange="toggleStatus()" /><span class='wpquiz_option'> Option 2</span>
                  <br>
                  <input name="wpquiz_question1" id='wpquiz_question_1' type='radio' value='3' class='radio-option' onchange="toggleStatus()" /><span class='wpquiz_option'> Option 3</span>
                  <br>
                  <input name="wpquiz_question1" id='wpquiz_question_1' type='radio' value='4' class='radio-option' onchange="toggleStatus()" /><span class='wpquiz_option'> Option 4</span>
                  <br>
                    <input type="button" name="next" id="wpquiz_question1" class="next action-button" value="Next" />

                  <p>(1 of 5)</p>
                </fieldset>
                <fieldset name= "second">
                   <h3>Question 2</h3>
                   <div style="color:red" class="wperror">Please Select A Response</div>
                  <input name="wpquiz_question2" id='wpquiz_question_2' type='radio' value='1' class='radio-option' onchange="toggleStatus2()"/>Option 1
                  <br>

                  <input name="wpquiz_question2" id='wpquiz_question_2' type='radio' value='2' class='radio-option' onchange="toggleStatus2()"/>Option 2
                  <br>
                  <input name="wpquiz_question2" id='wpquiz_question_2' type='radio' value='3' class='radio-option' onchange="toggleStatus2()"/>Option 3
                  <br>
                  <input name="wpquiz_question2" id='wpquiz_question_2' type='radio' value='4' class='radio-option' onchange="toggleStatus2()"/>Option 4
                  <br>
                  <input type="button" name="next"  id="wpquiz_question2" class="next action-button" value="Next" />
                  <p>(2 of 5)</p>
                </fieldset>

                <fieldset>
                   <h3>Question 3</h3>
                  <div style="color:red" class="wperror">Please Select A Response</div>
                  <input name="wpquiz_question3" id='wpquiz_question_3' type='radio' value='1' class='radio-option' onchange="toggleStatus3()"/>Option 1
                  <br>
                  <input name="wpquiz_question3" id='wpquiz_question_3' type='radio' value='2' class='radio-option' onchange="toggleStatus3()"/>Option 2
                  <br>
                  <input name="wpquiz_question3" id='wpquiz_question_3' type='radio' value='3' class='radio-option' onchange="toggleStatus3()"/>Option 3
                  <br>
                  <input name="wpquiz_question3" id='wpquiz_question_3' type='radio' value='4' class='radio-option' onchange="toggleStatus3()"/>Option 4
                  <br>
                  <input type="button" name="next" id="wpquiz_question3" class="next action-button" value="Next" />

                  <p>(3 of 5)</p>
                </fieldset>
                <fieldset>
                  <h3>Question 4</h3>
                 <div style="color:red" class="wperror">Please Select A Response</div>
                  <input name="wpquiz_question4" id='wpquiz_question_4' type='radio' value='1' class='radio-option' onchange="toggleStatus4()"/>Option 1
                  <br>
                  <input name="wpquiz_question4" id='wpquiz_question_4' type='radio' value='2' class='radio-option' onchange="toggleStatus4()"/>Option 2
                  <br>
                  <input name="wpquiz_question4" id='wpquiz_question_4' type='radio' value='3' class='radio-option' onchange="toggleStatus4()"/>Option 3
                  <br>
                  <input name="wpquiz_question4" id='wpquiz_question_4' type='radio' value='4' class='radio-option' onchange="toggleStatus4()"/>Option 4
                  <br>
                  <input type="button" name="next"  id="wpquiz_question4" class="next action-button" value="Next" />

                  <p>(4 of 5)</p>
                </fieldset>

                <fieldset>


                   <h3>Question 5</h3>

                   <div style="color:red" id="wperror5"></div>
                  <input name="wpquiz_question5" id='wpquiz_question_5' type='radio' value='1' class='radio-option' onchange="toggleStatus5()"/>Option 1
                  <br>
                  <input name="wpquiz_question5" id='wpquiz_question_5' type='radio' value='2' class='radio-option' onchange="toggleStatus5()"/>Option 2
                  <br>
                  <input name="wpquiz_question5" id='wpquiz_question_5' type='radio' value='3' class='radio-option' onchange="toggleStatus5()"/>Option 3
                  <br>
                  <input name="wpquiz_question5" id='wpquiz_question_5' type='radio' value='4' class='radio-option' onchange="toggleStatus5()"/>Option 4
                  <br>
                  <label for= 'wpquiz_email'>Email</label>

                  <input name="wpquiz_email" id="wpquiz_email" type="text" value="<?php echo htmlspecialchars($email);?>" class="regular-text" />
                  <!-- <span class="error"><?php echo $emailErr?></span> -->
                  <br>
                  <input class="button-primary" id= 'submit' type="submit" name="wpquiz_email_submit" value="Find Results"/>

                </fieldset>
              </form>
            </div> <!-- .inside -->

        </div> <!-- .meta-box-sortables -->

      </div> <!-- #postbox-container-1 .postbox-container -->

    </div> <!-- #post-body .metabox-holder .columns-2 -->

    <br class="clear">
  </div> <!-- #poststuff -->

</div> <!-- .wrap -->
<script type="text/javascript">
  $('.wperror').hide();
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var isChecked = false

function toggleStatus(){
  if ($('.radio-option').is(':checked')){
    $('.wperror').hide();
  }
  isChecked = true
}
function toggleStatus2(){
  if ($('.radio-option').is(':checked')){
    $('.wperror').hide();
  }
  isChecked = true
}
function toggleStatus3(){
  if ($('.radio-option').is(':checked')){
    $('.wperror').hide();
  }
  isChecked = true
}
function toggleStatus4(){
  if ($('.radio-option').is(':checked')){
    $('.wperror').hide();
  }
  isChecked = true
}
function toggleStatus5(){
  if ($('.radio-option').is(':checked')){
    $('#wperror5').hide();
  }
  isChecked = true
}

function validateForm(){
  var x=document.forms["wpquiz_form"]["wpquiz_email"].value;
  var atpos=x.indexOf("@");
  var dotpos=x.lastIndexOf(".");
  var radio = document.forms["wpquiz_form"]["wpquiz_question5"].value
  if (radio){
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
      {
      alert("Not a valid e-mail address");
      return false;
    }
  } else{
    document.getElementById('wperror5').innerHTML="Please Make a Selection";
    return false;
  }

}

$(".next").click(function(e){
  if (isChecked){
    // console.log(current_fs)
    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    // var current_question = current_fs.context.id
    // var radio = document.forms["wpquiz_form"][current_question].value
    // console.log(current_question)
    // console.log(radio)
    // if (radio){
    // $('.wperror').hide();


    //show the next fieldset
    current_fs.hide();
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
    isChecked = false
  } else {
    // console.log("sorry emily")
    $('.wperror').show();
    e.preventDefault()
  }

});









$(".previous").click(function(){
  $('.wperror').hide();
  isChecked = true

  if(animating) return false;
  animating = true;

  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();

  //show the previous fieldset
  current_fs.hide();
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
isChecked = true
});



// $('#wpquiz_next_button').click(function(){

// })
// $(".submit").click(function(){
//   return false;
// })

</script>
