</<?php

$con = mysqli_connect('localhost','root','');
if(!$con){
  echo 'Not Connected';
}
if(!mysqli_select_db($con,'tutorial')){
  echo "not Connected";
}
$Email = $_POST['email'];
$Password = $_POST['password'];
$sql = "INSERT into person (Email,Password) VALUES ('$Email','$Password')";
if(!mysqli_query($con, $sql)){
  echo "not inserted";
}
else
{
  echo "inserted";
}
header("refresh:10; url=BusLogin.html");
?>
