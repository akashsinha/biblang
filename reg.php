<?php
require_once('encodings.php');
$name = $_POST["user"];
$lang1 = $_POST["lang1"];
$lang2 = $_POST["lang2"];
if ($_SESSION["name"]) {
session_destroy();
}
session_start();
$_SESSION["name"] = $name;
$_SESSION["lang1"] = $lang1;
$_SESSION["lang2"] = $lang2;
header("Location: lesson-1.php");
?>
