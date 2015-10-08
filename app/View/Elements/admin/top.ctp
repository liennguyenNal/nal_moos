<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	    <!-- <a href="<?php echo $this->webroot; ?>" class="navbar-brand">Home</a> -->
	    <img src="<?php echo $this->webroot;?>img/front/logo-h.png" style="padding-right:15px">
	    	
	    
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

	    <ul class="nav navbar-nav navbar-right ">
	    	
         	<!-- <li class="dropdown">
         		<ul>
         		<li>
	         	<a href="<?php echo $this->webroot;?>admin/users/change_password">パスワードを忘れた方</a> </li>
	          	<li>
	          	<a href="<?php echo $this->webroot;?>admin/users/logout">ログアウト</a> </li>
	          	</ul>
         </li> -->
         	<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ようこそ <?php echo $s_first_name;?> 様 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php echo $this->webroot;?>admin/users/change_password">パスワード変更</a></li>
                      <li><a href="<?php echo $this->webroot;?>admin/users/logout">ログアウト</a></li>
                     
                    </ul>
                  </li>
        </ul>
	  </div>
	</div>
</div>