<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E-Learning: Edit Student</title>
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
	<b>Edit Student</b>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="s_f_edit.php" method="post">
	<table>
		<tr>
			<td>User Name: </td>
			<td><input type="text" name="user_name" size="30"/></td>
			<td><input type="submit" name="edit" value="Edit"></td>
		</tr>
	</table>
	<?php
		include "dbconnection.php";
		if($_POST)
		{
			if(!empty($_POST['change']))
			{
				$query = "UPDATE student SET name = '".$_POST['name']."', address = '".$_POST['address']."',gender = '".$_POST['gender']."', contact_no = '".$_POST['contact_no']."', email_id = '".$_POST['email_id']."', parents_name = '".$_POST['parents_name']."', parents_contact_no = '".$_POST['parents_contact_no']."' WHERE user_name =  '".$_POST['user_name']."'";
				mysql_query($query,$con) or die();
				echo '<html><head><script type="text/javascript">alert("Record Saved.");</script></head></html>';
			}
			else
			{
			if(!empty($_POST['user_name']))
			{
				$query = "SELECT * FROM student";
				$result =  mysql_query($query,$con) or die();
				$f = 0;
			
				while($row = mysql_fetch_array($result))
				{
					if($row['user_name'] == $_POST['user_name'])
					{
						$f = 0;
						$un = $_POST['user_name'];
						echo '<table>
		<tr>
			<td>Name: </td>
			<td><input type="text" name="name" size="50" value="'.$row['name'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Gender: </td>
			<td>
				<input type="radio" name="gender" value="male"';
						if($row['gender'] == "male"){ echo 'checked="checked"'; }
						echo '/> Male
  				<input type="radio" name="gender" value="female"';
						if($row['gender'] == "female"){ echo 'checked="checked"'; }
						echo' /> Female
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Address: </td>
			<td><input type="text" name="address" value="'.$row['address'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Contact No.: </td>
			<td><input type="text" name="contact_no" value="'.$row['contact_no'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Email ID: </td>
			<td><input type="text" name="email_id" size="40" value="'.$row['email_id'].'"/></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Parents Name: </td>
			<td><input type="text" name="parents_name" value="'.$row['parents_name'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Parents Name: </td>
			<td><input type="text" name="parents_contact_no" value="'.$row['parents_contact_no'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Branch: </td>
			<td>
			<select name="branch">';
					include "dbconnection.php";
					$que = "SELECT * FROM department";
					$res =  mysql_query($que,$con) or die();
					while($ro = mysql_fetch_array($res))
					{
						echo '<option>'.$ro['branch'] .'</option>';
						if($row['branch'] == $ro['branch']){ echo 'selected="selected"'; }
					}
			echo '</select>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Class: </td>
			<td>
			<select name="class">
				<option ';
				if($row['class'] == "FE"){ echo 'selected="selected"'; }
						echo '>
					FE
				</option>
				<option ';
				if($row['class'] == "SE"){ echo 'selected="selected"'; }
						echo '>
					SE
				</option>
				<option ';
				if($row['class'] == "TE"){ echo 'selected="selected"'; }
						echo '>
					TE
				</option>
				<option ';
				if($row['class'] == "BE"){ echo 'selected="selected"'; }
						echo '>
					BE
				</option>
			</select>
			</td>
		</tr>
	</table>
	<table>	
		<tr>
			<td>Roll No: </td>
			<td><input type="text" name="roll_no" value="'.$row['roll_no'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><input type="submit" name="change" value="Change" /></td>
		</tr>
	</table>';
	break;
					}
					else
					{
						$f = 1;
					}
				}
				if($f == 1)
				{
					echo '<html><head><script type="text/javascript">alert("User Name does not esist!!!");</script></head></html>';
				}
			}
			else
			{
				echo '<html><head><script type="text/javascript">alert("Enter User Name.");</script></head></html>';
			}
			
			if(!empty($_POST['change']))
			{
				$query = "UPDATE login SET (name = '$_POST[name]', gender = '$_POST[gender]', address = '$_POST[address]', contact_no = '$_POST[contact_no]', email_id = '$_POST[email_id]') WHERE user_name =  '$row[user_name]'";
					mysql_query($query,$con) or die();
					$_SESSION['message'] = "Record saved successfully.";
					
					header("Location: http://localhost/E-learning/adduser.php");
			}
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
