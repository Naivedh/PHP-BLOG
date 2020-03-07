<?php

session_start();
$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'userregisteration');

$name = $_POST['user_name'];
$pass = $_POST['pass'];

$s = "select * from  usertable where user_name ='$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1) {
    echo "Username already taken";

}
else {
    $reg = "insert into usertable(user_name, pass) values ('$name', '$pass')";
    mysqli_query($con, $reg);
    $msg="Registration Succesful";
    $_SESSION['register_msg'] = $msg    ;
    header("location: login.php");
    
}

?>

