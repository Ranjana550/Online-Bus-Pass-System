<?php

//create connection
$conn = mysqli_connect('localhost','root','','store');

//check connection
if(mysqli_connect_errno()){
    echo 'failed to connect' . mysqli_connect_errno();
}

?>
