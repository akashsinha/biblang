<?php require_once('header.php'); ?> 
<?php require_once('encodings.php'); ?> 
<?php
$langenc1 = $encodings[$_SESSION["lang1"]]; 
$langenc2 = $encodings[$_SESSION["lang2"]];
$loadfile = "data/lesson-".$langenc1."-".$langenc2.".php";
require_once($loadfile); 
$i = 0;
$lang2 = ucfirst($_SESSION['lang2']);
?>

<div class="lesson-div">
<h4> Part 1 of Lesson 1   - <?php echo ucfirst($_SESSION['lang1']); ?> to <?php echo ucfirst($_SESSION['lang2']); ?></h4>
<div class="container-fluid"> 
<?php
while ($i < $max) {
$class = ($i > 0 ) ? "display: none;" : "";
?>
<div class="row" style="<?php echo $class;?>" id="lessonr<?php echo $i;?>">
  <div class="col-md-3">
   <i style="color: gray;"><?php echo ($i + 1)."/$max";?></i>
    <br/>
    <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo $_SESSION["lang1"];?>" onClick="speak('<?php echo $langenc1;?>','<?php echo $words[$i];?>');"'><?php echo $words[$i];?> <img src="images/sound.png" height="20"/></button>
    <br/>
    <button style="margin-top: 1px;" class="btn btn-success" onClick="speak('<?php echo $langenc2;?>', '<?php echo $fwords[$i];?>');"><?php echo $fwords[$i];?> <img src="images/sound.png" height="20"/></button>
  </div>
  <div class="col-md-6">
    <img src="<?php echo $pics[$i];?>" height="200px;"/>  
  </div>
  <div class="col-md-3">
   <br/><br/>
   <button class="btn btn-success speak" data-index="<?php echo $i;?>" data-word="<?php echo $fwords[$i];?>"> <img src="images/mic.png" height="20"/> <?php echo $lang2;?></button>
   <div style="display:none;" class="text-warning">Please try again.</div>
   </div>
</div>

<?php
$i = $i + 1;
}
?>
<div class="row verse-row" style="display:none;color: #333;font-size: 15px;padding: 30px;">
    <div class="col-md-10">
    <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="<?php echo $_SESSION["lang1"];?>" onClick="speak('<?php echo $langenc1;?>','<?php echo $verse;?>');"'><?php echo $verse;?> <img src="images/sound.png" height="20"/></button>
    &nbsp; &nbsp;
    <button style="margin-top: 1px;" class="btn btn-success" onClick="speak('<?php echo $langenc2;?>', '<?php echo $fverse;?>');"><?php echo $fverse;?> <img src="images/sound.png" height="20"/></button>
   <br/><br/><div>Congratulations! You have completed lesson 1 <button class="btn btn-warning" onClick="startAgain();">Start again</button></div>
   </div>
   </div>


</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/1.4.0/annyang.min.js"></script>

<script type="text/javascript">
var wordToMatch;
var parent;
var next;
var button;
var index;
var matchings = new Array();
var helpText;
<?php
$i=0;
while($i < $max) {
print "matchings[".$i."] = '".$matchings[$i]."';\n";
$i = $i + 1;
}

?>

$("document").ready(function () {
$(".speak").click(function () {
 parent = $(this).parent().parent();
 next = parent.next();
helpText = $(this).next();
helpText.hide();
button = $(this);
button.addClass("btn-warning").removeClass("btn-success");
wordToMatch = $(this).data('word'); 
index = $(this).data('index');
wordToMatch = wordToMatch.toLowerCase();
startListening();
});

});

function startAgain() {
$(".verse-row").slideUp();
$("#lessonr0").fadeIn();
}


function doTransition() {
parent.slideUp();
next.fadeIn();
}

u = new SpeechSynthesisUtterance();
u.text = 'You have reached your destination';
u.lang = 'en-US';
u.rate = 1.2;
u.onend = function(event) { console.log('Speech complete'); }

function speak(lang, text){
 u.lang = lang;
 u.text = text;
 speechSynthesis.speak(u);
} 

 var matchResponse = function(repeat) {
      button.addClass("btn-success").removeClass("btn-warning");
      console.log(repeat);
       repeat = repeat.toLowerCase();
       console.log(wordToMatch);
       var similarWords = matchings[index];
       if (repeat == wordToMatch) {
         helpText.removeClass().addClass("text-success").text("Your response is correct").show();
         setTimeout(doTransition, 1000);
       } else if (similarWords.indexOf(repeat) > -1) {
         helpText.removeClass().addClass("text-success").text("Your response is correct").show();
         setTimeout(doTransition, 1000);
       } else {
       // Didn't match
         helpText.removeClass().addClass("text-danger").text("Your response is not correct. Please try again").show();
       }
}

// Let's define a command.
var commands = {
   ':repeat': matchResponse
};

//("#button").on("click", startListening)

var startListening = function() {
       
       // Turn on debugging for the console
       annyang.debug();
       // Initialize annyang with our commands
       annyang.setLanguage('<?php echo $langenc2;?>');
       annyang.removeCommands();
       annyang.addCommands(commands);
       annyang.start({autoRestart: false});
       
       setTimeout(function() {
button.addClass("btn-success").removeClass("btn-warning");
         if (!(helpText.is(":visible"))) {
           helpText.removeClass().addClass("text-danger").text("Sorry we couldn't listen to you. Please try again").show();
         }   
        annyang.abort()
       }, 3000);
}


</script>

<?php require_once('footer.php'); ?> 


