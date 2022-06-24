<?php
session_start();
include 'conn.php';

if(!$_SESSION['admin_id']){

  header('Location: login.php');
}

function addTitle(){

	return "Admin Category Manage  | Admin Dashboard";
}

$cat_select="select * from category";
$cate_qry=mysqli_query($conn,$cat_select);


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
          			<h3>View Category </h3>
          			<hr>
          			<table id="table_id" class="display">
					    <thead>
					        <tr>
					            <th>Category Name</th>
					            <th>Category Photo</th>
					            <th>Action</th>
					        </tr>
					    </thead>
					    <tbody>
					       <?php while($data=mysqli_fetch_assoc($cate_qry)){

					       	?>

					       	<tr>
					            <td><?php echo $data['category_name'];?></td>
					            <td><img style="width: 100px;height: 100px"src="<?php echo $data['category_image'];?>"></td>
					            
					            <td>
					            	<a href="category_delete.php?id=<?php echo $data['id']?>"class="btn btn-danger">Delete</a>

					            	<a href="category_edit.php?id=<?php echo $data['id']?>" class="btn btn-warning">Edit</a>
					            	

					            </td>
					        </tr>

					       	<?php

					       }?>
					        

					            


					    </tbody>
					</table>
          		</div>

          		<div class="col-lg-4">
          			<h3>Add Category</h3>
          			<hr>
          			<form method="post" enctype="multipart/form-data">
          				<div class="form-group my-3">
	          				<label>Category Name</label>
	          				<input type="text" name="category_name" placeholder="Enter Category Name" class="form-control">
          				</div>
          				
          				<div class="form-group  my-3">
          					<label>Category Photo</label>
          					<input type="file" name="category_img" class="form-control">
          				</div>
          				
          				<!-- <div class="form-group my-3">
          					<label>Publisher Password</label>
          					<input type="password" name="publisher_password" placeholder="Enter Publisher password" class="form-control">
          				</div> -->

          				

          				<button type="submit" name="submit" class="btn btn-primary">Add</button>
          			</form>


          			<?php 

					if(isset($_POST['submit'])){

						$category_name=$_POST['category_name'];
						$slug = strtolower(str_replace(" ", "_", $category_name));
						

						//For Image Upload
						$file=$_FILES['category_img'];
						$image_name = $file['name'];
						$image_type = $file['type'];
						$image_tmp_name = $file['tmp_name'];
						$error = $file['error'];
						

						if($error==0){

							if($image_type=="image/jpeg"|| $image_type=="image/jpg"|| $image_type=="image/png"){

								$destination="../asset/upload/admin/".$image_name;

								move_uploaded_file($image_tmp_name, $destination);

								

								$ins = "insert into category (category_name,category_image,category_slug) VALUES ('$category_name','$destination','$slug') ";

          						$qry = mysqli_query($conn,$ins);

								if ($qry) { 

									?>

									<script type="text/javascript">
										
										alert("Category Added Successfully");
									</script>
									<?php
									
								}else{

									echo mysqli_error($conn);
									?>

									<script type="text/javascript">
										
										alert("Something Wrong");
									</script>
									<?php
								}

							}else{
								
								?>

								<script type="text/javascript">
									
									alert("This File Not Supported");
								</script>

								<?php
							}
						}
						
					  
					  

					}



					?>
          			

          		</div>
          	</div>
            
            

          </div>

        </div>


      
    </div>



    <?php include "footer.php "; ?>