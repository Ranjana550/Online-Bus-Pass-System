


        </<?php

        $con = mysqli_connect('localhost','root','');
        if(!$con){
          echo 'Not Connected';
        }
        if(!mysqli_select_db($con,'pass')){
          echo "not Connected";
        }
        $Mob = $_POST['mob'];

        $sql = "INSERT into  mobile number  (Mob.No) VALUES ('$Mob')";
        if(!mysqli_query($con, $sql)){
          echo "not inserted";
        }
        else
        {
          echo "inserted";
        }
        header("refresh:10; url=OTP1.html");
        ?>
