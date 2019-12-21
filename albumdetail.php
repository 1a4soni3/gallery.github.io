<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Album Details</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body><?php
	if(!empty($_GET['album_name']))
		{
			$album_name=$_GET['album_name'];
		}
		?>
	<div class="row" style="margin-top: 20px">
		<div class="col-sm-4" style="float: left">
			<h1 style="color:blue"><?php echo $album_name ?></h1>
			
		</div>
		<div class="col-sm-4"></div>
		<div class="col-sm-4" style="float: right">
			<a href="edit.php?album_name=<?php echo $album_name; ?>"><button class="btn btn-primary">Edit Album</button></a>
			<a href="delete.php?album_name=<?php echo $album_name; ?>"><button class="btn btn-secondary">Delete Album</button></a>
			<a href="viewalbum.php? ?>"><button class="btn btn-info">Album list</button></a>
			
		</div>
		
	</div>
	<center>
		<form action="" method="post" enctype="multipart/form-data">
			
		
		<div>
			<input type="text" id="fileText"name="" value="" onclick="showFile()" readonly placeholder="Select Image">
			<input class="" id="file" style="display:none" type="file" name="image" value="" placeholder="">
		   <input class="btn btn-success" type="submit" name="submit" value="Upload new photo">
		</div>
		</form>
	</center>
	<div class="row	"style="width: 100%;margin-top: 50px;margin-left: 1px">
		<?php
		require_once 'connection.php';

		$query="select * from album where album_name='$album_name'";
		$result=mysqli_query($conn,$query);
		$count=mysqli_num_rows($result);
		?>
		<div class="col-sm-12"style="float:left">
			<?php
			echo "<h5>$count photos</h5>";
			?>
		</div>
		
	</div>
	<div class="row">
		<?php
		while($r=mysqli_fetch_row($result))
		{
            echo "<div class='col-sm-4'>";
			echo"<img src='images/$r[2]' style='width:300px;height:300px;padding-left:10px'alt=''>";
			echo"<br><br>";
			echo "<a href='deletesingle.php?id=$r[0]'><button style='margin-left:100px'class='btn btn-danger'>Delete</button></a>";
			echo"</div>";
			
			
		}

		?>
	</div>
	
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	require_once 'connection.php';
	$albumName = $_REQUEST['album_name'];
    // Get image name
	$image = $_FILES['image']['name'];
	$ext=pathinfo($image,PATHINFO_EXTENSION);
	if($ext=="jpg" || $ext=="gif" || $ext=='jpeg' || $ext=="png")
	{
	$upload_file = "images/".basename($image);

	if(move_uploaded_file($_FILES['image']['tmp_name'],$upload_file))
	{
		$sql= "insert into album(album_name,images) values ('$albumName','$image')";
	    mysqli_query($conn,$sql);
	    echo"<script>alert('uploaded successfully')</script>";
	    header("refresh:1,URL=albumdetail.php?album_name=$albumName");
	}
	else
	{
		echo "<script>alert('image not uploaded')</script>";
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