<?php
$id=$_REQUEST['id'];
require_once 'connection.php';
$query = "delete from album where id=$id";
if(mysqli_query($conn,$query))
{
	echo "<script>alert('deleted successfully') </script>";
	header("refresh:1,URL=viewalbum.php");
}




?>