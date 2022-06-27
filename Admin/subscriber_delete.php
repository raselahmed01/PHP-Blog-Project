<?php 
include 'conn.php';

$id=$_GET['id'];

$del="delete from subscription where id='$id'";

$qry=mysqli_query($conn,$del);

if($qry){

	header('Location:subscriber.php');
}


?>