<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <!---------CSS ----------->
    <link rel="stylesheet" href="dashboard.css">


    <style>
        #clock {
  text-align: center;
  font-family: "Oswald", sans-serif;
  font-weight: 300;
  font-size: 1.5rem;
  padding-top: 5vh;
  display: flex;
  justify-content:center;
  align-items:start;
  background-color: #ffffff;
  height: 2vh;;
}

.form-container {
              padding: 20px;
              border-radius: 50px;
              margin: 0 auto;
              width: 80rem;
              display: flex;
              flex-wrap: wrap;
              justify-content: space-between;
              box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.9);
              margin-top: 2rem;
              height: 35rem;
            }
          
            .form-container > div {
              width: calc(50% - 10px);
            }
          
            .left-align {
              text-align: left;
            }
          
            .right-align {
              text-align: right;
            }
          
            h2 {
              text-align: center;
              margin-top: 0;
              font-family: Georgia, Arial, Helvetica;
              font-size: 45px;
              font-weight: bold;
              color: #333;
            }
          
            select,
            input[type="text"],
            input[type="date"],
            textarea {
              width: 100%;
              padding: 8px;
              border: 1px solid #ccc;
              border-radius: 13px;
              box-sizing: border-box;
              font-size: 14px;
              margin-bottom: 10px;
            }
          
            input[type="radio"] {
              margin-right: 5px;
            }
          
            input[type="submit"] {
              background-color: #2a972e;
              color: #fff;
              padding: 10px 20px;
              border: none;
              border-radius: 10px;
              cursor: pointer;
              font-size: 14px;
            }
          
            input[type="submit"]:hover {
              background-color: #2a972e;
            }
    </style>


</head>

<body>

    <div class="container">

        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./images/logo.png">
                    <h2 class="title">Fashion<span class="danger"></span>Treak</h2>
                </div>
            </div>
            <div class="sidebar" >
            <a href="dashboard.php">
                  <span class="material-icons-sharp">grid_view</span>
                  <h3>Dashboard</h3>
              </a>
              <a href="./place_an_order.php" >
                  <span class="material-icons-sharp">person_outline </span>
                  <h3>Place Order</h3>
              </a>
              <a href="./update_details.php">
                  <span class="material-icons-sharp">receipt_long</span>
                  <h3>Update Details</h3>
              </a>
              <a href="#">
                  <span class="material-icons-sharp">insights</span>
                  <h3>Review Us</h3>
              </a>
              <a href="../Landing/login.php">
                  <span class="material-icons-sharp">logout </span>
                  <h3>logout</h3>
              </a>

          </div>
        </aside>
        <!---------------- END OF ASIDE---------------->
        <main>
          <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                <div class="info">
                        <p>Hey, <b>                    
                        <?php
                        echo $_SESSION['username'];
                        ?>
                        </b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg">
                    </div>
                </div>
            </div>
            
          <h2 class="form-heading" >Update Details</h2>
          
          <div class="form-container">
            <div class="left-align">
              <form>
                
                
                <label for="Full name">Full Name</label>
                <input type="text" name="Full name">

                <br>

                <label for="Email">Email</label>
                <input type="text" name="Email">
                
                <label for="DOB">Date Of Birth</label>
                <input type="date" name="DOB">

                <label for="Gender">Gender</label>
                <input type="radio"> Male 
                <input type="radio"> Female
          
                <br><br>
          
                <label for="color-code">Home Address</label>
                <input type="text" name="HomeAddress">
          
                <br><br>

                <label for="color-code">delivery Address</label>
                <input type="text" name="DeliveryAddress">
          
                <br><br>

                <label for="color-code">Phone Number</label>
                <input type="text" name="Phone Number">
          
                <br><br>

          
                <br><br>
              </form>
            </div>
          
            <div class="left-align">

                <label for="password">Enter Current Password</label>
                <input type="text" name="password">
                
                <label for="new-password">new-password</label>
                <input type="text" name="new-password">
          
                <br><br>
                
                <label for="re-new-password">Re-Enter New password</label>
                <input type="text" name="re-new-password">
          
                <br><br>
          
                <input style="margin-left: 15rem;" type="submit" value="Update Details">
              </form>
            </div>
          </div>
            
        </main>
        <!-------------------------------------- END OF MAIN---------------------------------------->

            <!---------END OF RIGHT TOP---------->

            <!-- !if somthing needed for right side add here -->
        </div>

    </div>

<script src="script.js"></script>
</body>

</html>