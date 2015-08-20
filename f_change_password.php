<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E-Learning: Change Password</title>
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

<?php include ('includes\faculty_main_menu.php'); ?>

<div id="mid">
	<img src="images/Ichalkarnji.jpg"/>
</div>

<div id="text">
	<b>Change Password</b>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="f_change_password.php" method="post">
	<table>
		<tr>
			<tr>
				<td>User Name: </td>
				<td><input type='text' name='user_name' id='username'  maxlength="50" /></td>
			</tr>
		
			<tr>
				<td>Old Password: </td>
				<td><input type='password' name='old_password' id='password' maxlength="50" /></td>
			</tr>
			<tr>
				<td>New Password: </td>
				<td><input type='password' name='new_password' maxlength="50" /></td>
			</tr>
			<tr>
				<td>Confirm Password: </td>
				<td><input type='password' name='confirm_password' maxlength="50" /></td>
			</tr>
			<td colspan="3" align="center"><input type="submit" name="change" value="Change"></td>
		</tr>
	</table>
	<?php
		include "dbconnection.php";
		if($_POST)
		{
			if(!empty($_POST['user_name']))
			{
				$query = "SELECT * FROM login";
				$result =  mysql_query($query,$con) or die();
				$f = 0;
				$f1 = 0;
			
				while($row = mysql_fetch_array($result))
				{
					if(($row['user_name'] == $_POST['user_name']) && ($row['password'] == $_POST['old_password']))
					{
						$f = 0;
						if($_POST['new_password'] == $_POST['confirm_password'])
						{
							$f1 = 0;
							$query = "UPDATE login SET password = '".$_POST['new_password']."' WHERE user_name =  '".$_POST['user_name']."'";
							mysql_query($query,$con) or die();
							$que = "UPDATE faculty SET password = '".$_POST['new_password']."' WHERE user_name =  '".$_POST['user_name']."'";
							mysql_query($que,$con) or die();
							echo '<html><head><script type="text/javascript">alert("Password Changed");</script></head></html>';
							break;
						}
					}
					else
					{
						$f = 1;
					}
				}
				if($f == 1)
				{
					echo '<html><head><script type="text/javascript">alert("User Name or Old Password Incorrect!!!");</script></head></html>';
				}
			}
			else
			{
				echo '<html><head><script type="text/javascript">alert("Enter User Name.");</script></head></html>';
			}
		}
	?>
	
	</form>
</div>

<div id="line">
</div>

<?php include ("includes/bottom_line.php"); ?>

</body>
</html>
