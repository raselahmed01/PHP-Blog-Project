<?php 
	include 'conn.php';
?>


<div class="pb-3">
    <div class="bg-light py-2 px-4 mb-3">
        <h3 class="m-0">Newsletter</h3>
        </div>
        <div class="bg-light text-center p-4 mb-3">
        <p>Sign Up free for Newsletter & Get Updated With our Blog...</p>
        <form method="post">
	        <div class="input-group" style="width: 100%;">
	            <input type="text" name="email" class="form-control form-control-lg" placeholder="Your Email">
	                <div class="input-group-append">
	                    <button name="submit"class="btn btn-primary">Sign Up</button>
	                </div>
	        </div>
        </form>

        <?php 

        	if(isset($_POST['submit'])){

        		$email=$_POST['email'];

        		$ins="insert into subscription (email) VALUES ('$email')";

        		$qry=mysqli_query($conn,$ins);

        		if($qry){

        			?>
        			<script type="text/javascript">
        				
        				alert("Thanks For subscription Our Newsletter");
        			</script>
        			<?php
        		}else{

        			?>

        			<script type="text/javascript">
        				alert("Something Wrong TO Your Subscription");
        			</script>
        			<?php
        		}
        	}
        ?>
        
    </div>
</div>