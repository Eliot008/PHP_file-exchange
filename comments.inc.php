<?php
function setComments($link){
  if(isset($_POST['commentSubmit'])){
    $uid = $_POST['uid'];
    $pid = $_POST['pid'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    $sql = "INSERT INTO comments(uid, pid, date, message) VALUES ('$uid', '$pid', '$date', '$message')";
    $result = $link->query($sql);

  }  
} 

