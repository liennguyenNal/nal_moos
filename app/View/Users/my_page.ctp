<script src="<?php echo $this->webroot;?>js/jquery.autoKana.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="page-header" id="banner">
 <div class="col-lg-4">
    <div class="bs-component">
		 <ul class="breadcrumb">
		    <li><a href="<?php echo $this->webroot;?>">Home</a></li>
		   
		    <li class="active">My Page </li>
		  </ul>
	</div>
</div>

<div class="row">

    <div class="col-lg-12">
      	<div class="page-header">
        	<h1 id="tables">My Page</h1>
      	</div>
      
      	<div class="bs-component">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">マイページトップ</a></li>
            <li ><a href="#basic" data-toggle="tab">申込人</a></li>
            <li><a href="#partner" data-toggle="tab">配偶者／同居人</a></li>
            <li><a href="#guarantor" data-toggle="tab"> 連帯保証人 </a></li>
             <?php if($user['User']['need_more_guarantor']){?>
            <li><a href="#guarantor-2" data-toggle="tab"> 連帯保証人 2</a></li>
            <?php } ?>
            <li><a href="#attach" data-toggle="tab">  添付書類 </a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="home">
           
            	<?php echo $this->element('/user/dashboard');?>
            </div>
            <div class="tab-pane fade" id="basic">
            	
             	<?php echo $this->element('/user/basic_info');?>
            </div>
            <div class="tab-pane fade" id="partner">
            	
             	<?php echo $this->element('/user/partner');?>
            </div>
            <div class="tab-pane fade" id="guarantor">
            
              <?php echo $this->element('/user/guarantor');?>
            </div>
            <?php if($user['User']['need_more_guarantor']){?>
            <div class="tab-pane fade" id="guarantor-2">
            	 <?php echo $this->element('/user/guarantor');?>
            </div>
            <?php } ?>

            <div class="tab-pane fade" id="attach">
            
              <?php echo $this->element('/user/attachment');?>
            </div>

          </div>
        </div>

  	</div>
  </div>