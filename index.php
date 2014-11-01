<?php require_once('header.php'); ?> 
<?php
if ($_SESSION["name"]) {
session_destroy();
}
?>
<div class="inner cover">
            <h1 class="cover-heading">Biblang</h1>
           <blockquote class="blockquote">
            <p class="lead">
Biblang helps you learn a new language using the words expressed by God in his book.           </p>
<i>I am the way, the truth, and the life.  No one comes to the Father except through me</i>
 <footer style="color:#fff;">
Jesus
</footer>
  </blockquote>
            <p class="lead">
              <a href="start.php" class="btn btn-lg btn-primary">Get started now</a>
            </p>
          </div>

<?php require_once('footer.php'); ?> 


