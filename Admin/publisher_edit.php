<?php 

include 'conn.php';
$id= $_GET['id'];

session_start();
include 'conn.php';

if(!$_SESSION['admin_id']){

  header('Location: login.php');
}

$publish_select="select * from publisher_auth where id='$id'";
$publish_qry=mysqli_query($conn,$publish_select);
$data=mysqli_fetch_array($publish_qry);


?>

  <!-- Include HTML header Content Here -->

    <?php include"header.php" ;?> 

    <section class="main_inner">
      
    <div class="row">

      <!-- Include Sidebar Menu Content here -->

    <?php include "sidebar.php"; ?> 


        <!-- main content -->

        <div class="col-lg-9 py-3">
          
          <div class="container">

          	<div class="row">
          		

          		<div class="col-lg-6">
          			<h3>Update Publisher</h3>
          			<hr>
          			<form method="post">
          				<div class="form-group my-3">
	          				<label>Publisher Name</label>
	          				<input type="text" name="publisher_name" value="<?php echo $data['publisher_name']?>" class="form-control">
          				</div>
          				
          				<div class="form-group  my-3">
          					<label>Publisher Email</label>
          					<input type="email" name="publisher_email" value="<?php echo $data['publisher_email']?>" class="form-control">
          				</div>
          				
          				<!-- <div class="form-group my-3">
          					<label>Publisher Password</label>
          					<input type="password" name="publisher_password" placeholder="Enter Publisher password" class="form-control">
          				</div> -->

          				

          				<button type="submit" name="update" class="btn btn-primary">Update</button>
          			</form>


          			<?php 

					if(isset($_POST['update'])){
					  
					  $publisher_name=$_POST['publisher_name'];

					  $publisher_email=$_POST['publisher_email'];

					  $upd = "update publisher_auth set publisher_name='$publisher_name',publisher_email='$publisher_email' where id='$id'";

					  $qry=mysqli_query($conn,$upd);

					        if($qry){

					        	header('Location:addpublisher.php');

					          ?>
					            <script type="text/javascript">
					          
					              alert("Publisher Updated Successfully Done !!! ");
					            </script>

					        <?php
					        }else{

					          ?>
					            <script type="text/javascript">
					          
					              alert("Something Wrong to Update  ");
					            </script>

					        <?php
					        }


					      }

					    

					    

					



					?>
          			

          		</div>
          	</div>
            
            

          </div>

        </div>


      
    </div>



    <?php include "footer.php "; ?>