<?php
session_start();
include 'conn.php';

function addTitle(){

	return "Publisher Article Edit | Publisher Dashboard";
}

if(!$_SESSION['publisher_id']){

  header('Location: login.php');
}

$id =  $_GET['id'];

$article_select="select * from article where id='$id'";

$article_qry=mysqli_query($conn,$article_select);

$data=mysqli_fetch_assoc($article_qry);

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
          		<div class="col-lg-12">
          			<h3>Add Blog Article</h3>
          			<hr>
          			<form method="post" enctype="multipart/form-data">
          				<div class="form-group my-3">

          					<div class="row">
          						<div class="col-lg-4 ">
          							
	          						<div class="form-group my-2">
	          							<label>Select Category Name</label>
	          							<select name="category_id" class="form-control">
		          							<option selected="" >Choice Category</option>

		          							<?php 
		          								 while ($category=mysqli_fetch_assoc($cate_qry)) {
		          								 	?>
		          								 	<option <?php echo ($category['id'] == $data['category_id'])? 'selected':'' ?> value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>


		          								 	<?php
		          								 }

		          							?>
		          							
		          						</select>
	          						</div>
          						</div>

          						<div class="col-lg-4 ">
	          						<div class="form-group my-2">
	          							<label>Blog Tag</label>
	          							<input class="form-control"type="text" name="tag" value="<?php echo $data['tag']?>">
	          						</div>
          						</div>

          						<div class="col-lg-4 ">
	          						<div class="form-group my-2">
	          							<label>Blog Title</label>
	          							<input class="form-control"type="text" name="title" value="<?php echo $data['title']?>">
	          						</div>
          						</div>

          						<div class="col-lg-4 ">
	          						<div class="form-group my-2">
	          							<label>Blog Image</label>
	          							<input class="form-control"type="file" name="article_image" >

	          							<img style="padding:10px;width: 100px; height: 80px"src="<?php echo $data['article_image']?>">
	          						</div>
          						</div>

          						

          						<div class="col-lg-8 ">
	          						<div class="form-group my-2">
	          							<label>Blog Article</label>
	          							<textarea id="editor"class="form-control" name="article"><?php echo $data['article']?></textarea>
	          						</div>
          						</div>
          					</div>
	          				
          				</div>
          				
          				
          				
       				<button type="submit" name="update" class="btn btn-primary">Update</button>
          			</form>

          			<?php 

          			if(isset($_POST['update'])){

          				$publisher_id=$_SESSION['publisher_id'];
          				$category_id=$_POST['category_id'];
          				$tag=$_POST['tag'];
          				$title=$_POST['title'];
          				$blog_slug=strtolower(str_replace(' ', '_', $title));

          				$article=$_POST['article'];
          				$article_image=$_FILES['article_image'];
          				
          				$article_image_name=$article_image['name'];
          				$article_image_type=$article_image['type'];
          				$article_image_tmp_name=$article_image['tmp_name'];
          				$article_image_error=$article_image['error'];

          				if(!$article_image_name==null){
          					if($article_image_error==0){
	          					if($article_image_type="image/jpeg"||$article_image_type="image/jpg"||$article_image_type="image/png"){

	          						unlink($data['article_image']);

	          						$destination="../asset/upload/article/".$article_image_name;

	          						move_uploaded_file($article_image_tmp_name, $destination);

	          						$upd="update article set category_id='$category_id',tag='$tag',title='$title',blog_slug='$blog_slug',article_image='$destination',article='$article',publisher_id='$publisher_id' where id='$id'";

	          						$qry=mysqli_query($conn,$upd);

	          						

	          						if($qry){
	          							?>
	          							<script type="text/javascript">
	          								window.location.href="article_view.php";
	          							</script>
	          							<?php

	          						}else{
	          							echo "Something wrong to your Update ";
	          						}

	          					}

	          				}else{

          					echo "Something Wrong To your Image Upload";

          						}

          				}
          				else{

          						$upd="update article set category_id='$category_id',tag='$tag',title='$title',blog_slug='$blog_slug',article='$article',publisher_id='$publisher_id' where id='$id'";

	          						$qry=mysqli_query($conn,$upd);

	          						if($qry){

	          							?>
	          							<script type="text/javascript">
	          								window.location.href="article_view.php";
	          							</script>
	          							<?php
	          						}else{
	          							echo "Something wrong to your Update ";
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