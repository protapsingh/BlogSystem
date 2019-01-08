
<?php


include('config.php');
include('user_access.php');
$ID=$_GET['id'];
$UID=$_GET['uid'];

$get1= mysqli_query($db,"select * from student where ID='$ID'");
 $get2=mysqli_fetch_array($get1,MYSQLI_NUM);
 $fullname=$get2[3];
 $Gender=$get2[6];
 $relegion=$get2[9];

 
 if($get2[10]=="")
 {
	 $image="<img height='120' width='120'src='2.png'/>";
 }
 else{
  $image="<img height='120' widht='120' src='images/" .$get2[10]."'/>";
 }
?>






<!doctype html>
<html>
<head>
<style>
a{text-decoration:none;}
a:hover{text-decoration:underline;}
</style>
</head>

<body style="background-color:lightblue;">
<?php echo"<a href='profile.php?id=".$UID."'>HOME</a> </br> </br>"?>
<?php echo $fullname;?></br>
</div><?php echo $image;?></div></br>
<?php echo " <a href='full_image.php?id=".$ID."'>View full size</a>"?>





<div>

<?php
         	   
	
	$query1= mysqli_query($db,"select * from details where ID='$ID'");
	 $query2=mysqli_fetch_array($query1,MYSQLI_NUM);
	  $designation =$query2[1];
	  $profession =$query2[2];
	  $institute =$query2[3];
	  $email =$query2[4];
	  $phone =$query2[5];
	  $address =$query2[6];
	  

?>



  <pre><b>Designation Type         :</b> <?php echo $designation;?></pre></br>
  <pre><b>Profession               :</b> <?php echo $profession;?></pre></br>
  <pre><b>School/College/University:</b> <?php echo $institute?></pre></br>
  <pre><b>Email address            :</b> <?php echo  $email;?></pre></br>
  <pre><b>Phone number             :</b> <?php echo  $phone;?></pre></br>
  <pre><b>Address                  :</b> <?php echo $address;?></pre></br>
  <pre><b>Gender                   :</b> <?php echo $Gender;?></pre></br> 
  <pre><b>Relegion                 :</b> <?php echo $relegion?></pre></br>
  
   
</div>
</body>
</html>