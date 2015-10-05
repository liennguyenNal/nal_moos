<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	    <!-- <a href="<?php echo $this->webroot; ?>" class="navbar-brand">Home</a> -->
	    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	  </div>
	  <div class="navbar-collapse collapse" id="navbar-main">
	    <ul class="nav navbar-nav">
	    <li class="<?php  if($menu == 'user') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/users/"><?php echo "申込み一覧"?></a></li>
	 
	      
	      <li class="<?php  if($menu == 'article') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/articles/">お知らせ一覧</a></li>
	           <li class="<?php  if($menu == 'contact') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/contacts"><?php echo "問合せ一覧"?></a></li>
	      <li class="<?php  if($menu == 'customer') echo 'active'?>"><a href="<?php echo $this->webroot;?>admin/customers/">会員管理</a></li>

	      
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
	    	
          <li>
         	<span>ようこそ <?php echo $s_first_name;?> 様　</span>
          	<a href="<?php echo $this->webroot;?>admin/users/logout">ログアウト</a>
          </li>
        </ul>
	  </div>
	</div>
</div>