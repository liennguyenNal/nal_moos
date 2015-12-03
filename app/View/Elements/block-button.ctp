<style type="text/css" media="screen">
	.inactive {
	   pointer-events: none;
	   cursor: default;
	}
</style>
<?php if(!$s_user_id){?>
<a href="<?php echo $this->webroot; ?>users/login" class="link1" ><img src="<?php echo $this->webroot; ?>img/front/button-02.png" alt="会員専用マイページ"/></a>

<a href="<?php echo $this->webroot; ?>contact" class="link2"><img src="<?php echo $this->webroot; ?>img/front/button-03.png" alt="メールでお問い合わせ"/></a>
<a class="link3"><img src="<?php echo $this->webroot; ?>img/front/button-044.png" alt="ビジネスモデル特許出願中"/></a>
<?php } else {?>
<div class="number-button">
          <img src="<?php echo $this->webroot; ?>img/front/number-h.png" alt=""/>
          <a href="<?php echo $this->webroot; ?>users/email_change_password" class="link-a"><img src="<?php echo $this->webroot; ?>img/front/link-a.png" alt="パスワード変更"/></a>
          <a href="<?php echo $this->webroot; ?>users/logout" class="link-b"><img src="<?php echo $this->webroot; ?>img/front/link-b.png" alt="ログアウト"/></a>
        </div>
	<?php } ?>