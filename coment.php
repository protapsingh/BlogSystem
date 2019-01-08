

<!doctype html>
<html>
<head>

</head>
<body style="background-color:lightblue;">
<form method="POSt">
<div style="padding-right:100px; padding-left:300px;">
<?php
include('config.php');
include('user_access.php');
$CID=$_GET['uid'];
$PID=$_GET['Pid'];
$fault="";



$query=mysqli_query($db,"select * from status where PID='$PID'");
$get=mysqli_fetch_array($query,MYSQLI_NUM);
      $UID=$get[1];
	 $status=$get[2];
	 
	 
	 
	 
	 
	 
	 $query1=mysqli_query($db,"select * from student where ID='$UID'");
	 $get1=mysqli_fetch_array($query1,MYSQLI_NUM);
	 $U_name=$get1[03];
	 $U_ID=$get1[0];
			
		if($get1[10]=="")
       {
   	     $image="<img width='30' height='30'src='2.png'/>";
        }
      else
	    {
         $image="<img height='30' widht='30' src='images/" .$get1[10]."'/>";
        }
	 
	 
	 
	 echo"<div <div style='width:750px; border:1px solid white;padding:30px;'>";
	 //back to home
	  echo"<a href='profile.php?id=".$CID."'>HOME</a> </br> </br>";
	  //end
	 
	 echo " <a href='user_profile.php?id=".$U_ID."&uid=".$CID."'>$image $U_name</a>";
		echo"</br>";
		echo"</br>";
		
		echo $status;
		echo"</br>";
		echo"</br>";
		//show coment
		echo"<b>Coments:</b>";
		
		
		echo"<div style='width:400px;'>";
		
		
		
		$query6=mysqli_query($db,"select * from coment where PID='$PID'");
		
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
		  

	      
           echo"<a href='user_profile.php?id=".$cuid."& uid=".$CID."'>$image1 $c_name</a></br></br>";
		   echo"<a style='width:300px;'>$coment1</a></br>";
		   echo $time1." /".$date1;
		   echo"</br>";
		   
		  
		 }
		
		echo"</div>";
		
		echo"</br>";
	  
	  echo "<textarea name='status_coment' placeholder='Make a coment here' style='height:20px; width:300px;'></textarea>";
		echo"</br>";
		echo " <input type='submit' name='coment' value='Coment' style='height:20px; width:60px; padding: background-color:lightblue;'/>";
		echo"</br>";
		
		if(isset($_POST['coment']))
		{
			   if(empty($_POST['status_coment']))
        {
			$fault="Insert something for post!";
		
	    }
			else
			{
				$coment=mysqli_real_escape_string($db,$_POST['status_coment']);
				$date= date('d-m-y');
				$time=date('H:i:s');
				
				
			$query3=mysqli_query($db,"Insert into coment values('','$PID','$CID','$coment','$date','$time')");
			
			header("location:coment.php?uid=$CID &Pid=$PID");
			
				
			}
		}
	  
	  echo"</div>";

?>

</div>
</form>

</body>

</html>