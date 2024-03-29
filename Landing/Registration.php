<?php

session_start();

//include db_connect.php file for database connection
require 'db_connect.php';


//!function to removesql injection with stripcslashes and mysqli_real_escape_string
function remove_sql_injection($value, $conn)
{
  $value = stripcslashes($value);
  $value = mysqli_real_escape_string($conn, $value);
  return $value;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {


  //get values from form
  $username = remove_sql_injection($_POST['fullName'], $conn);
  $email = remove_sql_injection($_POST['email'], $conn);
  $phone = remove_sql_injection($_POST['phone'], $conn);
  $dob = $_POST['dob'];
  $Haddress = remove_sql_injection($_POST['Haddress'], $conn);
  $Daddress = remove_sql_injection($_POST['Daddress'], $conn);
  $gender = remove_sql_injection($_POST['gender'], $conn);

  //passwords are passed into php variables 
  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];


  //hash password with password hash
  $Hashedpassword = password_hash($password, PASSWORD_DEFAULT);


  //confirm password using verify password
  $verify = password_verify($rePassword, $Hashedpassword);

  //print script error if password and rePassword are not same
  if ($verify == 1) {

    //send query if email,fullname,password,repassword are not empty
    $sql = "INSERT INTO `register_user` (`username`, `email`, `Passwords`, `DOB`, `HAddress_lane`, `D_address_lane`,`gender`) VALUES ('$username', '$email', '$Hashedpassword', '$dob','$Haddress', '$Daddress','$gender')";

    if ($conn->query($sql)) {

      //create a js alert to say successfully registered
      echo '<script>alert("Successfully Registered")</script>';

      //!genarating a random user id between 1000 and 9999 with USR prefix
      $user_id = "USR" . rand(1000, 9999);

      //update user_id in database
      $sql = "UPDATE `register_user` SET `User_id` = '$user_id' WHERE `register_user`.`username` = '$username'";
      $conn->query($sql);

      //redirect to login page
      header("location: login.php");
    } else {
      //create a js alert to say error
      echo '<script>alert("Error")</script>';
    }
  } else {
    echo '<script>alert("Password and Re-Password are not sameeee")</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Registration</title>

  <!---Custom CSS File--->
  <link rel="stylesheet" href="./css/registration.css" />
</head>

<body>



  <section class="container">
    <header>FasionTreak Garments <h2>Join with us</h2>
    </header>
    <form action="" class="Register-form" method=POST>
      <div class="input-box">
        <label>Username</label>
        <input type="text" placeholder="Enter full name" name="fullName" />
      </div>

      <div class="input-box">
        <label>Email Address</label>
        <input type="email" placeholder="Enter email address" name="email" required />
      </div>

      <div class="column">
        <div class="input-box">
          <label>Phone Number</label>
          <input type="phone" placeholder="Enter phone number" name="phone" />
        </div>
        <div class="input-box">
          <label>Birth Date</label>
          <input type="date" placeholder="Enter birth date" name="dob" />
        </div>

      </div>

      <div class="gender-box">
        <h3>Gender</h3>
        <div class="gender-option">
          <div class="gender">
            <input type="radio" id="check-male" name="gender" value="male" />
            <label for="check-male">male</label>
          </div>
          <div class="gender">
            <input type="radio" id="check-female" name="gender" value="female" />
            <label for="check-female">Female</label>
          </div>
        </div>
      </div>


      <div class="input-box address">
        <label>Home Address</label>
        <input type="text" name="Haddress" placeholder="Enter Home address" required />
        <label> delivery Address</label>
        <input type="text" name="Daddress" placeholder="Enter dilivary address" required />
      </div>


      <div class="input-box password">
        <label>Enter Password</label>
        <input type="password" name="password" placeholder="Enter Password" required>
        <label>Re-Enter Password</label>
        <input type="password" name="rePassword" placeholder="Re-Enter Password" required>
      </div>

      <button>Register</button>

      <div class="link">
        <p>Already have an account? <a style="text-decoration:none;" href="login.php">Login</a></p>
      </div>


    </form>
  </section>
</body>

</html>