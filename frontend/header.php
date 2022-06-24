<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP Blog Project</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">   
	
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Tranding</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                       
                        <div class="text-truncate"><a class="text-secondary" href="">Gubergren elitr amet eirmod et lorem diam elitr, ut est erat Gubergren elitr amet eirmod et lorem diam elitr, ut est erat</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-right d-none d-md-block">
                <?php 

                	date_default_timezone_set('Asia/Dhaka');
                	echo date('d-M-y  h:i  A');
                ?>
            </div>

            <div class="col-md-2 text-right d-none d-md-block">

            	<?php 
            		if (!isset($_SESSION['user_id'])) {
            			?>
            			<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
						  Login
						</button>
            	<?php
            		}else{
            			?>
            		<a href="#"><h6 class="text-center"style="border: 2px solid gray; padding: 5px 5px;"><?php echo $_SESSION['user_name']; ?></h6>
						  
					</a>
					<!-- <a href="">Logout</a> -->

            	<?php
            		}
            	 ?>
                
                <!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">User Login</h5>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">
				        <div class="container text-left">
				        	
				        	<form method="post">
				        		<div class="form-group my-3">
				        			<label>User Email</label>
				        			<input type="email" name="email" placeholder="Enter Your Email" class="form-control">

				        		</div>
				        		<div class="form-group my-3">
				        			<label>User Password</label>
				        			<input type="password" name="password" placeholder="Enter Your Password" class="form-control">

				        		</div>

				        		<button type="submit" name="login" class="btn btn-sm btn-danger">Login</button>


				        	</form>
				        	<?php

						        if (isset($_POST['login'])) {
						          
						          $email=$_POST['email'];

						          $password=$_POST['password'];

						          $sel="select * from user_auth where email='$email' ";

						          $qry=mysqli_query($conn,$sel);

						          $emailchk=mysqli_num_rows($qry);

						          $data=mysqli_fetch_array($qry);

						          if($emailchk> 0){

						            if(password_verify($password, $data['password'])){

						              $_SESSION['user_id'] =$data['id'];
						              $_SESSION['user_name'] =$data['name'];
						              $_SESSION['user_email'] =$data['email'];

						              header('Location:index.php');
						              

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
				        	<a href="user_reg.php">For Signup ?</a>
				        </div>
				      </div>


				      <div class="modal-footer">
				        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
				        
				      </div>
				    </div>
				  </div>
				</div>

            </div>


        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="index.php" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">BLOG</span>Project</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="img/ads-700x70.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">Blog</span>Project</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="category.html" class="nav-item nav-link">Categories</a>
                    <a href="single.html" class="nav-item nav-link">Single News</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text text-secondary"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

