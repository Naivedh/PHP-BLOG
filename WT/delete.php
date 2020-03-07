<?php
        session_start();
        $_SESSION['flash'] = 'Post Deleted';
        if(isset($_SESSION['user_name']))
        {
            $user_name = $_SESSION['user_name'];
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }   
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'userregisteration');
        $reg = "DELETE FROM  post WHERE id = '$id';";
        mysqli_query($con, $reg);
  
       header("location: index.php");


       
?>
