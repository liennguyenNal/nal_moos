<?php if($user['User']['married_status_id'] == 1) echo $this->element('/user/partner');
	else echo  $this->element('/user/partner_not_married');
?>
