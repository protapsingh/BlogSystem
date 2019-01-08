<?php
include('config.php');
include('user_access.php');

$ID=$_GET['id'];

$get1= mysqli_query($db,"select * from student where ID='$ID'");
 $get2=mysqli_fetch_array($get1,MYSQLI_NUM);
 $username1=$get2[1];
 $username2=$get2[2];
 $Fullname=$get2[3];
 if($get2[10]=="")
 {
	 $image="<img width='30' height='30'src='2.png'/>";
 }
 else{
  $image="<img height='30' widht='30' src='images/" .$get2[10]."'/>";
 }





?>
<!--image-->
<?php

?>


<!doctype html>
<html>
<head>
<style>
a{ text-decoration:none;}
.paging li a{ float:left;}
.paging a:hover{text-decoration:underline;}

ul { list-style-type:none; float:right; display:inline; overflow:hidden; background-color:; width:30%}
li{float:left; padding-right:7px;margin:0; color:white;}
li a:hover{color:red; font-size:20px; background-color:lightblue;}

.active{background-color:gray;}
.search a:hover{ background-color:lightblue;text-decoration:underline;}
body{font-family:verdena; font-size:18px;}
image{height:20px;}
.status  a:hover{text-decoration:underline;}
ul p a:hover{text-decoration:underline;}
</style>

</head>


<body style="background-color:lightblue;">
<form method ="post" enctype="multipart/form-data">
<div style="">
<div style="height:60px; background-color:#4863A0; font-size:20px;">
<ul>
<?php echo "<li> <a href='personal_profile.php?id=".$ID."'>$image</a></li>"?>
<?php echo "<li><a href='personal_profile.php?id=".$ID."'>$username1</a></li>"?>
<?php echo "<li><a class='active' href='profile.php?id=".$ID."'>Home</a></li>"?>
<?php echo "<li><a class='active' href='messege.php?id=".$ID."'>Message</a></li>"?>

<?php echo "<li><a  href='logout.php?'>Log Out</a></li>"?>

</ul>
</div>
<p style="text-align:center;"><b><?php echo"Welcome ".$Fullname ; ?></b></p>

<p style="position:absolute; top:10px;"><input type="search" style="border:1px solid green; width:200px; " name="search" placeholder="search for people"/> <input type="submit"  style="background-color:green;"name="submit" value="Search"/></p>

<div class="search"style="float:left; width:21%; height:100%">
<!--Search option code-->
<?php
$error="";
if(isset($_POST['submit']))
{
	
	if(empty($_POST['search']))
	 {
		$error="Input search option";
		
	}
	else
	{
	   $name=mysqli_real_escape_string($db,$_POST['search']);
	   
      $query="select * from student where FullName LIKE'%$name%'";
	  $result=mysqli_query($db,$query);
	  $rows = mysqli_num_rows($result);
      
     

	if($rows>=1)
	{
		 while($query2=mysqli_fetch_array($result,MYSQLI_NUM))
		 {
			
		
	if($ID!=$query2[0])
	{
	$fname=$query2[1];
    $lname=$query2[2];
	if($query2[10]=="")
	{
		 $image="<img width='30' height='40'src='2.png'/>";
	}
     else
	{
		$image="<img height='40' widht='30' src='images/" .$query2[10]."'/>";
	}
     
	 
	
  
	echo "<td><a href='user_profile.php?id=".$query2[0]."&uid=".$ID."'>$image $fname $lname</a></td>";

	
	echo"</br>";
	echo"</br>";
	}
	
	//echo "<td><a onclick=\"return confirm('Delete this record?')\"  href='delete.php?id=".$query2[0]."'><b>X</b></a></td>";
   
		
	 }
	 
	}
	else
	{
	 
	$error="Result not found!";
	
    }	  


	}
	
}
?>
<!--End search option code-->
  <p><?php echo $error;?></p>
  </br></br></br></br>
  </br></br></br></br>
 
  
</div>
</div>
<!--save status-->
<div style="text-align:center;padding-right:120px;">
<?php
$fault="";

       if (isset($_POST['sub']))
	   {
		   if(empty($_POST['text']))
        {
			$fault="Insert something for post!";
		
	    }
		
		else{
		   $post=mysqli_real_escape_string($db,$_POST['text']);
		  $query=mysqli_query($db,"insert into status values('','$ID','$post')");
		}
		
		
	   }
 ?>

       Make a post here..</br>
        <textarea  name="text" style="border:1px solid green; height:80px;width:300px;" ></textarea></br>
		<p><?php echo $fault;?></p>
		
  <input type="submit" name="sub" value="Post" style="width:70px;"/>
  <!--end save status-->
 </br> 
  </br> 
  </br> 
  </br> 
  </br> 
  </br> 
  
  
  
 <!--show status and coment--> 
</div>
<div class="status" clear="right" style="padding-right:100px; padding-left:300px;">
<?php
  $fault1="";
  $query_status=mysqli_query($db,"select * from status ORDER BY PID DESC limit 0,5");
  
  while($get_data=mysqli_fetch_array($query_status,MYSQLI_NUM))
  {
	  $PID= $get_data[0];
	  $UID=$get_data[1];
	   $status=$get_data[2];
	   
	   $query_UD=mysqli_query($db,"select * from student where ID='$UID'");
	    $get_UD=mysqli_fetch_array($query_UD,MYSQLI_NUM);
		

		
		$U_name=$get_UD[03];
		$U_ID=$get_UD[0];
		
		if($get_UD[10]=="")
      {
		  
   	    $image="<img width='30' height='30'src='2.png'/>";
       }
 else{
  $image="<img height='30' widht='30' src='images/" .$get_UD[10]."'/>";
 }
 
 
	   echo"<div style='width:750px; border:1px solid white; padding:30px;'>";
	    echo " <a href='user_profile.php?id=".$U_ID."&uid=".$ID."'>$image $U_name</a>";
		echo"</br>";
		echo"</br>";
		
		echo $status;
		echo"</br>";
		echo"</br>";
	
		echo"</br>";
		
		 
		 //show last coment
          echo"Last coments:</br>";
		  $query6=mysqli_query($db,"select * from coment where PID='$PID'  ORDER BY CID DESC limit 0,2");
		
		  while($result=mysqli_fetch_array($query6,MYSQLI_NUM))
			    {
		  $cuid=$result[2];
			 $coment1=$result[3];
			 $date1=$result[4];
			 $time1=$result[5];
			 
			 
			 
			 
			 $query_c=mysqli_query($db,"select * from student where ID='$cuid'");
		$get_c=mysqli_fetch_array($query_c,MYSQLI_NUM);
		$c_name=$get_c[3];
		
		
		
		if($get_c[10]=="")
			
         {
		  
   	    $image1="<img width='30' height='30'src='2.png'/>";
         }
       else  
         {
         $image1="<img height='30' widht='30' src='images/" .$get_c[10]."'/>";
  
  
        }
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 echo"</br>";
			  echo"<a href='user_profile.php?id=".$cuid."& uid=".$ID."'>$image1 $c_name</a></br>";
		   echo"<a style='width:300px;'>$coment1</a></br>";
		   echo $time1." ".$date1;
		   echo"</br>";
		   
			 
		  } 
			 //end show last coment
			 
		 
		
			
			 
              echo " <a href='coment.php?uid=".$ID."&Pid=".$PID."'>See More</a></br>";
			 
             echo " <a href='coment.php?uid=".$ID."&Pid=".$PID."'>Make a coment</a> ";
		  
		
		
		echo"</div>";
		
  }
  
  
  
 
  
?>

<!--end show status and coment-->
</br>
</br>
<div class="paging" style="font-size:24px; font-family:verdana;">

<?php
        $paging=mysqli_query($db,"select * from student");
		$rows=mysqli_num_rows($paging);
		
		$num=$rows/5;
		$a=ceil($num);
		for($b=1;$b<=$a;$b++)
		{
		 echo "<li style='list-style-type:none; padding:10px;'> <a href='profile.php?id=".$ID."&page=".$b."'> $b </a></br></li>";
		}
 ?>
 </div>
</div>


</form>
</body>

</html>