<?php 
session_start();
include"conn.php" ;

?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->

   
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="../asset/auth.css">
  <style type="text/css">
    html,body{
      background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%;
      font-family: 'Numans', sans-serif;
      }

  </style>

</head>
<body class="body1">
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Publisher Log In</h3>
       
      </div>
      <div class="card-body">
        <form method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" name="publisher_email" placeholder="Email " required>
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="publisher_password" class="form-control" placeholder="Password">
          </div>
          
          <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn  login_btn">
          </div>
        </form>

        <?php

        if (isset($_POST['login'])) {
          
          $email=$_POST['publisher_email'];

          $password=$_POST['publisher_password'];

          $sel="select * from  publisher_auth where publisher_email='$email' ";

          $qry=mysqli_query($conn,$sel);

          $emailchk=mysqli_num_rows($qry);

          $data=mysqli_fetch_array($qry);

          if($emailchk> 0){

            if(password_verify($password, $data['publisher_password'])){

              $_SESSION['publisher_id'] =$data['id'];
              $_SESSION['publisher_name'] =$data['publisher_name'];
              $_SESSION['publisher_email'] =$data['publisher_email'];

              header('Location:dashboard.php');
              

            }else{

              ?>
            <script type="text/javascript">
          
              alert("Password Not Matched ");
            </script>

            <?php

            }

            }else{

               ?>
            <script type="text/javascript">
          
              alert("Email Not Matched ");
            </script>

            <?php
            }

          }

        ?>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          
        </div>
        <div class="d-flex justify-content-center">
          <a href="#">Forgot your password?</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>