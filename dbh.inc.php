<?php
 
$conn = mysqli_connect('localhost', 'root', '', 'test');

if(!$conn){
    die("ERROR: Could not connect. ".mysqli_connect_error());
}