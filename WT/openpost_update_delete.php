<?php
        session_start();
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

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
    <link rel="stylesheet" href="viewpost.css">
</head>

<body>
<?php include("menu.php")?> 

<div class="post">
<?php 
foreach ($result as $value) {
                     
 ?>
    <div class="center">
        <div class="postuser col-md-12 col-sm-12">
                <div class="user">
                <div class="update1">
                    <a href='update.php?id=<?php echo $value['id'];?>'> <button type="button" class="btn btn-primary">Update</button></a>
                    <a href='delete.php?id=<?php echo $value['id'];?>'><button type="button" class="btn btn-danger">Delete</button></a>
                </div>
                <div>
                    <h2><?php echo $value['title']; ?></h2>
                    <h5><?php echo $value['user_name']; ?></h5>
                    <h6><?php echo $value['date']; ?></h6>
                </div>
                <div class="postdetail" style="overflow:auto;">
                    <?php echo $value['content']; ?>
                </div>
       
        </div>
    </div>
     <?php
    }
?>
</div>
</body>
</html>