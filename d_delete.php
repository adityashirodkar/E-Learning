<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E-Learning: Delete Department</title>
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
	<b>Delete Department</b>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="d_delete.php" method="post">
	<table>
		<tr>
			<td>Department: </td>
			<td>
				<select name="branch">
				<?php
					include "dbconnection.php";
					$query = "SELECT * FROM department";
					$result =  mysql_query($query,$con) or die();
					while($row = mysql_fetch_array($result))
					{
						echo '<option>'.$row['branch'] .'</option>';
					}
				?>
				</select>
			</td>
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
		$ql = 'DELETE FROM department WHERE branch='.'"'.$_POST['branch'].'"';
		mysql_query($ql, $con) or die();
		echo '<html><head><script type="text/javascript">alert("Deleted.");</script></head></html>';
	}
	mysql_close($con);
?>

<div id="line">
</div>

<?php include ("includes/bottom_line.php"); ?>

</body>
</html>