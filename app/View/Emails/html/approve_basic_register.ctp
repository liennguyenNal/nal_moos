<p>Dear <?php echo $user['User']['first_name']. " " . $user['User']['last_name']?>,</p>
<p/>
<p>Your registration has been approved by admin.</p>
<p></p>
<p>Email ID: <?php echo $user['User']['email']?></p>
<p>Click below link to create passqord </p>
	
	<p><a href="<?php echo $_SERVER['HTTP_HOST'] . $this->webroot;?>users/create_password/email:<?php echo $user['User']['email'];?>/access_token:<?php echo $user['User']['access_token'];?>"> </a>
	</p>

<p><p/>
<p>If you have any question, please click <a href="www.moos.nal.vn/contacts">here</a> to  contact with us </p>
<p />

<p>Cheer,</p>
<p>Administrator</p>
