
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Honoka</title>

  <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/admin/bootstrap.css">
  <style type="text/css">
  body { padding-top: 80px; }
  @media ( min-width: 768px ) {
    #banner {
      min-height: 300px;
      border-bottom: none;
    }
    .bs-docs-section {
      margin-top: 8em;
    }
    .bs-component {
      position: relative;
    }
    .bs-component .modal {
      position: relative;
      top: auto;
      right: auto;
      left: auto;
      bottom: auto;
      z-index: 1;
      display: block;
    }
    .bs-component .modal-dialog {
      width: 90%;
    }
    .bs-component .popover {
      position: relative;
      display: inline-block;
      width: 220px;
      margin: 20px;
    }
    .nav-tabs {
      margin-bottom: 15px;
    }
    .progress {
      margin-bottom: 10px;
    }
  }
  </style>

  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>

<header>
  <?php echo $this->element('admin/top')?>
</header>

<div class="container">
    <?php echo $this->fetch('content'); ?>

</div>


<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="<?php echo $this->webroot;?>js/jquery-1.9.1.js"></script>
<script src="<?php echo $this->webroot;?>js/admin/bootstrap.min.js"></script>

<script type="text/javascript">
  $('.bs-component [data-toggle="popover"]').popover();
  $('.bs-component [data-toggle="tooltip"]').tooltip();

  $('#anti-yu-gothic-button').on('click', function() {
    if ( $('body').hasClass('no-thank-yu') ) {
      $('body').removeClass('no-thank-yu');
      $(this).text('游ゴシックを無効にする').removeClass('btn-primary').addClass('btn-danger');
      $("#anti-yu-gothic-message").html('現在デモページは游ゴシックの指定が<span class="text-primary">有効</span>になっています。');
    }
    else {
      $('body').addClass('no-thank-yu');
      $(this).text('游ゴシックを有効にする').removeClass('btn-danger').addClass('btn-primary');
      $("#anti-yu-gothic-message").html('現在デモページは游ゴシックの指定が<span class="text-danger">無効</span>になっています。');
    }
  });
</script>

</body>
</html>