<?php
session_start();
include 'conn.php';

if(!$_SESSION['admin_id']){

  header('Location: login.php');
}

function addTitle(){

	return "Admin Publisher Manage | Admin Dashboard";
}

$publish_select="select * from publisher_auth";
$publish_qry=mysqli_query($conn,$publish_select);


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
          		<div class="col-lg-8">
          			<h3>View Publisher </h3>
          			<hr>
          			<table id="table_id" class="display">
					    <thead>
					        <tr>
					            <th>Name</th>
					            <th>Email</th>
					            <th>Status</th>
					            <th>Action</th>
					        </tr>
					    </thead>
					    <tbody>
					       <?php while($data=mysqli_fetch_assoc($publish_qry)){

					       	?>

					       	<tr>
					            <td><?php echo $data['publisher_name'];?></td>
					            <td><?php echo $data['publisher_email'];?></td>
					            <td>

					            	<?php if($data['status']==1){
					            		?>

					            		<button class="btn btn-primary">Active</button>
					            		
					            		<?php

					            	}else{
					            		?>

					            		<button class="btn btn-warning">Block</button>
					            		<?php
					            	}?>

					            </td>
					            
					            <td>
					            	<a href="publisher_delete.php?id=<?php echo $data['id']?>"class="btn btn-danger">Delete</a>

					            	<a href="publisher_edit.php?id=<?php echo $data['id']?>" class="btn btn-warning">Edit</a>
					            	<?php if($data['status']==1){
					            		?>

					            		<a title="Publisher Block Now"href="publisher_block.php?id=<?php echo $data['id'];?>"><button class="btn btn-danger">Block Now</button></a>
					            		<?php

					            	}else{
					            		?>

					            		<a title="Publisher Active Now" href="publisher_active.php?id=<?php echo $data['id'];?>"><button class="btn btn-success">Active Now</button></a>
					            		<?php
					            	}?>

					            </td>
					        </tr>

					       	<?php

					       }?>
					        

					            


					    </tbody>
					</table>
          		</div>

          		<div class="col-lg-4">
          			<h3>Add Publisher</h3>
          			<hr>
          			<form method="post">
          				<div class="form-group my-3">
	          				<label>Publisher Name</label>
	          				<input type="text" name="publisher_name" placeholder="Enter Publisher Name" class="form-control">
          				</div>
          				
          				<div class="form-group  my-3">
          					<label>Publisher Email</label>
          					<input type="email" name="publisher_email" placeholder="Enter Publisher Email" class="form-control">
          				</div>
          				
          				<div class="form-group my-3">
          					<label>Publisher Password</label>
          					<input type="password" name="publisher_password" placeholder="Enter Publisher password" class="form-control">
          				</div>

          				

          				<button type="submit" name="submit" class="btn btn-primary">Add</button>
          			</form>


          			<?php 

					if(isset($_POST['submit'])){
					  
					  $publisher_name=$_POST['publisher_name'];

					  $publisher_email=$_POST['publisher_email'];

					  $publisher_password= $_POST['publisher_password'];

					  $password_len=strlen($publisher_password);

					  $hashpassword=password_hash($publisher_password, PASSWORD_DEFAULT);

					 	$sel = "select * from publisher_auth where publisher_email='$publisher_email' ";

						$qry= mysqli_query($conn,$sel);

					    $emailchk=mysqli_num_rows($qry);

					    if($emailchk== 0){

					      if($password_len>=8){

					        $ins = "insert into publisher_auth (publisher_name,publisher_email,publisher_password) VALUES ('$publisher_name','$publisher_email','$hashpassword')";
					        $qry=mysqli_query($conn,$ins);

					        if($qry){

					          ?>
					            <script type="text/javascript">
					          
					              alert("Publisher added Successfully Done !!! ");
					              window.href('addpublisher.php');
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

					}



					?>
          			

          		</div>
          	</div>
            
            

          </div>

        </div>


      
    </div>



    <?php include "footer.php "; ?>