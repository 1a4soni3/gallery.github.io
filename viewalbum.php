<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>View Album</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div align="center" style="margin-top: 50px">
		<h1>Album List</h1>
	</div>
	<div style="height:50px">
<div style="float: right;margin-right: 20px">
	<a href="addalbum.php"><button class="btn btn-danger">Create Album</button></a>

</div>
</div>



	<div class="row" style="margin-left: 100px">
			<?php
			require_once 'connection.php';
			$query= "SELECT * FROM `album` GROUP BY album_name";
			$result=mysqli_query($conn,$query);
			$count= mysqli_num_rows($result);
			
            if($count > 0)
            {
            	while($r=mysqli_fetch_row($result))
            	{
                      echo "<div class='col-sm-4'>";
			         echo"<a href='albumdetail.php?album_name=$r[1]'><img src='images/$r[2]' style='width:300px;height:300px;padding-left:10px'alt=''>";
			         echo"<br>";
			          echo "<h4 style='width:250px;margin-left:10px'class='border border-secondary'>$r[1]</h4></a>";
			          echo"</div>";



            	/*	echo "<div class='col-sm-3 '>";
            		echo "<fieldset>";
            			
            		
            		echo "<a href='albumdetail.php?album_name=$r[1]'><img class='rounded border border-secondary' style='width:300px;max-height:300px'
            		src='images/$r[2]' alt=''>";
            		echo "<br>";
            		echo "<h4 class='border border-secondary'>$r[1]</h4>";

            		echo "</fieldset>";
            		echo "</div>"; */
            	}

            }

			?>
		
		
	</div>

</body>
</html>