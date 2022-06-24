<?php
session_start();
include 'conn.php';

function addTitle(){

	return "Publisher Comment Manage | Publisher Dashboard";
}

if(!$_SESSION['publisher_id']){

  header('Location: login.php');
}

$pid=$_SESSION['publisher_id'];

$comment_select="select user_comment.id,user_comment.user_id,user_comment.blog_id,user_comment.publisher_id,user_comment.message,user_comment.date_time,user_comment.status,article.title,user_auth.name from user_comment LEFT JOIN user_auth ON user_auth.id=user_comment.user_id LEFT JOIN article ON article.id=user_comment.blog_id LEFT JOIN publisher_auth ON publisher_auth.id=user_comment.blog_id  where user_comment.publisher_id='$pid' ORDER BY user_comment.id DESC ";

$comment_qry=mysqli_query($conn,$comment_select);



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
          		<div class="col-lg-10">
          			<h3>Manage Blog Comment</h3>
          			<hr>
          			<table id="table_id" class="display">
					    <thead>
					        <tr>
					            <th>User Name</th>
					            <th>Blog Title</th>
					            <th>Message</th>					            
					            <th>Time</th>					            
					            <th>Action</th>
					        </tr>
					    </thead>
					    <tbody>
					       <?php while($data=mysqli_fetch_assoc($comment_qry)){

					       	?>

					       	<tr>
					            <td><?php echo $data['name'];?></td>
					            <td><?php echo $data['title'];?></td>
					            
					            <td><?php echo substr_replace($data['message'], '....', 50);?></td>
					            <td><?php echo $data['date_time'];?></td>

					            <td>
					            	
					            	<?php if($data['status']==0){

					            		?>

					            		<a href="comment_approve.php?id=<?php echo $data['id']?>" title="Accept Now"class="btn btn-danger btn-sm mb-2">Pending</a>

					            		<?php
					            	}else{

					            		?>

					            		<a href="comment_pending.php?id=<?php echo $data['id']?>" class="btn btn-success btn-sm mb-2" title="Do Pending ">Approved</a>
					            		<?php
					            	}?>

					            	<a href="comment_delete.php?id=<?php echo $data['id']?>"class="btn btn-danger btn-sm mb-2">Delete</a>	
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