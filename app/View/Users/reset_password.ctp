
<html>
<head>
	<title>[:. MOOS .:]</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<meta name="description" content="mô tả website" />
	<meta name="keywords" content="những từ khóa của website bạn" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- <link rel="icon" href="img/front/favicon.ico" type="image/x-icon" /> -->
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/bootstrap-theme.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/swiper.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/common.css" type="text/css" media="screen" />
	<script src="<?php echo $this->webroot; ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot; ?>js/jquery.validate.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot; ?>js/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot; ?>js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot; ?>js/swiper.jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot; ?>js/common.js" type="text/javascript"></script>
</head>
<body class="page">
	<div id="wrapper">		
		<header id="head-container">
			<div class="container-fluid">
				<h1 id="logo" class="float-none">
					<a href="<?php echo $this->webroot;?>"></a>
				</h1>
			</div>
		</header>
				
		<section id="content-container">
			<div class="welcome-sup-page">
				<div class="container-fluid">
					<h2>ようこそゲスト様</h2>
				</div>
			</div>
			<div class="title-sup-page">
				<div class="container-fluid">
					<h3>パスワード変更</h3>
				</div>
			</div>
			<div class="from-login">
				<div class="container-fluid">
					<div class="from-ldpage">
						<div class="content">
							<div class="container-fluid">
							<div class="block-warning" id="error-section" style="display:none">
			                    <?php echo __('global.errors.reset.password'); ?>
			                </div>
								<div class="content-from">
									<form id="form_reset" action="reset_password" method="POST" >
										<div class="content-from-block">
											<p class="note fix-font">ご登録いただいているメールアドレスを入力し送信ボタンを押すと、</br>パスワード設定画面へのリンクを記載したメールがメールアドレス宛に送信されます。</p>
											<div class="content-from-how">
												<table class="from">
													<tbody>
														<tr>
															<td class="label-text"><label>登録メールアドレス</label><span>必須</span></td>
															<td>
																<div class="block-input">
																	<div><input class="w198" id="reset_email" type="text" name="email" data-placement="right">
	       															<span class="alert_reset"></span></div>
																	
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<p class="note note-fix">※会員登録されていないメールアドレスを入力した場合、メールは送信されません。</br>※受信拒否設定を行っている方は、MOOSからのメールが受信できる様、設定ください。</br>※メールが受信・発見できない場合、迷惑メールボックスに振り分けられていないかご確認ください。</p>
											<div class="block-note">
												<div class="block-button">
													<button class="submit" type="button"><img src="<?php echo $this->webroot;?>img/front/text-from-a.png" alt="送信する"/></button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<div class="block-menu-footer">
		<div class="container-fluid">
	      <ul>
	        <li><a href="#">家賃でもらえる家とは</a></li>
	        <li><a href="#">申し込みの流れ</a></li>
	        <li><a href="<?php echo $this->webroot; ?>faq">よくある質問</a></li>
	        <li><a href="#">仮審査申し込み</a></li>
	        <li><a href="<?php echo $this->webroot; ?>contact">お問い合わせ</a></li>
	        <li><a href="#">運営会社</a></li>
	        <li><a href="#">個人情報保護方針</a></li>
	      </ul>
	    </div>
	</div>

	<footer id="footer-container" class="footer-page">
		<div class="container-fluid">		
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<img src="<?php echo $this->webroot;?>img/front/footer.png" alt=""/>
					<p>Copyright © RENESYS All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- SCRIPT VALIDATION -->
  <script>
    $("#form_reset").validate({
      rules: {
        'email': {
          required: true,
          email: true
        }
      },
      messages: {
        'email': {
          required: "<?php echo __('global.errors.required'); ?>"
        }
      },
      invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          $("#error-section").show();
        } else {
          $("#error-section").hide();
        }
      }
    });
    jQuery.extend(jQuery.validator.messages, {
      email: "<?php echo __('global.errors.email'); ?>"
    });
  </script>

  <script type="text/javascript">
	jQuery(document).ready(function() { 
	    jQuery('.submit').click(function(event){
		    jQuery.ajax({url: "<?php echo Router::url('/', true); ?>"+"users/ajax_password_reset/", type: 'POST', cache: false, data: 'email='+jQuery('#reset_email').val(),  success: function(result){
	        	if(result== 'not'){
	        		$('#error-section').show().html("<?php echo __('global.errors.reset.email'); ?>");
	        	}
	        	else{
	        		$('#error-section').hide();
	        		jQuery('#form_reset').submit();
	        	}
			}});
	    });
	});
	</script>
</body>
</html>