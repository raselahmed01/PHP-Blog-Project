<?php 

include 'conn.php';

$id=$_GET['id'];

$sel="select * from category where id='$id'";

$selqry=mysqli_query($conn,$sel);

$data=mysqli_fetch_assoc($selqry);

$delq="Delete from category where id='$id'";

$qry=mysqli_query($conn,$delq);

if ($qry) {
	unlink($data['category_image']);
	header('Location:add_category.php');
}


?>