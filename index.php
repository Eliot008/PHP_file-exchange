<?php 
    date_default_timezone_set('Europe/Kyiv');
    include 'config.php';
    include 'comments.inc.php';
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Title of the document</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
      body{ font: 14px sans-serif; text-align: center; }
  </style>
</head>

<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        <?php  if($_SESSION["username"] == 'admin'){ ?>
            <a href="shellcommand.php" class="btn btn-warning">Shell</a>
        <?php } ?>
    </p>
  <?php
      if(isset($_POST['submit'])){
          $fileName = $_FILES['file']['name'];
          $fileTmpName = $_FILES['file']['tmp_name'];
          $path = "files/".$fileName;
          
          $query = "INSERT INTO filedownload(filename) VALUES ('$fileName')";
          $run = mysqli_query($link,$query);
          
          if($run){
              move_uploaded_file($fileTmpName,$path);
              echo "success";
          }
          else{
              echo "error".mysqli_error($link);
          }
          
      }
    ?>  
  <table border="1px" align="center">
       <tr>
           <td>
               <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="submit" name="submit"> Upload</button>
                </form>
           </td>
       </tr>
       <tr>
           <td>
              <?php
               $query = "SELECT * FROM filedownload";
               $run = mysqli_query($link,$query);
               while($rows = mysqli_fetch_assoc($run)){?>
               <?php echo $rows['filename']; $id = $rows['id']; $_name = $rows['filename'];?>
               
               <a href="download.php?file=<?php echo $rows['filename'] ?>">Download</a><br>
               <a href="comment.php?id_post=<?php echo $rows['id'] ?>">Comment</a><br>
               <a href="showcomment.php?id_post=<?php echo $rows['id'] ?>">Show comment</a><br>
               <?php
                }
               ?>              
            </td>
       </tr>
   </table>
   
  
   
   
</body>
</html>