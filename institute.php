
<?php
include('config.php');
$id=$_GET['id'];
$error="";


if(isset($_POST['submit']))
{
	
	if(empty ($_POST['institute']))
	{
		$error="please fulfill the Field";
	
		
	}

	else
{
	
	$institute=mysqli_real_escape_string($db,$_POST['institute']);
	
	
	$query=mysqli_query($db,"update details set institute='$institute' where ID='$id'");
	header("location:personal_profile.php?id=$id");
}

}

?>


<!doctype html>
<html>
<head>
<style>
.main{height:200px; width:300px; border:1px dotted white;}
submit{align:center};
</style>
</head>

<body style="background-color:lightblue; padding-left:5%; padding-top:2%;">
<form method="post">
<div class="main">
your Institute:</br>
<input type="text" name="institute" style="width:250px; height:30px;"/></br>
<p style="color:red;"><?php echo $error;?></p>


<input  type="submit"name="submit" value="Save" style="width:100px; height:30px;"/>
</div>
</form>
</body>

</html>