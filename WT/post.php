

<?php

function fetch_post(){
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'userregisteration');
        $s = "select * from  post ORDER BY date DESC";
        $msg = " ";
        $result = mysqli_query($con, $s);
        return $result;
}
?>