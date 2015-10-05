<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	    <a href="<?php echo $this->webroot; ?>" class="navbar-brand">Home</a>
	    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	  </div>
	  <div class="navbar-collapse collapse" id="navbar-main">
	    <ul class="nav navbar-nav">
	      <li class="<?php  if($menu == 'contact') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/contacts">Contact</a></li>
	      <li class="<?php  if($menu == 'user') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/users/">Registered</a></li>
	      <li class="<?php  if($menu == 'article') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/articles/">News</a></li>
	      <li class="<?php  if($menu == 'customer') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/customers/">Customers</a></li>

	      
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
	    <li><a href="<?php echo $this->webroot;?>admin/users/profile"> <?php echo $s_first_name;?></a></li>
          <li><a href="<?php echo $this->webroot;?>admin/users/logout">Log out</a></li>
        </ul>
	  </div>
	</div>
</div>