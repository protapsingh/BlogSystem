<?php
$db=mysqli_connect("localhost","root","","registration1");
if($db===false)
{
	die("Error: Could not connect. " .mysqli_connect_error());
}	
?>