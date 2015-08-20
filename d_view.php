<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E - Learning :All Department's</title>
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
<b>All Departments's</b>
</div>
<div>
	<table>
<?php
				include "dbconnection.php";
				$query = "SELECT * FROM department";
				$result=  mysql_query($query,$con) or die();
				echo '<table border="1" id="mid">';
				echo '<tr><th>Department</th></tr>';
			while($row = mysql_fetch_array($result))
			{
			  echo '<tr><td>'.$row['branch'] .'</td></tr>';
			}
			echo '</table>';
?>
</table>
</div>

<div id="line">
</div>

<?php include ("includes/bottom_line.php"); ?>

</body>
</html>
