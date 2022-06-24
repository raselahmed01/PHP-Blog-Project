<?php


include 'conn.php';

$id =$_GET['id'];

$val=1;

$active_upd="update article set status='$val' where id='$id'";

$qry=mysqli_query($conn,$active_upd);

if($qry){

	header('Location:article_manage.php');
}



?>