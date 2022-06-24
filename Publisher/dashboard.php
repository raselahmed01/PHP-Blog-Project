<?php
session_start();
include 'conn.php';

if(!$_SESSION['publisher_id']){

  header('Location: login.php');
}
function addTitle(){

  return "Publisher Dashboard";
}

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
              
              <div class="col-lg-3">
                
               <div class="box">
                 
                 <i class="fa-solid fa-users"></i>

                 <h3>30</h3>

               </div>

              </div>


               <div class="col-lg-3">
                
               <div class="box">
                 
                 <i class="fa-solid fa-users"></i>

                 <h3>50</h3>

               </div>

              </div>


               <div class="col-lg-3">
                
               <div class="box">
                 
                 <i class="fa-solid fa-users"></i>

                 <h3>50</h3>

               </div>

              </div>

               <div class="col-lg-3">
                
               <div class="box">
                 
                 <i class="fa-solid fa-users"></i>

                 <h3>50</h3>

               </div>

              </div>

            </div>

          </div>

        </div>


      
    </div>



    <?php include "footer.php "; ?>