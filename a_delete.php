<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E-Learning: Delete Assignment</title>
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
	<b>Delete Assignment</b>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="a_delete.php" method="post">
	<table>
		<tr>
			<td>User Name : </td>
			<td><input type="text" name="user_name" size="30"/></td>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Delete">
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
				if(($row['user_name'] == $_POST['user_name']) && ($row['category'] == 'faculty'))
				{
					$f = 1;
					$n = $_POST['user_name'];
					$q = 'DELETE FROM faculty WHERE user_name='.'"'.$n.'"';
					mysql_query($q, $con) or die();
					$ql = 'DELETE FROM login WHERE user_name='.'"'.$n.'"';
					mysql_query($ql, $con) or die();
					echo '<html><head><script type="text/javascript">alert("Deleted.");</script></head></html>';
					break;
				}
				else
				{
					$f =0;
				}
			}
			
			if($f == 0)
			{
				echo '<html><head><script type="text/javascript">alert("User Name does not esist!!!");</script></head></html>';
			}
		}
		else
		{
			echo '<html><head><script type="text/javascript">alert("Enter User Name.");</script></head></html>';
		}
	}
	mysql_close($con);
?>

<div id="line">
</div>

<?php include ("includes/bottom_line.php"); ?>

</body>
</html>