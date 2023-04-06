<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login_adduser.css" />
  </head>
  <body>
  <?php
  session_start();
  include_once('../data/connection.php');
?>
    <div class="form-wrapper">
      <div class="form-left">
        <div class="logo-login">
          <img class="logo-left" src="../image/Logo.png" alt="Logo" />
        </div>
        <div class="image-login">
          <img
            class="image-left"
            src="../image/login_register.jpg"
            alt="Image"
          />
        </div>
      </div>
      <form action="" class="form-right" method="Post" enctype="multipart/form-data">
        <p class="title-right">Login</p>
        <p class="sub-title-right">Log in your account</p>
        <input type="email" class="input-username" name="txtUsername" placeholder="Email" />
        <input type="password" class="input-password" name="txtPassword" placeholder="Password" />
        <input type="submit" class="login-btn" name="btnLogin" value="Login">
        <!-- Login</button> -->
      </form>
    </div>

    <?php   
    
    if (isset($_POST['btnLogin']))
    {
	    $us = $_POST['txtUsername'];
	    $pa = $_POST['txtPassword'];	
        $err = "";
   	    if($us==""){
		    $err .= "<script> alert('Enter Email, please')</script>";
        
	    }
	    if($pa==""){
		    $err .= "<script> alert('Enter Password, please')</script>";
	    }
	    if($err != ""){
		    echo $err;
	    }
	    else{
        $pass = md5($pa);
		    $res=mysqli_query($conn, "SELECT * FROM user_tb WHERE email='$us' AND password='$pass'")
		    or die(mysqli_errno($conn));
		    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

        if(mysqli_num_rows($res) == 1){				
          $_SESSION["us"] = $us;
          $_SESSION["role"] = $row["state_code"];
          $_SESSION["fu"]=$row['fullname'];
          echo "<script> alert('Login successfully')</script>";
          header("Location: ../index.php?");

        }
		    else{
          echo "
          <script> 
          alert('You loged in fail');
          </script>
          ";
          // echo '<meta http-equiv="refresh" content="0;URL=login.php"/>';

        }						
	    }
    }
?>
  </body>
</html>
