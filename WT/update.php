<?php
        session_start();
        $_SESSION['flash'] = ' Post Updated';
        if(isset($_SESSION['user_name']))
        {
            $user_name = $_SESSION['user_name'];
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }   
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'userregisteration');
        $s = "select * from  post where id =" . $id;
        $result = mysqli_query($con, $s);


if($_SERVER["REQUEST_METHOD"] == "POST")
{

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregisteration');


$name = $_SESSION['user_name'];
$title = $_POST['title'];
$content = $_POST['content'];
date_default_timezone_set('Asia/Kolkata');  
$date = date('Y-m-d H:i:s');   

    
    $reg = "UPDATE post SET title = '$title', content= '$content' WHERE id = '$id';";
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
    <title>Update</title>
    <script src="https://kit.fontawesome.com/b577eb39ae.js"></script>
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
</head>
<body>
<?php include("menu.php")
?>

<form action="" method="POST" style="width:80%; margin: 0 auto;">
<?php 
foreach ($result as $value) {
                     
 ?>
  <div class="form-group">
      
    <label for="title">NEW POST</label>
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $value['title'] ?>">
  </div>
  <div class="form-group">
    <label for="content">Post</label>
    <textarea  class="form-control" id="content" name="content" rows="8" ><?php echo $value['content']  ?></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary ">Update</button>
  <?php
    }
?>
</form>
</body>
</html>