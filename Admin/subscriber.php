<?php
session_start();
include 'conn.php';



if(!$_SESSION['admin_id']){

  header('Location: login.php');
}

function addTitle(){

	return "Admin Subscriber View | Admin Dashboard";
}

$sub_select="select * from subscription";
$sub_qry=mysqli_query($conn,$sub_select);


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
          		<div class="col-lg-8 offset-1">
          			<h3>Manage Subscriber </h3>
          			<hr>
          			<table id="table_id" class="display">
					    <thead>
					        <tr>
					            <th>ID</th>
					            <th>Email</th>
					            <th>Action</th>
					        </tr>
					    </thead>
					    <tbody>
					       <?php while($data=mysqli_fetch_assoc($sub_qry)){

					       	?>

					       	<tr>
					            <td><?php echo $data['id'];?></td>
					            <td><?php echo $data['email'];?></td>
					            <td>
					            	<a href="subscriber_delete.php?id=<?php echo $data['id']?>"class="btn btn-danger btn-sm mb-2">Delete</a>
	
					            </td>
					        </tr>

					       	<?php

					       }?>
					        

					            


					    </tbody>
					</table>
          		</div>
          	</div>
            
            

          </div>

        </div>


      
    </div>



    <?php include "footer.php "; ?>