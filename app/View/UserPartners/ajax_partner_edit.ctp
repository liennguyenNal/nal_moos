<?php if($user['User']['live_with_family']) echo $this->element('/user/partner');
	else echo  $this->element('/user/partner_not_married');
?>
