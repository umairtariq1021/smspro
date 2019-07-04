 <?php
session_start();
if(isset($_SESSION['uid']))
{
	header('location:admin/admindash.php');
}

 ?>
<!DOCTYPE html>
<html lang= "en_US">
<head>
<title>Admin Login</title>
</head>
<body>

<h1 align="center">Admin Login</h1>

<form action="login.php" method="post">

<table align="center" >
<tr>
<td>Username</td>
<td><input type= "text" placeholder="Enter Username" name="uname" required></td>
</tr>
<tr>
<td>Password</td>
<td><input type= "password" placeholder="Enter Your Password" name="pass" required></td>
</tr>
<tr>
<td colspan="2" align="center"> <input type="submit" name="login" value= "Login"/></td>

</tr>
</table>
</form>


</body>
</html>
<?php 
include('dbcon.php');
if(isset($_POST['login'])){
	$username = $_POST['uname'];
	$password = $_POST['pass'];
	$qry = "select * from admin where username = '$username' and password ='$password'" ;
	$run = mysqli_query($con,$qry);  //running queryy
	$row= mysqli_num_rows($run); // checking number of rows
	if($row <1)
	{ 
?>
		<script> alert('Username or Password not Match');
		window.open('login.php','_self');
		</script>
		<?php
	}
	else {
		$data=mysqli_fetch_assoc($run);
		$id=$data['id'];
		$_SESSION['uid']= $id;
		header('location:admin/admindash.php');
	}
}
?>