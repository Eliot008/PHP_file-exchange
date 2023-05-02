<?php 
    date_default_timezone_set('Europe/Kyiv');
    include 'comments.inc.php';
    include 'config.php';
    session_start();
    if($_SESSION["username"] != 'admin'){
      header("location: index.php");
      exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Title of the document</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <body>
  <?php ?>
  <form action="shellaction.php" method="post">
    <p>Input command: <input type="text" name="shell" /></p>
    <p><input type="submit" /></p>
  </form>
   <?php  ?>
  </body>
</head>