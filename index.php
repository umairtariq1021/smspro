<!DOCTYPE html>
<html lang= "en_US">
<head>
<title>Student Management System</title>
</head>
<body>
<h3 align="right" style="margin-righ:20pxt"><a href="login.php">Admin Login</a></h3>
<h1 align="center">Welcome to Student Management System</h1>

<form action="index.php" method="post">

<table border="1" align="center" style="width:30%;">
<tr>
<td colspan="2" align="center">Student Information</td>
</tr>
<tr>
<td align="left">Choose Standard</td>
<td>
<select name="std" >
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>
<option value="4">4th</option>
<option value="5">5th</option>
<option value="6">6th</option>
</select>
</td>
</tr>
<tr>
<td align="left">Enter Roll Number<td>
<td><input type= "text"  name="rollno" required/></td>
</tr>
<tr>
<td colspan="2" align="center"> <input type="submit" name="submit" value= "Show Info"/></td>

</tr>
</table>
</form>


</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$standard = $_POST['std'];
	$rollno=$_POST['rollno'];
	include ('dbcon.php');
	include('function.php');
	showdetails($standard,$rollno);
}
?>