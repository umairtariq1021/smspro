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
include ('../dbcon.php');
$sid= $_GET['sid'];
$sql="SELECT * FROM student WHERE id= '$sid'";
$run= mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($run);

?>
<form action="updatedata.php" method="post" enctype="multipart/form-data">

<table align="center"  border="1" style="width:70%; margin-top:40px;">
<tr>
<td>Roll No</td>
<td><input type= "text" value=<?php echo $data['rollno']; ?> name="rollno" required></td>
</tr>
<tr>
<td>Full Name</td>
<td><input type= "text" value=<?php echo $data['name']; ?> name="name" required></td>
</tr>
<tr>
<td>City</td>
<td><input type= "text" value=<?php echo $data['city']; ?> name="city" required></td>

</tr>
<tr>
<td>Parents Contact No</td>
<td><input type= "text" value=<?php echo $data['pcont']; ?> name="pcon" required></td>

</tr>
<tr>
<td>Standard</td>
<td><input type= "number" value=<?php echo $data['standard']; ?> name="std" required></td>

</tr>
<tr>
<td>Image</td>
<td><input type= "file" name="simg" required></td>

</tr>
<tr>
<input type="hidden" name="sid" value="<?php echo $data['id']; ?>" />
<td colspan="2" align="center"> <input type="submit" name="submit" value= "Submit"/></td>

</tr>
</table>
</form>
</body>
</html>