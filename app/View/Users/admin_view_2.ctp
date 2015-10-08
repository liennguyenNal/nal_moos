<script src="<?php echo $this->webroot;?>js/jquery.autoKana.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="page-header" id="banner">
 <div class="col-lg-4">
    <div class="bs-component">
     <ul class="breadcrumb">
        <li><a href="<?php echo $this->webroot?>admin/users/"><?php echo __('admin.register_users')?></a></li>
      </ul>
  </div>
</div>

<div class="row">

    <div class="col-lg-12">
      
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
           
              <?php echo $this->element('/admin/user/dashboard');?>
            </div>
            <div class="tab-pane fade" id="basic">
              
              <?php echo $this->element('/admin/user/basic_info');?>
            </div>
            <div class="tab-pane fade" id="partner">
              
              <?php echo $this->element('/admin/user/partner');?>
            </div>
            <div class="tab-pane fade" id="guarantor">            
              <?php echo $this->element('/admin/user/guarantor');?>
            </div>
            <?php if($user['User']['need_more_guarantor']){?>
            <div class="tab-pane fade" id="guarantor-2">
               <?php echo $this->element('/admin/user/other_guarantor');?>
            </div>
            <?php } ?>

            <div class="tab-pane fade" id="attach">
            
              <?php echo $this->element('/admin/user/attachment');?>
            </div>

          </div>
        </div>

    </div>

    <div class="form-group">
       
        <div class="col-lg-10 ">
          <button type="button" class="btn btn-danger" id="btn-delete" style="float:left"> 削除する</button>
          <div class="col-lg-offset-2" style="padding-left:150px">
             <?php if($user['User']['status_id']){?>
             <?php if($user['User']['status_id'] == "3"){?>
              <button type="button" class="btn btn-warning" id="btn-reject"> 却下する</button>

              <button type="button" class="btn btn-success" id="btn-approve">審査承認する</button>
              <button type="button" class="btn btn-primary" id="btn-return">差戻す</button>
              <?php } else if($user['User']['status_id'] == "4"){?>
                       <button type="button" class="btn btn-primary" id="btn-charged"><?php echo __('admin.user.charged_button')?></button>
              <?php }?>
            <?php } ?>   
              <button type="button" class="btn btn-default" id="btn-cancel" style="float:right"><?php echo __('admin.user.back_button')?></button>
            </div>
          
        </div>

      </div>
  </div>
          <script type="text/javascript">
            function approve(){
              if(confirm("Are you sure approve for this customer"))
                window.location.href='<?php echo $this->webroot;?>admin/users/approve/<?php echo $user['User']['id']?>';
            }
            function reject(){
              if(confirm("Are you sure reject for this customer"))
                window.location.href='<?php echo $this->webroot;?>admin/users/reject/<?php echo $user['User']['id']?>';
            }
            $(document).ready(function(){ 
              

              $('#btn-delete').on('click', function() {
                
                   $( "#dialog-confirm-delete" ).dialog("open");
               
              });
              $('#btn-reject').on('click', function() {
                
                   $( "#dialog-confirm-reject" ).dialog("open");
               
              });
               $('#btn-approve').on('click', function() {
                
                   $( "#dialog-confirm-approve" ).dialog("open");
                
              });
                $('#btn-charged').on('click', function() {
                
                   $( "#dialog-confirm-charged" ).dialog("open");
                
              });
               $('#btn-cancel').on('click', function() {
                
                   window.location.href='<?php echo $this->webroot;?>admin/users';
                
              });

              $( "#dialog-confirm-delete" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "削除する": function() {
                   $( "#dialog-reconfirm-delete" ).dialog("open");
                    $( this ).dialog( "close" );
                  },
                   'キャンセル': function() {
                    agree = false;
                    $( this ).dialog( "close" );
                  }
                }
              });
              $( "#dialog-reconfirm-delete" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "削除する": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/users/delete/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                   'キャンセル': function() {
                    agree = false;
                    $( this ).dialog( "close" );
                  }
                }
              });
              $( "#dialog-confirm-reject" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "却下する": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/users/reject/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                   'キャンセル': function() {
                    agree = false;
                    $( this ).dialog( "close" );
                  }
                }
              });
              
              $( "#dialog-confirm-approve" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "承認する": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/users/approve/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                   '<?php echo __("admin.user.cancel_button")?>': function() {
                    $( this ).dialog( "close" );
                  }
                }
              });
              $( "#dialog-confirm-charged" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "確認する": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/users/process_payment/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                   '<?php echo __("admin.user.cancel_button")?>': function() {
                    $( this ).dialog( "close" );
                  }
                }
              });

              function return_user(){
             
                if($('#ReturnUserForm :checkbox:checked').length > 0)
                {
                  $('#return_error_not_choose').show();
                  $('#ReturnUserForm').submit();
                }
                else {
                  $('#return_error_not_choose').show();
                }
              }
              dialog_return = $( "#dialog-confirm-return" ).dialog({
                autoOpen: false,
                height: 450,
                width: 650,
                modal: true,
                buttons: {
                  "差戻す": return_user,
                   '<?php echo __("admin.user.cancel_button")?>': function() {
                    dialog_return.dialog( "close" );
                  }
                }
              });
           
              // form = dialog_return.find( "form" ).on( "submit", function( event ) {
              //   event.preventDefault();
              //   return_user();
              // });
           
              $( "#btn-return" ).button().on( "click", function() {
                dialog_return.dialog( "open" );
              });
              
              dialog_set_max_payment = $( "#dialog-set-max_payment" ).dialog({
                autoOpen: false,
                height: 300,
                width: 400,
                modal: true,
                buttons: {
                  "設定する": edit_max_payment_user,
                  '<?php echo __("admin.user.cancel_button")?>': function() {
                    dialog_set_max_payment.dialog( "close" );
                  }
                }
              });
              $( "#btn-set-max-payment" ).button().on( "click", function() {
                dialog_set_max_payment.dialog( "open" );
              });
              function edit_max_payment_user(){
                if(isNumeric($("#max_payment").val())){
                  $('#error_max_payment_input').hide();
                  $('#EditMaxPaymentUserForm').submit();
                }
                else {
                  $('#error_max_payment_input').show();
                }
                
              }
              function isNumeric(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
              }
            });
          </script>
  </div>
   <div id="dialog-confirm-delete" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>申込みを削除しますか？</p>
  </div>
  <div id="dialog-reconfirm-delete" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>申込みを削除すると2度と復元できません。</p>
  </div>

   <div id="dialog-confirm-approve" title="審査承認">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>審査を承認しますか？</p>
  </div>
  <div id="dialog-confirm-reject" title="却下">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>申込みを却下しますか？</p>
  </div>
  
  <div id="dialog-confirm-return" class="modal-dialog" title="差戻し">
 
    <?php echo $this->Form->create("User", array('action'=>'return','id'=>'ReturnUserForm' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after') ) ) ) ?>
        <p style="display:none; color:red" id="return_error_not_choose">Please select one</p>
      <fieldset>
        <p>差し戻し理由をチェックをいれ、ひつ料にい応じて差し戻しメール</p>
        <p>に追加する文章をテキストボックスに入力してください。</p>
        <?php echo $this->Form->input('required', array('type'=>'select', 'multiple'=>'checkbox', 'options'=>array(1=>'添付ファイルの追加', 2=>'入寮区内容の修正', 3=>'保証人の追加'), 'class' => 'checkbox dialog-checkox', 'style' => 'width:100px; display:inline','label'=>false, 'div'=>false)); ?>
        <textarea name="data[User][comment]" id="comment" style="width: 439px; height: 80px;margin-top:20px" ></textarea>
        
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
        <?php $this->Form->hidden('User.id')?>
      </fieldset>
    </form>
  </div>
  <div id="dialog-set-max_payment" class="modal-dialog" title="上限賃料設定">
    
    <?php echo $this->Form->create("User", array('action'=>'edit_max_payment','id'=>'EditMaxPaymentUserForm' ,'class'=>'form-horizontal' ) ) ?>
      <fieldset>
        <p style="display:none; color:red" id="error_max_payment_input"><?php echo __('global.errors.number')?></p>
        <p>上限賃料
          <input name="data[User][max_payment]" id="max_payment"  value="<?php echo $user['User']['max_payment'];?>" /> 円</p>
        
        <?php $this->Form->hidden('User.id')?>
      </fieldset>
    </form>
  </div>
  <div id="dialog-confirm-charged" title="保証金入金確認">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>保証金入金を確認しますか？</p>
  </div>
  <style type="text/css" media="screen">
    .dialog-checkox {
      display: inline-block;
      margin-left: 5px; 
    }
    .dialog-checkox label{
      display: inline-block;
      width: 200px;
    }
  </style>
