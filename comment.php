<?php 
    date_default_timezone_set('Europe/Kyiv');
    include 'index.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Title of the document</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <body>
    <?php
    if(!empty($_GET['id_post'])){
        $idNUmber  = basename($_GET['id_post']);
        echo "<form method='POST' action='".setComments($link)."'>
          <input type='hidden' name='uid' value='".$_SESSION["username"]."'>
          <input type='hidden' name='pid' value='".$id."'>
          <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
          <textarea name='message'></textarea><br>
          <button type='submit' name='commentSubmit'>Comment to '".$_name."'</button>
      </form>";
    }
  ?>
  </body>
</head>






