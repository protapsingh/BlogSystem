
<?php
include('config.php');
$id=$_GET['id'];
$get1= mysqli_query($db,"select * from student where ID='$id'");
 $get2=mysqli_fetch_array($get1,MYSQLI_NUM);
  if($get2[10]=="")
 {
	 $image="<img height='500' width='600' alt='unable to show image' src='2.png'/>";
 }
 else
 {
  $image="<img height='500' widht='600' alt='unable to show image' src='images/" .$get2[10]."'/>";
 }

?>


<!doctype html>
<html>
<head>
<style>


</style>
</head>

<body style="background-color:lightblue; padding-left:5%; padding-top:2%;">
<form method="post">

</br>
</br>
<div>
<?php echo $image;?>

</div>
</form>
</body>

</html>