
<?php
// print_r($_POST);
$q1 = $_POST["wpquiz_question1"];
$q2 = $_POST["wpquiz_question2"];
$q3 = $_POST["wpquiz_question3"];
$q4 = $_POST["wpquiz_question4"];
$q5 = $_POST["wpquiz_question5"];
print_r($_POST);
// print $q1
$results = array($q1, $q2, $q3, $q4, $q5);
// $results = array(1,2,3);
// $kerry = array(1,2,3);
$kerry = array(1, 2, 3, 4, 1);

// print ($results);
if ($results == $kerry) {
  echo "champ";
} else{
  print $results;
  echo "sorry loser";
}

// $a1 = array(1,2,3);
// $a2 = array(1,2,3);

// if ( $a == $b ) {
//     echo 'We are the same!'
// }
// printArray($_POST);
// $results = $_POST
// echo "$results"

// $question_1 = $_POST["wpquiz_question1"];

// print ($results);


// function resultsArray($resuls){


//      foreach ($array as $key => $value){
//     if ($key == wpquiz_question1 && $value == a){
//       echo "emily";
//     }
//         echo "$key => $value";
//         if(is_array($value)){ //If $value is an array, print it as well!
//             printArray($value);
//         }
//     }
// }
?>

<a href="https://twitter.com/share" class="twitter-share-button" data-dnt="true" data-count="none" data-via="twitterapi">Tweet</a>
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="">
<meta name="twitter:title" content="Look at My Quiz">
<meta name="twitter:description" content="Take this quiz too">
<meta name="twitter:creator" content="">
<meta name="twitter:image:src" content="http://s3.amazonaws.com/img.goldderby.com/ck/images/Kerry_Washington-Scandal(1).jpg">
<meta name="twitter:domain" content="">
<meta name="twitter:app:name:iphone" content="">
<meta name="twitter:app:name:ipad" content="">
<meta name="twitter:app:name:googleplay" content="">
<meta name="twitter:app:url:iphone" content="">
<meta name="twitter:app:url:ipad" content="">
<meta name="twitter:app:url:googleplay" content="">
<meta name="twitter:app:id:iphone" content="">
<meta name="twitter:app:id:ipad" content="">
<meta name="twitter:app:id:googleplay" content="">
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>

