<?php 
include 'conn.php';

$id=$_GET['id'];

$del="delete from publisher_auth where id='$id'";

$qry =mysqli_query($conn,$del);

if ($qry) {
	
	header('Location:addpublisher.php');
}


?>