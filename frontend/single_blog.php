<?php 

    
	include'conn.php';
	include 'header.php';

	$article_id=$_GET['id'];
	
	if(!isset($article_id)){

		header('Location: index.php');	

	}

	$single_sel="select article.id,article.category_id,article.tag,article.title,article.article_image,article.article,article.publisher_id,article.status,category.category_name from article LEFT JOIN category ON category.id=article.category_id where article.status=1 and article.id='$article_id' ";

	$singleqry = mysqli_query($conn,$single_sel);

	$single_data=mysqli_fetch_assoc($singleqry);



?>




<!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="index.php">Home</a>
                <a class="breadcrumb-item" href="#"><?php echo $single_data['category_name']; ?></a>
            
                <span class="breadcrumb-item active"><?php echo $single_data['category_name']; ?> Blog</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="<?php echo $single_data['article_image']; ?>" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href=""><?php echo $single_data['category_name']; ?></a>
                               
                            </div>
                            <div>
                                <h3 class="mb-3"><?php echo $single_data['title']; ?></h3>
                                <p><?php echo $single_data['article']; ?></p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="bg-light mb-3" style="padding: 30px;">

                        <?php 

                            $b_id=$single_data['id'];

                            $sel_comment="select * from user_comment LEFT JOIN user_auth ON user_auth.id=user_comment.user_id where user_comment.status=1 and user_comment.blog_id='$b_id'";
                            $comment_qry=mysqli_query($conn,$sel_comment);

                            $com_count=mysqli_num_rows($comment_qry);
                            
                            if($com_count>0){
                                ?>
                            <h3 class="mb-4"><?php echo $com_count; ?> Comments</h3>
                            
                            <?php

                            }else{

                                ?>
                            <h3 class="mb-4">No Comments</h3>
                            <?php
                            }

                        ?>
                        
                        <?php while($c_data=mysqli_fetch_assoc($comment_qry)){
                            
                            ?>
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href=""><?php echo $c_data['name'];?></a> <small><i><?php echo $c_data['date_time'];?></i></small></h6>
                                <p><?php echo $c_data['message'];?></p>
                                
                            </div>
                        </div>
                        <?php }?>                            
                        
                        
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <?php 

                    if(!isset($_SESSION['user_id'])){

                        ?>

                        <h2>Log in first to write a  Comment</h2>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Login
                        </button>

                        <?php

                    }else{
                        ?>

                        <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4">Leave a comment</h3>
                        <form method="post">
                           

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" name="submit" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>

                        <?php 

                            if(isset($_POST['submit'])){

                                $message=$_POST['message'];
                                
                                $user_id=$_SESSION['user_id'];
                                
                                $blog_id=$single_data['id'];
                                
                                $publisher_id=$single_data['publisher_id'];

                                $date_time=date('D-M-Y h:i:s A');

                                $ins="insert into user_comment (user_id,blog_id,publisher_id,message,date_time) VALUES('$user_id','$blog_id','$publisher_id','$message','$date_time')";
                                $cqry=mysqli_query($conn,$ins);
                            }
                        ?>
                    </div>
                    <!-- Comment Form End -->

                    <?php

                        }
                    ?>
                    
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
                    <?php include 'newsletter.php';?>
                    <!-- Newsletter End -->

                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Related Blog</h3>
                        </div>
                        <?php 

                        $catid = $single_data['category_id'];

                        $rel_sel="select article.id,article.category_id,article.title,article.article_image,article.status,category.category_name from article LEFT JOIN category ON category.id=article.category_id where article.status= 1 and article.category_id= '$catid' limit 5";

                        $relqry = mysqli_query($conn,$rel_sel);

                    
                        while ($rel_data=mysqli_fetch_assoc($relqry)) {
                            ?>

                        <div class="d-flex mb-3">
                            <img src="<?php echo $rel_data['article_image'];?>" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href=""><?php echo $rel_data['category_name'];?></a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h6 m-0" href="single_blog.php?id=<?php echo $rel_data['id'];?>"><?php echo $rel_data['title'];?></a>
                            </div>
                        </div>
                            <?php
                        }
                        ?>
                       
                       
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





<?php include 'footer.php'; ?>