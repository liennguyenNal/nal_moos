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
	      <li class="<?php  if($menu == 'customer') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/users/">Customers</a></li>
	      <li class="dropdown <?php  if($menu == 'article') echo 'active'?>">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News <span class="caret"></span></a>
	        <ul class="dropdown-menu" role="menu">
	           <li><a href="<?php echo $this->webroot; ?>admin/articles">All News</li>
	          <li><a href="<?php echo $this->webroot; ?>admin/articles/edit">Add News</a></li>
	        </ul>
	      </li>
	      
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
	    <li><a href="<?php echo $this->webroot;?>admin/users/profile"> <?php echo $s_first_name;?></a></li>
          <li><a href="<?php echo $this->webroot;?>admin/users/logout">Log out</a></li>
        </ul>
	  </div>
	</div>
</div>