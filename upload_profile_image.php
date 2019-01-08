<?php

include('user_access.php');

?>
<!doctype html>
<html>
<head></head>
<body style="background-color:lightblue;">
<form  method="post" enctype="multipart/form-data">
<input type ="file" name="image"></br>
<input type ="submit" name="upload" value="Upload"></br>
<?php
include('config.php');
if(isset($_POST['upload']))
{
	
	$Id=$_GET['id'];
	
	
	$target="images/".basename($_FILES['image']['name']);
	$image=$_FILES['image']['name'];
	

	$qr="insert into picture(ID,IMAGE) values('$Id','$image')";
	mysqli_query($db,$qr);
	$query3=mysqli_query($db,"update student set Image='$image' where ID='$Id'");
if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
{
	echo"uploaded";
	header("location:personal_profile.php?id=$Id");
}	
}
?>
</form>
</body>
</html>