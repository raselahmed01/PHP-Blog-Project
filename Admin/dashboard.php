<?php
session_start();
include 'conn.php';

if(!$_SESSION['admin_id']){

  header('Location: login.php');
}

function addTitle(){

  return " Admin Dashboard";
}


// Article count
  $art = "select * from article";
  $artqry = mysqli_query($conn,$art);

  $article_count =  mysqli_num_rows($artqry);

  // category count

  $cat = "select * from category";
  $catqry = mysqli_query($conn,$cat);

  $category_count =  mysqli_num_rows($catqry);

  // Publisher count

  $pub = "select * from publisher_auth where status=1";
  $pubqry = mysqli_query($conn,$pub);

  $publisher_count =  mysqli_num_rows($pubqry);

?>

  <!-- Include HTML header Content Here -->

    <?php include"header.php" ;?> 

    <section class="main_inner">
      
    <div class="row">

      <!-- Include Sidebar Menu Content here -->

    <?php include "sidebar.php"; ?> 


        <!-- main content -->

        <div class="col-lg-9 py-3">
          
         <div class="row">
              
              <div class="col-lg-3">
                
               <div class="box">
                 
                 <!-- <i class="fa-solid fa-users"></i> -->

                 <h4>Total Article</h4>

                 <h3><?php echo $article_count; ?></h3>

               </div>

              </div>


             
              <div class="col-lg-3">
                
               <div class="box">
                 
                 <h4>Total Category</h4>

                 <h3> <?php echo $category_count; ?> </h3>

               </div>

              </div>


              <div class="col-lg-3">
                
               <div class="box">
                 
                 <h4>Total Publisher</h4>

                 <h3> <?php echo $publisher_count; ?> </h3>

               </div>

              </div>

               <div class="col-lg-3">
                
               <div class="box">
                 
                 <h4>Total Visitor</h4>

                 <h3> <?php echo $category_count; ?> </h3>

               </div>

              </div>

            </div>

          </div>

        </div>


      
    </div>



    <?php include "footer.php "; ?>