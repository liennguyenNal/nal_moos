
    <script src="<?php echo $this->webroot; ?>js/jquery.validate.js" type="text/javascript"></script>
  <script src="<?php echo $this->webroot; ?>js/jquery-validate.bootstrap-tooltip.js" type="text/javascript"></script>
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
    