<?php 
    session_start();
    if(isset($_SESSION['user_name']))
    {
     $user_name = $_SESSION['user_name'];
    }
    include("post.php");
    $result = fetch_post();
    $num = mysqli_num_rows($result);
    
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
<body >

<?php include("menu.php")?> 






<h3 style="text-align:center;">
<?php if (isset($_SESSION['flash'])) {
   echo  $_SESSION['flash'];
   unset($_SESSION['flash']);
}?>         
</h3>

<div class="post col-md-12 col-sm-12" style="margin-top:-10px;">
<?php 
foreach ($result as $value) {
                     
 ?>
        <div class="center col-sm-12">
            <div class="postuser">
                
                <div class="user" >
                    <h2><?php echo $value['title']; ?></h2>
                    <h5><?php echo $value['user_name']; ?></h5>
                    <p style="font-size:12px; "><?php echo $value['date']; ?></p>
                
                </div>
                <div class="postdetail">
                    <?php 
                    if(strlen($value['content'])<350)
                    {   echo $value['content']; 
                    }
                    else
                    {
                        echo mb_strimwidth( $value['content'], 0, 350);
                        echo "<a href='openpost.php?id=" ?> 
                        <?php echo $value['id'];?>
                        <?php echo "'> read more </a>";
                    }
                    ?>
                </div>
                
            </div>
        </div>
<?php
    }
?>

    </div>
</body>
</html>