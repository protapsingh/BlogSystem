<!--Php Code-->
<?php
include('config.php');
$errors='';

if(isset($_POST['Submit']))
{
	$email=$_REQUEST['Email'];
    $pass=$_REQUEST['password'];
	
	if(empty($email)||empty($pass))
	{
		$errors="Invalid Email or Password!";
	
		
	}
	
	else
	{
		$password=md5($pass);
		$query=mysqli_query($db,"select * from student where Password='$password' AND Email='$email'");
		
		$get=mysqli_fetch_array($query,MYSQLI_NUM);
		$id=$get[0];
	   	
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			
			session_start();
			$_SESSION['id']=$id;
			header("Location:profile.php?id=$id");
		}
		else
		{
			$errors="Invalid Email or Password";
			
		}
	}


}
?>
<!--end php code-->
<!doctype html>
<html>
<head>
<title>Diu Login</title>
<style>
 
</style>
</head>
<center>
<body style="background-color:lightblue;">
<h1 style="text-align:center; color:#4863A0;"><b> Welcome to Login page</b></h1>

<div style="width:350px; height:250px;background-color:#4863A0; text-align:center;">



<form method="post">
<table cellspacing="10">
<tr>
</br>
</br>
<td style="text-align:right;"> Email:</td>
<td> <input type="Email" name="Email"  placeholder ="Email" style="width:200px; height:25px;"></td>
</tr>
<tr>
<td style="text-align:right;"> Password:</td>
<td> <input type="Password" name="password" placeholder ="Password" style="width:200px; height:25px;"></td>
</tr>
<tr>
<td colspan="2" style="text-align:center; "> <pre>        <input type="Submit" name="Submit" value="LogIn" style="width:75px; height:25px; color:red; background-color:lightblue;"></pre></td>
</tr>
</table>
<span> <?php echo $errors;?></span>
 <p style="text-align:right;"><b><a href="Registration.php" style="text-decoration:none;""> New user Sign Up here</b></a></p>


</form>


</div>

</body>
</center>
</html>