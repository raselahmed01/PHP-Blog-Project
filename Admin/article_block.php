<?php


include 'conn.php';

$id =$_GET['id'];

$val=0;

$block_upd="update article set status='$val' where id='$id'";

$qry=mysqli_query($conn,$block_upd);

if($qry){

	header('Location:article_manage.php');
}



?>