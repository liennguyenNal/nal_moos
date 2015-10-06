
<?php 
	if($this->Session->check('Message.flash')) 
	{ 
		echo '<div class="block-warning">';
		echo $this->Session->flash();
		echo '</div>';
	}
?>

        
