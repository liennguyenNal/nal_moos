<link rel="stylesheet" href="<?php echo $this->webroot;?>css/login_style.css">
<h2>Welcome to MOOS website , <?php echo $s_first_name . " " . $s_last_name;?>,  <a href="logout">Log out</a></h2>

<h3>Your Profile の管理</h3>

<table>
	<tr>
		<td style="background-color:#E6E6E6"><b>Email</b></td>
		
		<td><?php echo $user['User']['email']?></td>

	</tr>
	<tr>
		<td style="background-color:#E6E6E6;width:200px"><b>First Name</b></td>
		
		<td><?php echo $user['User']['first_name']?></td>

	</tr>
	<tr>
		<td style="background-color:#E6E6E6"><b>Last Name</b></td>
		
		<td><?php echo $user['User']['last_name']?></td>

	</tr>
	<tr>
		<td style="background-color:#E6E6E6"><b>First Name - Kana</b></td>
		
		<td><?php echo $user['User']['last_name']?></td>

	</tr>
	<tr>
		<td style="background-color:#E6E6E6"><b>Last Name Kana</b></td>
		
		<td><?php echo $user['User']['last_name_kana']?></td>

	</tr>
	<tr>
		<td colspan="2" align="center">
			 <p class="submit" style="width:150px"><input type="button" name="btnEditProfile" onclick="location.href='edit_profie'" value="Edit Profile"></p>
			 <p class="submit" style="width:150px"><input type="button" name="btnChangePassword" onclick="location.href='change_password'" value="Change Password"></p>
		</td>
	</tr>
</table>