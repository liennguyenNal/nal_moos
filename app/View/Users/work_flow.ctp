<!DOCTYPE html>
<html>
<head>
  <title>お申し込みまでの流れ｜家賃でもらえる家</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <meta name="description" content = "「家賃でもらえる家」のお申し込みはとても簡単です。まずは、簡易的な情報で無料会員登録をお願いします。登録後、入居審査お申し込みシステムに、一般的な不動産賃貸契約と同等の情報を入力しボタンを押すだけ。あとは、案内に従い、マイホームを自分好みにプランニングしてください。" />
  <meta name="keywords" content="家、家賃、賃貸、住宅ローン審査、入居審査、マイホーム" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="icon" href="<?php echo $this->webroot; ?>favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap-theme.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/swiper.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/common.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css"　type="text/css" media="screen"　/>
  <script src="<?php echo $this->webroot; ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery.validate.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery.autoKana.js"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery-ui.js"></script>
  <script src="<?php echo $this->webroot; ?>js/autoNumeric.js"></script>
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
  <div id="wrapper">    
    <header id="head-container">
      <div class="container-fluid">
        <!-- Logo -->
        <?php echo $this->element('logo'); ?>
        <!-- End logo -->
        <div class="block-button-header">
          <!-- Block button -->
          <?php echo $this->element('block-button'); ?>
          <!-- End block button -->
        </div>
      </div>
    </header>
    <nav id="menu-page">
      <!-- menu -->
      <?php echo $this->element('menu'); ?>
    </nav>    
    <section id="content-container">
		<div class="menu-sup-page">
			<div class="container-fluid">
				<ul>
					<li><a href="<?php echo $this->webroot; ?>">トップページ</a></li>
					<li><span>申し込みの流れ</span></li>
				</ul>
			</div>
		</div>
		<div class="title-sup-page-style style-d">
			<div class="container-fluid">
				<h1>お申し込みまでの流れ</h1>
			</div>
		</div>
		<div class="block-flow">
			<img src="<?php echo $this->webroot; ?>img/images/flow.png" alt="low"/>
			<div class="block-home-step"><img src="<?php echo $this->webroot; ?>img/images/flow-a.png" alt="low"/></div>
		</div>
		<div class="block-link-page block-link-page-fix">
			<a href="<?php echo $this->webroot; ?>register"><img src="<?php echo $this->webroot; ?>img/front/button-qa.png" alt="無料会員登録"></a>
			<span class="icon-scroll"></span>
		</div>
	</section>
  </div>
  <div class="block-menu-footer">
    <?php echo $this->element('menu-footer'); ?>
  </div>
  <footer id="footer-container" class="footer-page">
    <?php echo $this->element('footer'); ?>
  </footer>
  
  <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/swiper.jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/common.js" type="text/javascript"></script>
</body>
</html>
		