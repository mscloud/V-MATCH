<!DOCTYPE html>
<head>
<style>
button {
    background:none!important;
     border:none; 
     padding:0!important;
    /*border is optional*/
     border-bottom:1px solid #444; 
	 text-decoration: underline;
border: none;
color: blue;
cursor: pointer;
}

</style>
</head>
</head>
<?php session_start(); ?>
<html>
	<body background="bg.png">
  <div id="container" >

<div id="header" style="background-color:#FFA500;" style="height>



<?php // Create connection
$con=mysqli_connect("localhost","root","","matrimonial");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
$uid=$_SESSION['uid'];
$result=mysqli_query($con,"SELECT * FROM exp_interest WHERE uid2='$uid'");
$flag=-1;
$count=0;
while($row = mysqli_fetch_array($result))
  {
  	if($row['likes']!=NULL)
	 $count++;
  }
  echo '<div id="content" align="center" style="background-color:#EEEEEE;"><h1>
No of Likes = '.$count.'</h1></div>';
echo '<div id="footer" align="center" style="font-size:20pt;">';

  
  	$result2=mysqli_query($con,"SELECT * FROM exp_interest WHERE uid2='$uid'");
  echo "<table>";
  while($row2 = mysqli_fetch_array($result2))
  {
  	$like=$row2['likes'];
	$msg=$row2['msg'];
	$uid1=$row2['uid1'];
	$result1=mysqli_query($con,"SELECT * FROM profile_m WHERE pid='$uid1'");
	$row1 = mysqli_fetch_array($result1);
	$dname=$row1['dname'];
	//echo $like;
	if($like==NULL)
	{
		echo "<tr>";
  		echo "<td>" . $dname . "</td>";
		echo "<td>&nbsp;&nbsp;</td>";
		
  		echo "<td>" . "Expressed Interest" . "</td>";
		echo "<td>&nbsp;&nbsp;</td>";
		echo "<td><form name=".'$count'." id='vp' method='post' action='view-profile.php'> <input type='hidden' name='dusrname' value='".$dname."'> <button type='submit'> View profile  </form></td>";
		echo "</tr>";
		echo "<tr>";
	    echo "<td>&nbsp;</td>";
		
		echo "</tr>";
		echo "<tr>";
 		echo "<td>" ."Message:"."</td>";
		echo "<td>&nbsp;</td>";
		echo "<td>" . $msg . "</td>";
		echo "</tr>";
  		echo "<tr>";
	    echo "<td>&nbsp;</td>";
		echo "</tr>";
		echo "<tr>";
	    echo "<td>&nbsp;</td>";
		echo "</tr>";
  	
	}
	else {
	$count++;
		echo "<tr>";
  		echo "<td>" . $dname . "</td>";
		echo "<td>&nbsp;&nbsp;</td>";
		
  		echo "<td>" . "Likes Your Profile" . "</td>";
		echo "<td>&nbsp;&nbsp;</td>";
		echo "<td><form name=".'$count'." id='vp' method='post' action='view-profile.php'> <input type='hidden' name='dusrname' value='".$dname."'> <button type='submit'> View profile  </form></td>";
		
		echo "</tr>";
		echo "<tr>";
	    echo "<td>&nbsp;</td>";
		echo "</tr>";
	
	}
	
  }
  echo "</table>";
  echo "</div>";
  mysqli_close($con);
?>
  
 </div>
 </div>
 </body>
 </html>
