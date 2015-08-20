<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<?php 
	session_start();
	if(!empty ($_SESSION['category']))
	{
		 session_destroy();
	}
?>
<title>E-Learning: Sign In</title>
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
</head>

<body>

<?php include ("includes/top_line.php"); ?>
<?php include "includes/main_menu.php"; ?>

<div id="mid">
	<img src="images/Ichalkarnji.jpg"/>
</div>

<div id="text">
	<b>Sign In</b>
	
	<form id='login' action='signin.php' method='post' accept-charset='UTF-8'>
	<table>
		<tr>
			<td><span class="style1">User Name* :</span> </td>
			<td><input type='text' name='user_name' id='username'  maxlength="50" /></td>
		</tr>
		<tr>
			<td><span class="style1">Password* :  </span></td>
			<td><input type='password' name='password' id='password' maxlength="50" /></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type='submit' name='Submit' value='Sign In' /></td>
		</tr>
	</table>	
	</form>
	</div>
	
	<?php
	include "dbconnection.php";
	if($_POST)
	{
		if(!empty($_POST['user_name']) && !empty($_POST['password']))
		{
			$query = "SELECT * FROM login";
			$result =  mysql_query($query,$con) or die();
			$f = 0;
			$p = 0;
			while($row = mysql_fetch_array($result))
			{
				if($row['user_name'] == $_POST['user_name'])
				{
					$f = 1;
					if($row['password'] != $_POST['password'])
					{
						$p = 1;
					}
					if($p == 1)
					{
						echo '<html><head><script type="text/javascript">alert("Incorrect Password!!!");</script></head></html>';
					}
				}
				else
				{
				if($f == 0)
				{
					$f = 0;
					echo '<html><head><script type="text/javascript">alert("User Name does not esist!!!");</script></head></html>';
				}
				}
			}
			if($f == 1)
			{
			$Result = "SELECT * FROM login WHERE user_name = '$_POST[user_name]' AND password='$_POST[password]'";
			$rs = mysql_query($Result, $con) or die(); 
			$num_rows = mysql_num_rows($rs);
			
			if($num_rows > 0)
			{
				$r = mysql_fetch_array($rs); 
				$category = $r['category'];
				if($category == 'admin')
				{
					header("Location: http://localhost/E-learning/admin_home.php");
				}
				else
				{
					if($category == 'faculty')
					{
						header("Location: http://localhost/E-learning/faculty_home.php");
					}
					else
					{
						header("Location: http://localhost/E-learning/student_home.php");
					}
				}
			}
			}
		}
		else
		{
			echo '<html><head><script type="text/javascript">alert("Enter User Name and Password!!!");</script></head></html>';
		}
	}
?>
<?php include "includes/bottom_line.php"; ?>

</body>
</html>