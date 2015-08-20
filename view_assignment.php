<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E - Learning : Assignment</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>

<?php include ("includes/top_line.php"); ?>
<?php include ("includes/student_main_menu.php"); ?>

<div id="mid">
	<img src="images/Ichalkarnji.jpg"/>
</div>

<div id="text">
	<b>Assignment</b>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="view_assignment.php" method="post">
	<table>
		<tr>
			<td>Trade : </td>
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
		</tr>
		
		<tr>
			<td>Class : </td>
			<td>
			<select name="class">
				<option selected="selected">
					FE				</option>
				<option>
					SE				</option>
				<option>
					TE				</option>
				<option>
					BE				</option>
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" name="submit" value="Submit">
			</td>
		</tr>
	</table>
	</form>
</div>

<div>
	<table>
				<?php
				include "dbconnection.php";
				if(!empty($_POST['branch']) && !empty($_POST['class']))
				{
					$query = "SELECT * FROM assignment WHERE branch='" . $_POST['branch'] . "' AND class='" . $_POST['class'] . "'";
					$result=  mysql_query($query,$con) or die();
					$c = 1;
					echo '<table border="1" id="mid">';
					while($row = mysql_fetch_array($result))
					{
						echo '<tr><td>';
						echo $c.'.';
						echo '</td><td>' . $row['subject'].'';
						echo '</td><td>';
						echo "" . $row['assignment'].'';
						echo '</td></tr>';
						$c ++;
					}
					echo '</table>';
				}
?>
			
	</table>
</div>

<div id="line">
</div>

<?php include ("includes/bottom_line.php"); ?>

</body>
</html>