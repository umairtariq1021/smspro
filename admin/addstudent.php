<?php
session_start();
if(isset($_SESSION['uid']))
{
	echo "";
}
else
{
	header('location:../login.php');
}
?>

<?php
include ('header.php');
include ('titlehead.php');

?>
<form action="addstudent.php" method="post" enctype="multipart/form-data">

<table align="center"  border="1" style="width:70%; margin-top:40px;">
<tr>
<td>Roll No</td>
<td><input type= "text" placeholder="Enter Roll No" name="rollno" required></td>
</tr>
<tr>
<td>Full Name</td>
<td><input type= "text" placeholder="Enter Your Name" name="name" required></td>
</tr>
<tr>
<td>City</td>
<td><input type= "text" placeholder="Enter Your City" name="city" required></td>

</tr>
<tr>
<td>Parents Contact No</td>
<td><input type= "text" placeholder="Enter Contact Number" name="pcon" required></td>

</tr>
<tr>
<td>Standard</td>
<td><input type= "number" placeholder="Enter Standard" name="std" required></td>

</tr>
<tr>
<td>Image</td>
<td><input type= "file" name="simg" required></td>

</tr>
<tr>
<td colspan="2" align="center"> <input type="submit" name="submit" value= "Submit"/></td>

</tr>
</table>
</form>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
	include ('../dbcon.php');
	$rollno=$_POST['rollno'];
	$name = $_POST['name'];
	$city = $_POST['city'];
	$pcon =$_POST['pcon'];
	$std =$_POST['std'];
	$imagename= $_FILES['simg']['name'];
  $tempname= $_FILES['simg']['tmp_name'];
   move_uploaded_file($tempname,"../dataimg/$imagename");

	$qry="INSERT INTO student(rollno, name, city, pcont, standard,image) VALUES ('$rollno','$name','$city','$pcon','$std','$imagename')";
     
	 $run=mysqli_query($con,$qry);
	 
		if($run == true)
		{
			?>
			<script>
			alert('Data Inserted Successfully.');
			</script>
			<?php
		}
	
}
?>