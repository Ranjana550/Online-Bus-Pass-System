<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  background-color: white;
  background-image:
                    url(banner_bg.png),
                     url(about_bg.png);

}
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.content {
  max-width: 500px;
  margin: auto;
}
.details{
  background-color:  ;
}
.pass{
  background-color:#3480F9  ;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 500px;
}
</style>
</head>
<body bgcolor ="white ">
  <a class="navbar-brand" href="index.html"> <img src="logo.jpg" alt="logo" height="100" width="100"> </a>

  <div class="content">


<?php
// define variables and set to empty values
$name = $email = $gender = $pass=$pay = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $address = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
  $pass = test_input($_POST["pass"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="details">
  <h2>Enter your details here!!!</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
   Phone Number<input type="text" name="website">
  <br><br>
  Address: <textarea name="comment" rows="1" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>
  Pass Type:
  <input type="radio" name="pass" value="Monthly">Monthly
  <input type="radio" name="pass" value="One Way">One Way Route
  <input type="radio" name="pass" value="Daily">Daily
  <br><br>
  Payment Mode:
  <input type="radio" name="pay" value="Credit Card">Credit
  <input type="radio" name="pay" value="Debit Card">Debit

  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

</div>
<br>
<br>
<div class="pass">
  <div align="center">
<?php
echo "<h2>Your Pass:</h2>";
?>
<br>


<img src="img_avatar2.png" alt="Avatar" class="avatar" align="center">
<br>

<?php
echo("Name :");
echo $name;
echo "<br>";
echo("Email :");
echo $email;
echo "<br>";
echo("Phone Number :");
echo $website;
echo "<br>";
echo("Gender : ");
echo $comment;

echo $gender;
echo "<br>";
echo("Pass Type : ");
echo $pass;
?>
<br>
<br>
<?php
if(isset($_POST['pass'])) {
    if($_POST['pass'] == 'Monthly') {
      echo "Today is : " . date("d-m-Y") . "<br>";

      $date=date_create(date("d-m-Y"));
      date_add($date,date_interval_create_from_date_string("29 days"));
      echo "Pass is valid till date : ";
      echo date_format($date,"d-m-Y");

    } elseif($_POST['pass'] == 'Daily') {
        // code for NO here
        echo "Today is : " . date("d-m-Y") . "<br>";

        $date=date_create(date("d-m-Y"));
        date_add($date,date_interval_create_from_date_string("1 days"));
        echo "Pass is valid till date : ";
        echo date_format($date,"d-m-Y");
    }
elseif($_POST['pass'] == 'One Way') {
    // code for NO here
    echo "Today is : " . date("d-m-Y") . "<br>";

    $date=date_create(date("d-m-Y"));
    date_add($date,date_interval_create_from_date_string("29 days"));
    echo "Pass is valid till date : ";
    echo date_format($date,"d-m-Y");
}
}
?>
</div>
</div>
</div>
</body>
</html>
