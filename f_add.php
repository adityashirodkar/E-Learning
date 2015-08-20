<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E-Learning : Add Faculty</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>

<div id="top">
	<div id="inner_top">
			<img src="images/logo_dktes.gif"/>
	</div>
</div>

<div id="line">
</div>

<?php include ('includes\admin_main_menu.php'); ?>

<div id="mid">
	<img src="images/Ichalkarnji.jpg"/>
</div>

<div id="text">
	<b>Add Faculty</b>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="f_add.php" method="post">
	<table>
		<tr>
			<td>Name : </td>
			<td><input type="text" name="name" size="50" /></td>
		</tr>
		<tr>
			<td>Gender : </td>
			<td>
				<input type="radio" name="gender" value="male" checked="checked" /> Male
  				<input type="radio" name="gender" value="female" /> Female
			</td>
		</tr>
		<tr>
			<td>Address : </td>
			<td><input type="text" name="address" /></td>
		</tr>
		<tr>
			<td>Contact No. : </td>
			<td><input type="text" name="contact_no" /></td>
		</tr>
		<tr>
			<td>Email ID : </td>
			<td><input type="text" name="email_id" size="40"/></td>
		</tr>
		<tr>
			<td>User Name : </td>
			<td><input type="text" name="user_name" size="50"/></td>
		</tr>
		<tr>
			<td>Password : </td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td>Confirm Password : </td>
			<td><input type="password" name="confirm_password" /></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" name="submit" value="Add">
			</td>
		</tr>
	</table>
	</form>
</div>

<?php
	include "dbconnection.php";
	if($_POST)
	{
		if(!empty($_POST['user_name']))
		{
			$query = "SELECT * FROM login";
			$result =  mysql_query($query,$con) or die();
			$f = 0;
			
			while($row = mysql_fetch_array($result))
			{
				if($row['user_name'] == $_POST['user_name'])
				{
					echo '<html><head><script type="text/javascript">alert("User Name already esist!!!");</script></head></html>';
					$f = 1;
					break;
				}
			}
			
			if($f == 0)
			{
				$fp = 0;
				if($_POST['password'] != $_POST['confirm_password'])
				{
					echo '<html><head><script type="text/javascript">alert("Password incorrect!!!");</script></head></html>';
					$fp = 1;
				}
				
				if($fp == 0)
				{
					$query = "INSERT INTO faculty VALUES ('$_POST[name]', '$_POST[gender]', '$_POST[address]', '$_POST[contact_no]', '$_POST[email_id]', '$_POST[user_name]', '$_POST[password]')";
					mysql_query($query,$con) or die();
					$queryl = "INSERT INTO login VALUES ('$_POST[user_name]', '$_POST[password]', 'faculty')";
					mysql_query($queryl,$con) or die();
					echo '<html><head><script type="text/javascript">alert("Record saved successfully.");</script></head></html>';
				}
			}
		}
	}
	mysql_close($con);
?>

<div id="line">
</div>

<?php include ("includes/bottom_line.php"); ?>

</body>
</html>
