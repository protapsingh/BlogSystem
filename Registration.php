
<!--Php Code-->
<?php
$errors=array();
include('config.php');

if(isset($_POST['Submit']))
{
	$Email=mysqli_real_escape_string($db,$_POST['Email']);
	
	//Because I will use Email as a unique identity of user thats why  first of all i declare a variable for Email Field
	
	
	
	
	if(empty($_POST['Fname']))
	 {
		array_push($errors,"User first name is required!");
	}
	
	if(empty($_POST['Lname']))
	{
		array_push($errors,"User last name is required!");
	}
	if(empty($Email))
	{
		array_push($errors,"User email is required!");
	}
	if(empty ($_POST['password']))
	{
		array_push($errors,"User password is required!");
	}
	if(empty ($_POST['password2']))
	{
		array_push($errors,"Comfirm password required!");
	}
	
	if(empty ($_POST['gender']))
	{
		array_push($errors,"User gender is required!");
	}
	if(empty ($_POST['Date']))
	{
		array_push($errors,"Date of Birth is required!");
	}
	if(empty ($_POST['country']))
	{
		array_push($errors,"User country name is required!");
	}
	if(empty ($_POST['relegion']))
	{
		array_push($errors,"User relegion is required!");
	}
	if($_POST['password']!=$_POST['password2'])
	{
		array_push($errors,"Password does not match!");
	}
	//check Email exists or not
	$query=mysqli_query($db,"select * from student where Email='$Email'");
		$rows = mysqli_num_rows($query);
		if($rows>=1)
		{
			array_push($errors," Email address already exists !");
		}
		//End check Email
		
	if(count($errors)==0)
	{
			$Fname=mysqli_real_escape_string($db,$_POST['Fname']);
	$Lname=mysqli_real_escape_string($db,$_POST['Lname']);
	$Email=mysqli_real_escape_string($db,$_POST['Email']);
	$password_1=mysqli_real_escape_string($db,$_POST['password']);
	$password2=mysqli_real_escape_string($db,$_POST['password2']);
	$gender=mysqli_real_escape_string($db,$_POST['gender']);	
	$birth=mysqli_real_escape_string($db,$_POST['Date']);
	$country=mysqli_real_escape_string($db,$_POST['country']);
	$relegion=mysqli_real_escape_string($db,$_POST['relegion']);
	
	
		$password=md5($password_1);
		$u_id=uniqid("cmc_",true).".txt";
		$u_id=base64_encode($u_id);
	
	
         	   
	$query1=mysqli_query($db,"insert into student values('$u_id','$Fname ','$Lname','$Fname $Lname','$Email','$password','$gender','$birth','$country','$relegion','')");
	 $query2=mysqli_query($db,"insert into details values('$u_id','--','--','--','--','--','--')");
	//get access to prifile page
	$query=mysqli_query($db,"select * from student where Email='$Email' AND Password='$password' ");
	
	$get=mysqli_fetch_array($query,MYSQLI_NUM);
		$id=$get[0];
		$rows = mysqli_num_rows($query);
		if($rows==1)
		{
			session_start();
			$_SESSION["id"]=$id;
			header("Location:profile.php?id=$id");
		}
	
	//end get access
	
    }
}
?>
<!--end php code-->
<!doctype html>
<html>
<head>
<title>Diu Registration</title>
<style>

</style>
</head>
<body style="background-color:lightblue;">
<h1 style="text-align:center; color:#4863A0;"><b> Welcome to Registration Page</b></h1>


<div style="width:500px; height:520px; background-color:#4863A0; border: 1px dotted white;">

<!--Error message-->
<div style="height:350px; width:220px;color:orange; float:right; padding-top:20px;">
<?php if (count($errors)>0):?>
<div class="error">
<?php foreach($errors as $error):?>
<p> <?php echo $error;?></p>
<?php endforeach?>
</div>
<?php endif?>

</div>
<!--end error message-->

<div style="padding-right:20px;">
<legend style="color:Darkblue; text-align:center;">Please provide your Information</legend>
<form method="post" enctype="multipart/form-data">
First Name:</br>
<input type="text" name="Fname" placeholder="First Name" style="width:200px; height:20px;"></br>
Last Name:</br>
<input type="text" name="Lname" placeholder="Last Name" style="width:200px; height:20px;"></br>
Email:</br>
<input type="Email" name="Email" placeholder="Email" style="width:200px; height:20px;"></br>
Password:</br>
<input type="password" name="password" placeholder="Password" style="width:200px; height:20px;"></br>
Confirm Password:</br>
<input type="password" name="password2" placeholder="Comfirm Password" style="width:200px; height:20px;"></br>
Gender:</br>
<input type="radio" name="gender" value="male"> Male
<input type="radio" name="gender" value="Female"> Female</br>
Date of Birth:</br>
<input type="Date" name="Date" max="2002-12-31" style="width:200px; height:20px;"></br>
Country:</br>
<select name="country" style="width:205px; height:25px;">
<option value="USA" selected>USA</option>
<option value="BANGLADESH">BANGLADESH</option>
<option value="INDIA">INDIA</option>
<option value="CANADA" >CANADA</option>
<select></br>
Relegion:</br>
<input type="checkbox" name="relegion" value="Muslim">Muslim
<input type="checkbox" name="relegion" value="Hindu">Hindu</br>
<input type="checkbox" name="relegion" value="Christian">Christian
<input type="checkbox" name="relegion" value="Buddhist">Buddhist</br>
<pre>       <input type="Submit" name="Submit">  <input type="reset" name="reset"></pre></br>
<p style="text-align:right;"><b> Already a member??<a href="login.php" style="text-decoration:none;""> Login Here</b></a></p> 

</form>
</div>
</div>

</body>
</html>