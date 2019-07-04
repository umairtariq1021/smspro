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
<!DOCTYPE html>
<html>
<head>
 <title></title>
</head>
<body>
<form method="post" action="deletestudent.php">

<table align="center" style="margin-top:20px;"  >

<tr>
<td>Enter Student Name</td>
<td><input type= "text" placeholder="Enter Your Name" name="stuname" required></td>

<td>Enter Student Standard</td>
<td><input type= "number" placeholder="Enter Standard" name="stustd" required></td>


<td colspan="2" align="center"> <input type="submit" name="submit" value= "Search"/></td>

</tr>
</table>
</form>
<table align="center" width="80%" border='1' style="margin-top:20px;"  >

<tr style="background-color:#000; color:#fff;">
<th>No</th>
<th>Image</th>
<th>Name</th>
<th>Rollno</th>
<th>Edit</th>


</tr>
<?php
if(isset($_POST['submit']))
{
	include('../dbcon.php');
	$standard = $_POST['stustd'];
	$name = $_POST['stuname'];
 $sql= "SELECT * FROM student WHERE standard ='$standard' AND name LIKE '%$name%'";
 $run = mysqli_query($con,$sql);
 if(mysqli_num_rows($run)<1){
	 echo "<tr><td colspan='5'>No Records Found</td></tr>";
	 
 }
 else 
 {
	 $count=0;
	 while($data=mysqli_fetch_assoc($run)){
		 $count++;
		 ?>
		 <tr>
<td><?php echo $count; ?></td>
<td><img src="../dataimg/<?php echo $data['image'];?>" style="max-width:100px;"/></td>
<td><?php echo $data['name'];?></td>
<td><?php echo $data['rollno'];?></td>
<td><a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a></td>
</tr>
		 
		 <?php
	 }
 }
  }
  ?>
</table>
</body>
</html>
 
