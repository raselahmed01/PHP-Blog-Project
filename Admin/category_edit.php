<?php 

include 'conn.php';
$id= $_GET['id'];

session_start();
include 'conn.php';

if(!$_SESSION['admin_id']){

  header('Location: login.php');
}

function addTitle(){

  return "Admin Category Edit  | Admin Dashboard";
}

$category_select="select * from category where id='$id'";
$category_qry=mysqli_query($conn,$category_select);
$data=mysqli_fetch_array($category_qry);


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
          			<h3>Update Category</h3>
          			<hr>
          			<form method="post" enctype="multipart/form-data">
          				<div class="form-group my-3">
	          				<label>Category Name</label>
	          				<input type="text" name="category_name" value="<?php echo $data['category_name']?>" class="form-control">
          				</div>
          				
          				<div class="form-group  my-3">
          					<label>Category Image</label>
          					<input type="file" name="category_image" value="" class="form-control">


          				</div>

                  <img style="width: 150px;height: 80px"src="<?php echo $data['category_image'];?>">
                  <br><br>

          				

          				<button type="submit" name="update" class="btn btn-primary">Update</button>
          			</form>


          			<?php 

					if(isset($_POST['update'])){
					  
					  $category_name=$_POST['category_name'];
            $slug=strtolower(str_replace(" ", "_", $category_name));

            $file=$_FILES['category_image'];

            $cate_img_name=$file['name'];
            $type=$file['type'];
            $cate_img_tmp_name=$file['tmp_name'];
            $error=$file['error'];

            if(!$cate_img_name==null){
              if($error==0){

                if ($type=='image/jpeg'||$type=='image/jpg'||$type=='image/png') {
                  
                  unlink($data['category_image']);
                  
                  $destination="../asset/upload/admin/".$cate_img_name;
                  move_uploaded_file($cate_img_tmp_name, $destination);

                  $upd="update category set category_name='$category_name',category_image='$destination',category_slug='$slug' where id='$id'";

                  $qry=mysqli_query($conn,$upd);
                  if ($qry){
                              header('Location:add_category.php');

                            }


                }
              }

            }else{

              $upd="update category set category_name='$category_name',category_slug='$slug' where id='$id'";

              $qry=mysqli_query($conn,$upd);

              if ($qry) {
                header('Location:add_category.php');
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