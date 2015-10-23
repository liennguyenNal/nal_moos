<!DOCTYPE html>
<html>
<head>
	<title>無料会員登録｜家賃でもらえる家</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<meta name="description" content="「家賃でもらえる家」の無料会員登録ページです。まずは、簡単な内容にてご登録いただける無料会員にご登録ください。商品・サービスの営業電話、セールス活動は一切行っておりませんので安心してご登録ください。" />
	<meta name="keywords" content="家、家賃、賃貸、住宅ローン審査、入居審査、マイホーム、無料会員" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="icon" href="<?php echo $this->webroot; ?>favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/bootstrap-theme.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/swiper.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/common.css" type="text/css" media="screen" />
	<script src="<?php echo $this->webroot;?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot; ?>js/jquery.validate.js" type="text/javascript"></script>
  	<script src="<?php echo $this->webroot; ?>js/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/swiper.jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->webroot;?>js/common.js" type="text/javascript"></script>
	<style type="text/css" media="screen">
  	.title-sup-page-style h1 {
	    color: #ffffff;
	    font-size: 27px;
	    margin-top: 64px;
	    text-align: center;
	}	
  </style>
</head>
<body class="page">
	<!-- CONTENT -->
	<?php echo $this->fetch('content'); ?>
	<!-- END CONTENT -->
	
	<!-- MENU - FOOTER -->
	<div class="block-menu-footer">
		<?php echo $this->element('menu-footer'); ?>
	</div>
	<!-- END MENU-FOOTER -->
	
	<!-- FOOTER -->
	<footer id="footer-container" class="footer-page">
		<?php echo $this->element('footer'); ?>
	</footer>
	<!-- END FOOTER -->
</body>
</html>