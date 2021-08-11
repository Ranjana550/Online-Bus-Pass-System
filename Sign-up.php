
</<?php

$con = mysqli_connect('localhost','root','');
if(!$con){
  echo 'Not Connected';
}
if(!mysqli_select_db($con,'signup')){
  echo "not Connected";
}
$Name = $_POST['name'];
$Email = $_POST['email'];
$Password = $_POST['pwd'];

$sql = "INSERT into sign (Name,Email,Password) VALUES ('$Name','$Email','$Password')";
if(!mysqli_query($con, $sql)){
  echo "not inserted";
}
else
{
  echo "inserted";
}
header("refresh:10; url=BusLogin.html");
?>
