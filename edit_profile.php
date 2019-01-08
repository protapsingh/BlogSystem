
<?php
include('config.php');
include('user_access.php');
$id=$_GET['id'];
$get1= mysqli_query($db,"select * from student where ID='$id'");
 $get2=mysqli_fetch_array($get1,MYSQLI_NUM);
  $fname=$get2[1];
  $lname=$get2[2];
  $pass=$get2[5];
  $country=$get2[8];
 


?>
<?php
$error="";
if(isset($_POST['submit']))
{
	
	if(empty ($_POST['fname']))
	{
		$error="First name field can not be empty!";
	
		
	}
	else if(empty ($_POST['lname']))
	{
		$error="Last name field can not be empty!";
	
		
	}
	else if(empty ($_POST['pass']))
	{
		$error="Password field can not be empty!";
	
		
	}
	else if(empty ($_POST['country']))
	{
		$error="country field can not be empty!";
	
		
	}

	else
{
	
	$firstname=mysqli_real_escape_string($db,$_POST['fname']);
	$lastname=mysqli_real_escape_string($db,$_POST['lname']);
	$password=mysqli_real_escape_string($db,$_POST['pass']);
	$Country=mysqli_real_escape_string($db,$_POST['country']);
	$Password=md5($password);
	
	
	$query=mysqli_query($db,"update student set FirstName='$firstname', LastName='$lastname', FullName='$firstname $lastname ', Password='$Password', Country='$Country' where ID='$id'");
	header("location:personal_profile.php?id=$id");
}

}

?>


<!doctype html>
<html>
<head>
<style>
.main input{width:250px; height:30px;}
</style>
</head>

<body style="background-color:lightblue; padding-left:5%; padding-top:2%;">
<form method="post">
<div class="main" style="width:280px; height:300px;">
Change first name:</br>
<input type="text" name="fname" value="<?php echo $fname;?>"/></br>
Change last name:</br>
<input type="text" name="lname" value="<?php echo $lname;?>"/></br>
Change password:</br>
<input type="password" name="pass" value="<?php echo $pass;?>"/></br>
Change country:</br>
<input type="text" name="country" value="<?php echo $country;?>"/></br>
<p style="text-align:center; color:red;"><?php echo $error;?></p>
<p style="text-align:center;"><input type="submit"name="submit" value="save" style="width:70px;"/></p>
</div>
</form>

</body>

</html>