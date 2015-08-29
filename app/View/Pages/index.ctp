<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MOOS</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</header>
<body>
	<div id="container">
		
		<div id="content">

			<h2>HOME PAGE</h2>
			<ul>
				<li>
					HOME /
					<a href="<?php echo $this->webroot; ?>users/login/">Customner Login</a> /
					<a href="<?php echo $this->webroot; ?>admin/users/login">Administrator Login</a> /
					<a href="<?php echo $this->webroot; ?>faq">FAQ</a> /
					<a href="<?php echo $this->webroot; ?>campaign">Campaign</a> /
					<a href="<?php echo $this->webroot; ?>contact">Contact</a>
				</li>
			</ul>
		</div>
		<div id="footer">
			<p>Developer by NAL</p>
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>