<?php 

include 'conn.php';

$c_id=$_GET['id'];

$status=0;

$upd="update user_comment set status='$status' where id='$c_id'";

$qry=mysqli_query($conn,$upd);

if($qry){
	header('Location:manage_comment.php');
}


?>