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
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/bootstrap-theme.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/swiper.min.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/common.css" type="text/css" media="screen" />
  
  <script src="<?php echo $this->webroot; ?>js/jquery-1.11.0.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot;?>js/jquery.autoKana.js"></script>
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery-ui.css">
  <script src="<?php echo $this->webroot; ?>js/jquery-ui.js"></script>
  <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/swiper.jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/common.js" type="text/javascript"></script>
</head>
<body class="page">
  <div id="wrapper">    
    <header id="head-container">
      <div class="container-fluid">
        <h1 id="logo">
          <a href="<?php echo $this->webroot; ?>"></a>
        </h1>
        <div class="number-button">
          <img src="<?php echo $this->webroot; ?>img/front/number-h.png" alt=""/>
          <a href="#" class="link-a"><img src="<?php echo $this->webroot; ?>img/front/link-a.png" alt="パスワード変更"/></a>
          <a href="#" class="link-b"><img src="<?php echo $this->webroot; ?>img/front/link-b.png" alt="ログアウト"/></a>
        </div>
      </div>
    </header>
        
    <section id="content-container">
      <div class="welcome-sup-page">
        <div class="container-fluid">
          <h2>ようこそ<a href="#">MOOS</a>様</h2>
        </div>
      </div>
      <div class="content-tab">
        <div class="container-fluid">
          <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#home">マイページトップ</a></li>
            <li><a data-toggle="tab" href="#basic">申込人</a></li>
            <li><a data-toggle="tab" href="#partner">配偶者／同居人</a></li>
            <li><a data-toggle="tab" href="#guarantor">連帯保証人</a></li>
            <li><a data-toggle="tab" href="#other_guarantor">連帯保証人 2</a></li>
            <li class="active"><a data-toggle="tab" href="#attachment">添付書類</a></li>
          </ul>

          <div class="tab-content">

            <div id="home" class="tab-pane fade in active">
              <?php echo $this->element('user/dashboard'); ?>
            </div>


            <div id="basic" class="tab-pane fade">
              <?php echo $this->element('user/basic_info'); ?>
            </div>

            <div id="partner" class="tab-pane fade">
              <?php echo $this->element('user/partner'); ?>
            </div>

            <div id="guarantor" class="tab-pane fade">
              <?php echo $this->element('user/guarantor'); ?>
            </div>
            <?php if($user['User']['need_more_guarantor']){ ?>
              <div id="other_guarantor" class="tab-pane fade">
              <?php echo $this->element('user/other_guarantor'); ?>
            </div>
            <?php }?>
            <div id="attachment" class="tab-pane fade">
              <?php echo $this->element('user/attachment'); ?>
            </div>

            <!-- <div id="F" class="tab-pane fade">
              <p>Some content in menu 5.</p>
            </div> -->

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
          <img src="<?php echo $this->webroot; ?>img/front/footer.png" alt=""/>
          <p>Copyright © RENESYS All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>