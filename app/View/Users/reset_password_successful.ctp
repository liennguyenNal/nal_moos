<!DOCTYPE html>
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
					<h3>パスワード設定完了</h3>
				</div>
			</div>
			<div class="from-login">
				<div class="container-fluid">
					<div class="from-ldpage">
						<div class="content">
							<div class="container-fluid">
								<div class="content-from">
									<form action="">
										<div class="content-from-block">
											<p class="note fix-font">※パスワード設定が完了致しました。</p>
											<div class="block-note">
												<div class="block-button">
													<a href="<?php echo $this->webroot; ?>users/login"><button type="button" class="style"><img src="<?php echo $this->webroot;?>img/front/text-from-b.png" alt="ログイン画面へ"/></button></a>
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
				<li><a href="#">よくある質問</a></li>
				<li><a href="#">無料会員登録</a></li>
				<li><a href="#">お問い合わせ</a></li>
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
	<script src="<?php echo $this->webroot;?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/swiper.jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/common.js" type="text/javascript"></script>
</body>
</html>