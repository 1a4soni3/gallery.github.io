<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ADD ALBUM</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">
		.width
		{
			width: 300px;
			height: 30px;
		}

	</style>
</head>
<body>
	<form  action="" method="post" enctype="multipart/form-data" >
	<center>
		<?php $name= $_REQUEST['album_name'];  ?>
	<div class="form-group" style="margin-top: 200px">
		<h1>Edit Album </h1>
		<div class="col-sm-4">
		<input class="form-control" type="text" name="albumName" value="<?php echo $name;  ?>" placeholder="Album Name">
		</div> <br> <br>
		<div class="col-sm-4">
		<input  class="form-control"type="text" id="fileText"name="" value="" onclick="showFile()" readonly placeholder="Select Image">
			<input  class="form-control" id="file" style="display:none" type="file" name="image" value="" placeholder=""> <br> <br>
	</div>
		<input class="btn btn-success" type="submit" name="submit" value="Update Album">
		<a href="viewalbum.php"><input class="btn btn-success" type="" name="" value="View Album"></a>

	</div>
</center>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	require_once 'connection.php';
	$albumName = $_POST['albumName'];
    // Get image name
	$image = $_FILES['image']['name'];
	$ext=pathinfo($image,PATHINFO_EXTENSION);
	if($ext=="jpg" || $ext=="gif" || $ext=='jpeg' || $ext=="png")
	{
	$upload_file = "images/".basename($image);

	if(move_uploaded_file($_FILES['image']['tmp_name'],$upload_file))
	{
		$sql= "UPDATE album set album_name='$albumName',images='$image' where album_name='$name'";
	    mysqli_query($conn,$sql);
	    echo"<script>alert('updated successfully')</script>";
	}
	else
	{
		echo "<script>alert('image not updated')</script>";
	}
}
else
{
	echo "<script>alert('please uploaded jpg,jpeg,gif,png only')</script>";
}

}

?>
<script >
	function showFile()
	{
		document.getElementById('file').click();
		document.getElementById('file').style.display="block";
		document.getElementById('fileText').style.display="none";
	}

	
</script>