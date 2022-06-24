<?php
session_start();
include 'conn.php';

function addTitle(){

	return "Publisher Article View | Publisher Dashboard";
}

if(!$_SESSION['publisher_id']){

  header('Location: login.php');
}

$pid=$_SESSION['publisher_id'];

$article_select="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.status,category.category_name from article LEFT JOIN category ON category.id=article.category_id where publisher_id='$pid' ORDER BY article.id DESC";
$article_qry=mysqli_query($conn,$article_select);


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
          			<h3>View Blog Article </h3>
          			<hr>
          			<table id="table_id" class="display">
					    <thead>
					        <tr>
					            <th>Article Image</th>
					            <th>Category</th>
					            <th>Tag</th>
					            <th>Title</th>
					            <th>Article</th>
					            <th>Status</th>
					            <th>Action</th>
					        </tr>
					    </thead>
					    <tbody>
					       <?php while($data=mysqli_fetch_assoc($article_qry)){

					       	?>

					       	<tr>
					            
					            <td><img style="width: 100px;height: 100px"src="<?php echo $data['article_image'];?>"></td>
					            <td><?php echo $data['category_name'];?></td>
					            <td><?php echo $data['title'];?></td>
					            <td><?php echo $data['tag'];?></td>
					            <td><?php echo substr_replace($data['article'], '....', 50);?></td>

					            <td>
					            	
					            	<?php if($data['status']==0){

					            		?>

					            		<button class="btn btn-danger btn-sm mb-2">Pending</button>

					            		<?php
					            	}else{

					            		?>

					            		<button class="btn btn-success btn-sm mb-2">Approved</button>
					            		<?php
					            	}?>
					            		
					            </td>
					            
					            
					            <td>
					            	<a href="article_delete.php?id=<?php echo $data['id']?>"class="btn btn-danger btn-sm mb-2">Delete</a>

					            	<a href="article_edit.php?id=<?php echo $data['id']?>" class="btn btn-warning btn-sm mb-2">Edit</a>
					            	

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