<html>
<head>
  <style>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  body{
    background-color: white;
    background-image:
                      url(banner_bg.png),
                       url(about_bg.png);

  }
  .button {
    align-items: center;
    background-color: #fff;
    border-bottom-left-radius: var(--loginBorderRadius);
    border-bottom-right-radius: var(--loginBorderRadius);
    display: flex;
    justify-content: space-between;
    padding-bottom: 1.5em;
    padding-left: 1.5em;
    padding-right: 1.5em;
  }

  .button {
    margin: 0;
  }

</style>
</head>
<body bgcolor="#C8EEFC">
<div class="button">
<a href="pass.php"><input type="button" value="Apply"></a>
</div>
<?php
$con = mysqli_connect("localhost","root","","store") or die(mysqli_error($con));
if(isset($_POST ['Email'])){
$Email=$_POST['Email'];
$Password=$_POST['Password'];
}
$query="select * from user WHERE Email='$Email' and Password='$Password'";
$res=mysqli_query($con,$query) or die("failed".mysqli_error($con));
$number_of_users = mysqli_num_rows($res);
echo "$number_of_users";
echo "<br>";
if($number_of_users == 1){
  echo "Success";
}
else {
  echo "Failure";
}
?>

</body>
</html>
