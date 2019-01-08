
<?php

include('config.php');
include('user_access.php');
$id=$_GET['id'];
$get1= mysqli_query($db,"select * from student where ID='$id'");
 $get2=mysqli_fetch_array($get1,MYSQLI_NUM);
  $fullname=$get2[3];
  $Gender =$get2[6];
  $relegion=$get2[9];
  $country=$get2[8];

 
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
<style>  a{text-decoration:none;list-style-type:none;}
li{ list-style-type:none;}
a:hover{text-decoration:underline;}
.menu li{float:left; padding-right:10px;}
</style>
</head>

<body style="background-color:lightblue;padding-left:5%; padding-top:2%;">
<form method="post">
<?php echo "<li> <a href='profile.php?id=".$id."'>Home</a></li>"?>

<?php echo $fullname;?>
<div><?php echo $image;?></div>
<?php echo " <a href='full_image.php?id=".$id."'>View full size</a>"?>
<?php echo "<li> <a href='upload_profile_image.php?id=".$id."'>Change profile picture</a></li>"?>
<div class="menu"/>
<ul>
<?php echo "<li> <a href='timeline.php?id=".$id."'>Timeline</a></li>"?>
<?php echo "<li> <a href='edit_profile.php?id=".$id."'>Edit profile</a></li>"?>

</ul>
</div>
</br>
</br>
</br>
<div>

<?php
         	   
	
	$query1= mysqli_query($db,"select * from details where ID='$id'");
	 $query2=mysqli_fetch_array($query1,MYSQLI_NUM);
	  $designation =$query2[1];
	  $profession =$query2[2];
	  $institute =$query2[3];
	  $email =$query2[4];
	  $phone =$query2[5];
	  $address =$query2[6];
	  
	  

?>


  <pre><b>Designation Type         :</b> <?php echo $designation;?> <?php echo " <a href='designation.php?id=".$id."'></b>Edit</b></a>"?></pre></br>
  <pre><b>Profession               : </b> <?php echo  $profession;?> <?php echo " <a href='profession.php?id=".$id."'></b>Edit</b></a>"?></</pre></br>
  <pre><b>Institution/Organization :</b> <?php echo   $institute;?> <?php echo " <a href='institute.php?id=".$id."'></b>Edit</b></a>"?></</pre></br>
  <pre><b>Email address            :</b> <?php echo $email; ?> <?php echo " <a href='email.php?id=".$id."'></b>Edit</b></a>"?></</pre></br>
  <pre><b>Phone number             :</b> <?php echo $phone;?> <?php echo " <a href='phone.php?id=".$id."'></b>Edit</b></a>"?></</pre></br>
  <pre><b>Address                  :</b> <?php echo $address;?> <?php echo " <a href='address.php?id=".$id."'></b>Edit</b></a>"?></</pre></br>
  <pre><b>country                  :</b> <?php echo $country;?></pre></br>
  <pre><b>Gender                   :</b> <?php echo $Gender;?></pre></br>  
  <pre><b>Relegion                 :</b> <?php echo $relegion?></pre></br>
  
  
 
   
</div>
</form>
</body>
</html>