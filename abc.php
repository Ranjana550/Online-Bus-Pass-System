<?php

require('../config/db1.php');
error_reporting(E_ERROR|E_PARSE);
session_start();


if(isset($_POST['submit'])){ 		//TO CHECK LOGIN BUTTON CLICK

if(empty($_POST['email']) || empty($_POST['password'])){  //THE FILEDS CANNOT BE EMPTY
echo "FILL ALL THE DETAILS";
}

else{

$email=$_POST['email'];
$pass=($_POST['password']);
//$sql=" select * from clogin where cphno='$mobile' AND cpassword = '$pass' ";  //QUERY
$sql="select a.aid from user  as a where a.aEmail='$email' AND a.aPassword = '$pass'";

$result=mysqli_query($conn,$sql);	//PERFORMS THE QUERY AGAINST THE DATABASE
									//RETURNS mysqli_result OBJECT ON TRUE ELSE FALSE

$count=mysqli_num_rows($result);  	//RETURNS NUMBER OF ROWS IN RESULT SET



if($count)
{
				//TO ACCESS THE DATA IN ANOTHER .PHP FILE
	$_SESSION['email']=$_POST['email'];
	$_SESSION['password']=$_POST['password'];
	$details = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$_SESSION['aid'] = $details['aid'];
		$_SESSION['user_logged_in'] = TRUE;
		$_SESSION['alogin'] = TRUE;

	header('location:'.ROOT_URL.'');	//REDIRECT TO SPECIFIED LOC:
}
else{
	$error = "ENTER CORRECT NUMBER OR PASSWORD".'<br>';

}
}
}
 ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        body {
    background-image:
    url('img7.jpg');
  }

        body:before{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("img3.jpeg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            -webkit-filter: blur(10px);
            -moz-filter: blur(10px);
            -o-filter: blur(10px);
            -ms-filter: blur(10px);
            filter: blur(10px);
        }
        .contact-form
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 500px;
            padding: 80px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
        .avatar {
            position: absolute;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            top: calc(-80px/2);
            left: calc(50% - 40px);
        }
        .contact-form h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
        .contact-form h3 {
            margin: 0;
            padding: 0 0 20px;
            color: #fff;

            text-transform: uppercase;
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
        }
        .contact-form input
        {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-form input[type="text"],
        .contact-form input[type="password"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        .contact-form input[type="submit"] {
            height: 30px;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 25px;
            border: none;
            outline: none;
            margin-top: 15%;
            text-align: center;
        }
        .contact-form a
        {
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        input[type="checkbox"] {
            width: 20%;
        }
    </style>
</head>


<body>
	<div id="display">
			<div class="contact-form">


<div><?php if($count!=1): echo $error; endif ?>
        <img src="2.jpg" class="avatar">
        <h2>ADMIN LOGIN</h2>
</div>


<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<div class="form-group">

<label for="exampleInputEmail1"><h3>Email:</h3></label>

<input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email id">

</div>

<div class="form-group">

 <label for="exampleInputPassword1"><h3>Password:</h3></label>

 <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">

</div>

<p><input type="checkbox"> Remember Me</p>

			  <input type="submit" name="submit" class="btn btn-primary" align="center">

</div>
</form>
	</body>
</html>
