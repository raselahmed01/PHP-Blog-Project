<?php 

    include 'conn.php';

    include 'header.php'; 

?>


<!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        

                    	<?php

                    		$slider_select="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.status,category.category_name from article LEFT JOIN category ON category.id=article.category_id where article.status=1 ORDER BY article.id DESC limit 4 ";
                    		$slider_qry= mysqli_query($conn,$slider_select);

                    		while ($slider_data= mysqli_fetch_assoc($slider_qry)) {

                    			?>
                    			<div class="position-relative overflow-hidden" style="height: 435px;">
		                            <img class="img-fluid h-100" src="<?php echo $slider_data['article_image']?>" style="object-fit: cover;">
		                            <div class="overlay">
		                                <div class="mb-1">
		                                    <a class="text-white" href=""><?php echo $slider_data['category_name']?></a>
		                                    <!-- <span class="px-2 text-white">/</span>
		                                    <a class="text-white" href="">January 01, 2045</a> -->
		                                </div>
		                                <a class="h2 m-0 text-white font-weight-bold" href="single_blog.php?id=<?php echo $slider_data['id'];?>"><?php echo $slider_data['title']?></a>
		                            </div>
		                        </div>
                    			<?php
                    			
                    		}
                    	?>

                        
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Categories</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                    </div>

                    <?php 

                    	$cate_select="select * from category limit 4";

                    	$cate_qry =mysqli_query($conn,$cate_select);

                    	while ($cateData=mysqli_fetch_assoc($cate_qry)) {
                    		?>

                    		<div class="position-relative overflow-hidden mb-3" style="height: 80px;">
		                        <img class="img-fluid w-100 h-100" src="<?php echo $cateData['category_image']?>" style="object-fit: cover;">
		                        <a href="category_blog.php?category=<?php echo $cateData['category_name'];?>" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
		                            <?php echo $cateData['category_name'];?>
		                        </a>
		                    </div>

                    		<?php
                    	}
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Featured</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                
                <?php 

                	$fet_select="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.status,category.category_name from article LEFT JOIN category on category.id=article.category_id where article.category_id=11 and article.status=1 ORDER BY article.id DESC limit 4";

                	$fet_qry= mysqli_query($conn,$fet_select);

                	
                	while ($fetData=mysqli_fetch_assoc($fet_qry)) {
                		?>

                		<div class="position-relative overflow-hidden" style="height: 300px;">
		                    <img class="img-fluid w-100 h-100" src="<?php echo $fetData['article_image']?>" style="object-fit: cover;">
		                    <div class="overlay">
		                        <div class="mb-1" style="font-size: 13px;">
		                            <a class="text-white" href=""><?php echo $fetData['category_name']?></a>
		                            <!-- <span class="px-1 text-white">/</span>
		                            <a class="text-white" href="">January 01, 2045</a> -->
		                        </div>
		                        <a class="h4 m-0 text-white" href="single_blog.php?id=<?php echo $fetData['id'];?>"><?php echo $fetData['title']?></a>
		                    </div>
		                </div>

                		<?php
                	}
                ?>



            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3">

           
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Business</h3>
                    </div>

                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                 	
                 	<?php 

                	$b_cat_sel="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.status,category.category_name from article LEFT JOIN category on category.id=article.category_id where article.category_id= 2 and article.status= 1  ORDER BY article.id DESC limit 4";

                	$b_cat_qry= mysqli_query($conn,$b_cat_sel);
                	 
                    while ($bus_cat_data=mysqli_fetch_assoc($b_cat_qry)) {
                		?>
                		
	                        <div class="position-relative">
	                            <img class="img-fluid w-100" src="<?php echo $bus_cat_data['article_image'];?>" style="object-fit: cover;">
	                            <div class="overlay position-relative bg-light">
	                                <div class="mb-2" style="font-size: 13px;">
	                                    <a href=""><?php echo $bus_cat_data['category_name'];?></a>
	                                    <!-- <span class="px-1">/</span>
	                                    <span>January 01, 2045</span> -->
	                                </div>
	                                <a class="h4 m-0" href="single_blog.php?id=<?php echo $bus_cat_data['id'];?>"><?php echo $bus_cat_data['title'];?></a>
	                            </div>
	                        </div>
                        

                	<?php }?>
                	</div>
                    
                </div>
                <div class="col-lg-6 py-3">
                	
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Techonology</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    	
                    <?php 

                	$t_cat_sel="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.status,category.category_name from article LEFT JOIN category on category.id=article.category_id where article.category_id= 11 and article.status= 1  ORDER BY article.id DESC limit 4";

                	$t_cat_qry= mysqli_query($conn,$t_cat_sel);                	
                	 
                    while ($tec_cat_data=mysqli_fetch_assoc($t_cat_qry)) {
                		?>
                		 <div class="position-relative">
                            <img class="img-fluid w-100" src="<?php echo $tec_cat_data['article_image'];?>" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href=""><?php echo $tec_cat_data['category_name'];?></a>
                                    
                                </div>
                                <a class="h4 m-0" href="single_blog.php?id=<?php echo $tec_cat_data['id'];?>"><?php echo $tec_cat_data['title'];?></a>
                            </div>
                        </div>

                		<?php  } ?>
                       
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Entertainment</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    	<?php 

                	$e_cat_sel="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.status,category.category_name from article LEFT JOIN category on category.id=article.category_id where article.category_id= 9 and article.status= 1  ORDER BY article.id DESC limit 4";

                	$e_cat_qry= mysqli_query($conn,$e_cat_sel);                	
                	 
                    while ($e_cat_data=mysqli_fetch_assoc($e_cat_qry)) {
                		?>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="<?php echo $e_cat_data['article_image'];?>" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href=""><?php echo $e_cat_data['category_name'];?></a>
                                    
                                </div>
                                <a class="h4 m-0" href="single_blog.php?id=<?php echo $e_cat_data['id'];?>"><?php echo $e_cat_data['title'];?></a>
                            </div>
                        </div>

                    <?php } ?>
                        
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Sports</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">

                    	<?php 

                	$s_cat_sel="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.status,category.category_name from article LEFT JOIN category on category.id=article.category_id where article.category_id=10 and article.status= 1  ORDER BY article.id DESC limit 4";

                	$s_cat_qry= mysqli_query($conn,$s_cat_sel);                	
                	 
                    while ($s_cat_data=mysqli_fetch_assoc($s_cat_qry)) {
                		?>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="<?php echo $s_cat_data['article_image']; ?>" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href=""><?php echo $s_cat_data['category_name']; ?></a>
                                    
                                </div>
                                <a class="h4 m-0" href="single_blog.php?id=<?php echo $s_cat_data['id']; ?>"><?php echo $s_cat_data['title']; ?></a>
                            </div>
                        </div>

                    <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                   <!--  <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Popular</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">Technology</a>
                                        <span class="px-1">/</span>
                                        <span>January 01, 2045</span>
                                    </div>
                                    <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                    <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                           
                          
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href="">Technology</a>
                                        <span class="px-1">/</span>
                                        <span>January 01, 2045</span>
                                    </div>
                                    <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                    <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                </div>
                            </div>
                           
                           
                        </div>


                    </div> -->
                    
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Latest</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div><?php 

                	$lat_select="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.status,category.category_name from article LEFT JOIN category on category.id=article.category_id where  article.status=1 ORDER BY article.id DESC limit 4";

                	$lat_qry= mysqli_query($conn,$lat_select);

                	
                	while ($latData=mysqli_fetch_assoc($lat_qry)) {
                		?>

                		 <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="<?php echo $latData['article_image'];?>" style="object-fit: cover;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 14px;">
                                        <a href=""><?php echo $latData['category_name'];?></a>
                                        <span class="px-1">/</span>
                                        <span>January 01, 2045</span>
                                    </div>
                                    <a class="h4" href="single_blog.php?id=<?php echo $latData['id'];?>"><?php echo $latData['title'];?></a>
                                    <p class="m-0"><?php echo substr_replace($latData['article'], '...', 50);?></p>
                                </div>
                            </div>
                           
                        </div>

                	<?php }?>

                       

                       
                    </div>
                </div>
                
                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Social Follow Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Follow Us</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                                <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                                <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
                                <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                                <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                                <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
                                <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Newsletter Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Newsletter</h3>
                        </div>
                        <div class="bg-light text-center p-4 mb-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                            <small>Sit eirmod nonumy kasd eirmod</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tranding</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-1.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-2.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-3.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-4.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="img/news-100x100-5.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            </div>
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Tags</h3>
                        </div>
                        <?php include'tag.php'; ?>
                    </div>

                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->




<?php include'footer.php';?>