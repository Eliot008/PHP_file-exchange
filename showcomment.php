<?php 
    date_default_timezone_set('Europe/Kyiv');
    include 'config.php';
    include 'comments.inc.php';
?>

<?php
function getComments($link){
  if(!empty($_GET['id_post'])){
      $idNUmber  = basename($_GET['id_post']);
      $sql = "SELECT * FROM comments WHERE pid = '$idNUmber'";
      $result = $link->query($sql);
      while ($row = $result->fetch_assoc()){
        echo "<div class='comment-box'><p>";
          echo $row['uid']."<br>";
          echo $row['date']."<br>";
          echo nl2br($row['message']);
        echo "</p></div>";
      }
  }
}
?>

<?php 
  getComments($link);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Title of the document</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>