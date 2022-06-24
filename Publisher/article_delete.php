<?php 

include 'conn.php';

function addTitle(){

	return "Publisher Article Delete | Publisher Dashboard";
}

$id=$_GET['id'];

$sel="select * from article where id='$id'";

$selqry=mysqli_query($conn,$sel);

$data=mysqli_fetch_assoc($selqry);

$delq="Delete from article where id='$id'";

$qry=mysqli_query($conn,$delq);

if ($qry) {
	unlink($data['article_image']);
	header('Location:article_view.php');
}


?>