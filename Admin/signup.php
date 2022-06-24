<?php 

include "conn.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Page</title>
   
   
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
        <h3>Admin Sign Up</h3>
       
      </div>
      <div class="card-body">
        <form method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Name">
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Email">
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="password">
          </div>

          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="c_password" class="form-control" placeholder="Confirm password">
          </div>

          
          <div class="form-group">
            <input type="submit" name="signup" value="Submit" class="btn float-right login_btn">
          </div>
        </form>

<?php 

if(isset($_POST['signup'])){
  
  $name=$_POST['name'];

  $email=$_POST['email'];

  $password= $_POST['password'];

  $c_password= $_POST['c_password'];

  $password_len=strlen($password);

  $hashpassword=password_hash($password, PASSWORD_DEFAULT);

  if($password == $c_password){

    $sel="select * from admin_auth where email='$email' ";

    $qry=mysqli_query($conn,$sel);

    $emailchk=mysqli_num_rows($qry);

    if($emailchk== 0){

      if($password_len>=8){

        $ins = "insert into admin_auth (name,email,password) VALUES ('$name','$email','$hashpassword')";
        $qry=mysqli_query($conn,$ins);

        if($qry){

          ?>
            <script type="text/javascript">
          
              alert("Sign Up Successfully Done !!! ");
            </script>

        <?php
        }else{

          ?>
            <script type="text/javascript">
          
              alert("Something Wrong to Sign Up  ");
            </script>

        <?php
        }


      }else{

        ?>
        <script type="text/javascript">
      
          alert("Password length Should Be Eight or more ");
        </script>

        <?php
      }

    }

    else{

      ?>

       <script type="text/javascript">
      
        alert("Email Already Exist");
      </script>

      <?php
    }


  }else{
    
    ?>

    <script type="text/javascript">
      
      alert("Password Not Matched");
    </script>

    <?php
  }


}



?>



















      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Log In From Here<a href="login.php">Log in</a>
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












