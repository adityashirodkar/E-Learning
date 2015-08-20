<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>E-Learning: Add Student</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>

<?php include ("includes/top_line.php"); ?>
<?php include ("includes/faculty_main_menu.php"); ?>

<div id="mid">
	<img src="images/Ichalkarnji.jpg"/>
</div>

<div id="text">
	<b>Add Student</b>
	<?php session_start();
	?>
	<form action="s_f_add.php" method="post">
	<table>
		<tr>
			<td>Student Name: </td>
			<td><input type="text" name="name" size="50" /></td>
		</tr>
		<tr>
			<td>Gender: </td>
			<td>
				<input type="radio" name="gender" value="male" checked="checked" /> Male
  				<input type="radio" name="gender" value="female" /> Female
			</td>
		</tr>
		<tr>
			<td>Address: </td>
			<td><input type="text" name="address" size="50" /></td>
		</tr>
		<tr>
			<td>Contact No.: </td>
			<td><input type="text" name="contact_no" /></td>
		</tr>
		<tr>
			<td>Email ID: </td>
			<td><input type="text" name="email_id" size="40"/></td>
		</tr>
		<tr>
			<td>Parents Name: </td>
			<td><input type="text" name="parents_name" size="50"/></td>
		</tr>
		<tr>
			<td>Parents Contact No.: </td>
			<td><input type="text" name="parents_contact_no" /></td>
		</tr>
		
		<tr>
			<td>Branch: </td>
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
			<td>Class: </td>
			<td>
			<select name="class">
				<option>
					FE
				</option>
				<option>
					SE
				</option>
				<option>
					TE
				</option>
				<option>
					BE
				</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>Roll No: </td>
			<td><input type="text" name="roll_no" size="20" /></td>
		</tr>
		
		<tr>
			<td>User Name: </td>
			<td><input type='text' name='user_name' id='username'  maxlength="50" /></td>
		</tr>
		
		<tr>
			<td>Password: </td>
			<td><input type='password' name='password' id='password' maxlength="50" /></td>
		</tr>
		
		<tr>
			<td>Confirm Password: </td>
			<td><input type='password' name='confirm_password' id='password' maxlength="50" /></td>
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
	$query = "SELECT * FROM student";
	$result =  mysql_query($query,$con) or die();
	$f = 0;
	if($_POST)
	{
		if(!empty($_POST['branch']) && !empty($_POST['class']) && !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['address']) && !empty($_POST['contact_no']) && !empty($_POST['email_id']) && !empty($_POST['parents_name']) && !empty($_POST['parents_contact_no']) && !empty($_POST['roll_no']) && !empty($_POST['user_name']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
		{
			while($row = mysql_fetch_array($result))
			{
				if(($row['name'] == $_POST['name']) && ($row['branch'] == $_POST['branch']) && ($row['class'] == $_POST['class']) && ($row['roll_no'] == $_POST['roll_no']))
				{
					echo '<html><head><script type="text/javascript">alert("You are already registered!!!");</script></head></html>';
					$f = 1;
					break;
				}
			}
			if($f == 0)
			{
				if(!empty($_POST['user_name']))
				{
					$query = "SELECT * FROM login";
					$result =  mysql_query($query,$con) or die();
					$f1 = 0;
					
					while($row = mysql_fetch_array($result))
					{
						if($row['user_name'] == $_POST['user_name'])
						{
							echo '<html><head><script type="text/javascript">alert("User Name already esist!!!");</script></head></html>';
							$f1 = 1;
						}
					}
				
					if($f1 == 0)
					{
						$fp = 0;
						if($_POST['password'] != $_POST['confirm_password'])
						{
							echo '<html><head><script type="text/javascript">alert("Password incorrect!!!");</script></head></html>';
							$fp = 1;
						}
					
						if($fp == 0)
						{
							$queryl = "INSERT INTO login VALUES ('$_POST[user_name]', '$_POST[password]', 'student')";
							mysql_query($queryl,$con) or die();
							$query = "INSERT INTO student VALUES ('$_POST[name]' , '$_POST[gender]', '$_POST[address]', '$_POST[contact_no]', '$_POST[email_id]', '$_POST[parents_name]', '$_POST[parents_contact_no]', '$_POST[branch]', '$_POST[class]', '$_POST[roll_no]', '$_POST[user_name]', '$_POST[password]', '".date('d-m-Y')."')";
							mysql_query($query,$con) or die();
							echo '<html><head><script type="text/javascript">alert("Record saved successfully.");</script></head></html>';
						}
					}
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