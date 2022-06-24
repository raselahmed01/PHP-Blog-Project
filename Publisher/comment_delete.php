<?php 

include 'conn.php';

$c_id=$_GET['id'];

$del="Delete from user_comment where id='$c_id'";

$qry=mysqli_query($conn,$del);

if($qry){

	header('Location:manage_comment.php');
}


?>