<!DOCTYPE html>

<?php

session_start();

unset ($_SESSION['user_name']);
unset ($_SESSION['pass']);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregisteration');

$name = $_POST['user_name'];
$pass = $_POST['pass'];
$_SESSION['flash'] = 'Welcome '. $name;

$s = "select * from  usertable where user_name ='$name' and pass= '$pass'";
$msg = " ";
$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
    $msg =  "";

    $_SESSION['user_name'] = $name;
    $_SESSION['pass'] = $pass;
    header("location:index.php");

}
else {

    $msg = "Username or Password is incorrect";
}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
    <link rel="stylesheet" href="back.css">
</head>

<body>
    <?php include("menu.php")?>
 
    <div class="login">
        <form action="" method="POST">
            <div><?php 
                if(isset($_SESSION['register_msg']))
                {
                    $msg = $_SESSION['register_msg'];
                    unset ($_SESSION['register_msg']);       
                }
            ?></div>
            <h1>Login</h1>
            <div class="loginbox"> 
                <input type="text" placeholder="Enter Your Username" name="user_name" id="user_name"><br>
                <input type="password" placeholder="Enter Your Password" name="pass" id="pass"><br>
                <input type="submit" name="submit" id="submit" value="Submit" >
                <?php
                   if (isset ($msg))
                    echo "<br>".$msg;
                ?>
            </div>
        </form>
    </div>
</body>


</html>