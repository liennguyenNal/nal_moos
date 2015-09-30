 <div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	   
	    <a href="<?php echo $this->webroot?>"><img src="<?php echo $this->webroot?>no-logo.jpg" style="height:100px"/> </a>
	  </div>
	  <div class="navbar-collapse collapse" id="navbar-main">
	    

	    <ul class="nav navbar-nav navbar-right">
	    	<?php if($s_user_id && !$is_admin){ ?>
		    	<li><a href="#"> <?php echo $s_first_name . " " .  $s_last_name;?></a></li>
		    	<li><a href="#">パスワード変更</a></li>
	          	<li><a href="<?php echo $this->webroot;?>users/logout">ログアウト</a></li>
          	<?php } else { ?>
          		<!-- <li><a href="<?php echo $this->webroot;?>users/login">Log in</a></li> -->
          		<li><a href="<?php echo $this->webroot;?>admin/users/">Admin </a></li>
          	<?php } ?>
        </ul>
	  </div>
	</div>
</div>