<?php

session_start();
$_SESSION['flash'] = 'Post Published';
if(isset($_SESSION['user_name']))
  {
    $user_name = $_SESSION['user_name'];
    $pass = $_SESSION['pass'];
  }
if($_SERVER["REQUEST_METHOD"] == "POST")
{

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregisteration');


$name = $_SESSION['user_name'];
$title = $_POST['title'];
$content = $_POST['content'];
date_default_timezone_set('Asia/Kolkata');  
$date = date('Y-m-d H:i:s');   

    $reg = "insert into post (user_name, title, content, date) values ('$name','$title','$content','$date')";
    mysqli_query($con, $reg);
    $msg="Post published Succesful";
    header("location: index.php");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEW POST</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

<?php 
 include("menu.php");

 ?> 
<body>
<form action="" method="POST" style="width:80%; margin: 0 auto;">
  <div class="form-group">
    <label for="title">NEW POST</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
  </div>
  <div class="form-group">
    <label for="content">Post</label>
    <textarea class="form-control" id="content" name="content" rows="8"></textarea>
  </div>
  <button type="submit" class="btn btn-primary ">Publish</button>
</form>
</body>
</html>