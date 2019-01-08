<!doctype html>
<html>
<head>
<style>
a{text-decoration:none;}
</style>
</head>
<body>
<form>

<table style="border:1px solid darkblue; background-color:green; color:orange;"cellspacing="5" cellpadding ="2" border="1">
<tr>
<td>ID</td>
<td>FirstName</td>
<td>LastName</td>
<td>Fullname</td>
<td>Email</td>
<td>Password</td>
<td>Gender</td>
<td>DateOfBirth</td>
<td>Country</td>
<td>Relegion</td>
<td>Profile_pic</td>
<td>Edit</td>
<td>Delete</td>
</tr>


<?php
include('config.php');
$query1=mysqli_query($db,"select * from student");
if(!$query1)
{ 
echo("Error description: " . mysqli_error($db));
}
while($query2=mysqli_fetch_array($query1,MYSQLI_NUM))
{
	echo "<tr>";
	
	echo"<td>".$query2[0]."</td>";
	echo"<td>".$query2[1]."</td>";
	echo"<td>".$query2[2]."</td>";
	echo"<td>".$query2[3]."</td>";
	echo"<td>".$query2[4]."</td>";
	echo"<td>".$query2[5]."</td>";
	echo"<td>".$query2[6]."</td>";
	echo"<td>".$query2[7]."</td>";
	echo"<td>".$query2[8]."</td>";
	echo"<td>".$query2[9]."</td>";
	echo"<td>".$query2[10]."</td>";
	echo "<td><a href='edit.php?id=".$query2[0]."'>Edit</a></td>";
echo "<td><a onclick=\"return confirm('Delete this record?')\"  href='delete.php?id=".$query2[0]."'><b>X</b></a></td>";
	echo"</tr>";
	
}
?>


</table>
</form>
</body>
</html>
