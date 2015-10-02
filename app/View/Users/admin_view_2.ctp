<script src="<?php echo $this->webroot;?>js/jquery.autoKana.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="page-header" id="banner">
 <div class="col-lg-4">
    <div class="bs-component">
     <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="<?php echo $this->webroot?>admin/users/">Customers</a></li>
        <li class="active">View Customer </li>
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
          <button type="button" class="btn btn-danger" id="btn-delete" style="float:left"> <?php echo __('admin.user.delete_button')?></button>
          <div class="col-lg-offset-2" style="padding-left:150px">
             <?php if($user['User']['status_id']){?>
             <?php if($user['User']['status_id'] == "3"){?>
              <button type="button" class="btn btn-warning" id="btn-reject"> <?php echo __('admin.user.reject_button')?></button>

              <button type="button" class="btn btn-success" id="btn-approve"><?php echo __('admin.user.approve_main_button')?></button>
              <button type="button" class="btn btn-primary" id="btn-return"><?php echo __('admin.user.return_button')?></button>
              <?php } else if($user['User']['status_id'] == "4"){?>
                       <button type="button" class="btn btn-primary" id="btn-return"><?php echo __('admin.user.charged_button')?></button>
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
               $('#btn-cancel').on('click', function() {
                
                   window.location.href='<?php echo $this->webroot;?>admin/users';
                
              });

              $( "#dialog-confirm-delete" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "Delete": function() {
                   $( "#dialog-reconfirm-delete" ).dialog("open");
                    $( this ).dialog( "close" );
                  },
                  Cancel: function() {
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
                  "Delete": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/users/delete/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                  Cancel: function() {
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
                  "Reject": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/users/reject/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                  Cancel: function() {
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
                  "Approve": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/users/approve/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                  Cancel: function() {
                    agree = false;
                    $( this ).dialog( "close" );
                  }
                }
              });


              function return_user(){
                // var required_update = $('#chk-required-update').val();
                // var required_guarantor = $('#chk-required-guarantor').val();
                // var required_file = $('#chk-required-file').val();
                // $.ajax({
                //     url: "<?php echo $this->webroot?>admin/users/return_user/<?php echo $user['User']['id']?>", 
                //     'method':'POST',
                //     'data':"data[User][required_update]=" + required_update + "data[User][required_update]=" + required_guarantor + "data[User][required_file]=" + required_file ,
                //     success: function(result){
                //       $("#basic").html(result);
                //       $.ajax({
                //          url: "<?php echo $this->webroot?>admin/users/reload_dashboard",
                //           success: function(result){
                //             $('#home').html(result);
                //           }
                //       });
                //     }});
                $('#ReturnUserForm').submit();
              }
              dialog_return = $( "#dialog-confirm-return" ).dialog({
                autoOpen: false,
                height: 450,
                width: 650,
                modal: true,
                buttons: {
                  "Return": return_user,
                  Cancel: function() {
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
                  "Update": edit_max_payment_user,
                  Cancel: function() {
                    dialog_set_max_payment.dialog( "close" );
                  }
                }
              });
              $( "#btn-set-max-payment" ).button().on( "click", function() {
                dialog_set_max_payment.dialog( "open" );
              });
              function edit_max_payment_user(){
                 $('#EditMaxPaymentUserForm').submit();
                
              }
              
            });
          </script>
  </div>
   <div id="dialog-confirm-delete" title="Delete?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This user will be deleted. Are you sure?</p>
  </div>
  <div id="dialog-reconfirm-delete" title="Delete?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>If you delete user, all related data also deleted . Are you sure?</p>
  </div>
   <div id="dialog-confirm-approve" title="Approve?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This user will be approved. Are you sure?</p>
  </div>
  <div id="dialog-confirm-reject" title="Reject?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Reject this user. Are you sure?</p>
  </div>
  
  <div id="dialog-confirm-return" class="modal-dialog" title="Return Customer">
    <p>This account will be return the customer </p>
    <?php echo $this->Form->create("User", array('action'=>'return','id'=>'ReturnUserForm' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after') ) ) ) ?>
      <fieldset>
        
        <?php echo $this->Form->input('required', array('type'=>'select', 'multiple'=>'checkbox', 'options'=>array(1=>'Update Info', 2=>'Add more guarantor', 3=>'Upload more file'), 'class' => 'checkbox dialog-checkox', 'style' => 'width:100px; display:inline','label'=>false, 'div'=>false)); ?>
        <textarea name="data[User][comment]" id="comment" style="width: 439px; height: 80px;margin-top:20px" ></textarea>
        
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
        <?php $this->Form->hidden('User.id')?>
      </fieldset>
    </form>
  </div>
  <div id="dialog-set-max_payment" class="modal-dialog" title="Set max payment">
    <p>Set max payment for user </p>
    <?php echo $this->Form->create("User", array('action'=>'edit_max_payment','id'=>'EditMaxPaymentUserForm' ,'class'=>'form-horizontal' ) ) ?>
      <fieldset>
        
        <input name="data[User][max_payment]" id="max_payment"  value="<?php echo $user['User']['max_payment'];?>" />
        
        <?php $this->Form->hidden('User.id')?>
      </fieldset>
    </form>
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
