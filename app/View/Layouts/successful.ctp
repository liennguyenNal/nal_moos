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
		<!-- CONTENT -->
		<?php echo $this->fetch('content'); ?>
		<!-- END CONTENT -->
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
	<script src="<?php echo $this->webroot;?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/swiper.jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/common.js" type="text/javascript"></script>
</body>
</html>