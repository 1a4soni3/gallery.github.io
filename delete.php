<?php
require_once 'connection.php';
$album_name = $_GET['album_name'];

$query="DELETE FROM album where album_name='$album_name'";

if(mysqli_query($conn, $query))
{
	echo "<script> alert('deleted successfully');</script>";
	header('refresh:1;URL=viewalbum.php');
	
}


?>