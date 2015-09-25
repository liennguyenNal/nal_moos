<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	    <!-- <a href="<?php echo $this->webroot; ?>" class="navbar-brand">Home</a>
	    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button> -->
	    <a href="<?php echo $this->webroot?>"><img src="<?php echo $this->webroot?>no-logo.jpg" style="height:100px"/> </a>
	  </div>
	  <div class="navbar-collapse collapse" id="navbar-main">
	    <ul class="nav navbar-nav">
	      <li class="<?php  if($menu == 'home') echo 'active'?>"><a href="<?php echo $this->webroot;?>">Top page</a></li>
	      <li class="<?php  if($menu == 'contact') echo 'active'?>"><a href="<?php echo $this->webroot;?>contacts">Contact</a></li>
	      <li class="<?php  if($menu == 'campaign') echo 'active'?>"><a href="<?php echo $this->webroot;?>campaign">Campaign</a></li>
	      <li class="<?php  if($menu == 'faq') echo 'active'?>"><a href="<?php echo $this->webroot;?>faq">FAQs</a></li>
	      <?php if($s_user_id && !$is_admin){ ?>
	      <li class="<?php  if($menu == 'customer') echo 'active'?>"><a href="<?php echo $this->webroot;?>users/profile">My Profile</a></li>
	      <?php } ?>

	      <li class="<?php  if($menu == 'news') echo 'active'?>"><a href="<?php echo $this->webroot;?>articles">News</a></li>
	      
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
	    	<?php if($s_user_id && !$is_admin){ ?>
		    	<li><a href="<?php echo $this->webroot;?>users/profile"> <?php echo $s_first_name . " " .  $s_last_name;?></a></li>
	          	<li><a href="<?php echo $this->webroot;?>users/logout">Log out</a></li>
          	<?php } else { ?>
          		<li><a href="<?php echo $this->webroot;?>users/login">Log in</a></li>
          		<li><a href="<?php echo $this->webroot;?>admin/users/">Admin </a></li>
          	<?php } ?>
        </ul>
	  </div>
	</div>
</div>