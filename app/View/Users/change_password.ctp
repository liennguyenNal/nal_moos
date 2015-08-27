<link rel="stylesheet" href="<?php echo $this->webroot;?>css/login_style.css">
<h1>Welcome to MOOS website , <?php echo $s_first_name . " " . $s_last_name;?>,  <a href="logout">Log out</a></h1>

<h1>Change Password</h1>

<table>
	<?php echo $this->element('flash');?>
	<?php echo $this->Form->create("User", array('action'=>'change_password')) ?>
	<tr>
		<td style="background-color:#E6E6E6"><b>Old Password</b></td>
		
		<td><p><input type="password" name="data[User][old_password]"  placeholder="Old Password"></p></td>

	</tr>
	<tr>
		<td style="background-color:#E6E6E6"><b>New Password</b></td>
		
		<td><p><input type="password" name="data[User][password]"  placeholder="New Password"></p></td>

	</tr>
	<tr>
		<td style="background-color:#E6E6E6"><b>Confirm Password</b></td>
		
		<td><p><input type="password" name="data[User][confirm_password]"  placeholder="Confirm new password"></p></td>

	</tr>
	
	
	<tr>
		<td colspan="2" align="center">
			 <p class="submit" style="width:150px"><input type="submit" name="btnEditProfile" value="Save Password"></p>
			 
		</td>
	</tr>
</table>