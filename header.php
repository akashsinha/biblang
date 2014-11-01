<?php session_start(); ?>
<?php
if ($_SESSION["name"]) {
$name = "Hello ".$_SESSION["name"] ." !";
$contact="";
$about="";
} else {
$name = "Signup";
$contact="Contact";
$about = "About";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Learn the language of god</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/cover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="jquery-min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <a href="./"><h2 class="masthead-brand">Biblang</h2></a>
              <ul class="nav masthead-nav">
                <li><a href="#"><?php echo $about;?></a></li>
                <li><a href="#"><?php echo $name;?></a></li>
                <li><a href="#"><?php echo $contact;?></a></li>
              </ul>
            </div>
          </div>
 
