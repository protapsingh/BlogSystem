<html>
<body>
<?php
include('config.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($db,"delete from student where id='$id'");
if($query1)
{
header('location:data_display.php');
}
}
?>
</body>
</html>