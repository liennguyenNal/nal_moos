<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php $paginator = $this->Paginator; ?>
<div class="page-header">

  <div class="row">
    <div class="col-lg-4">
    <div class="bs-component">
       
          <h4 class="active">会員管理</h4>
        
    </div>
  </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      
       
      
      <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <?php 
              //echo $this->Form->input('status', array('options' => array(1=>"No Processing",2=> "Processing",3=>"Completed"), 'empty' => '-- All --', 'class'=>'form-control', 'div'=>false,'style'=>"width:250px; display:inline;", 'label'=>false, 'id'=>'status', 'value'=>$status));
            ?>
            <?php 
              //echo $this->Form->input('type', array('options' => array(1=>"Normal",2=> "Media",3=>"Contruction Company", 4=> "Others"), 'empty' => '-- All --', 'class'=>'form-control', 'style'=>"width:250px; display:inline;", 'div'=>false, 'label'=>false, 'id'=>'type', 'value'=>$type));
            ?>
            
            <label style="margin-left:20px;" for="title" ><?php echo __('admin.user.list_header.register_date'); ?></label> <input style="width:150px; display:inline;" id="date_from" name="date_from" type="text" class="datepicker" value="<?php echo $date_from; ?>">
            -- <input style="width:150px; display:inline;" id="date_to" name="date_to" type="text" class="datepicker" value="<?php echo $date_to; ?>">
            <div style="margin-top:20px;">
             <label style="margin-left:20px;" for="title" >申込人氏名</label>
             <input style="width:250px; display:inline; " type="text" id="keyword" class="form-control"  value="<?php echo $keyword; ?>">
             <label style="margin-left:20px;" for="title" >メールアドレス</label>
             <input style="width:150px; display:inline;" type="text" id="email" class="form-control"  value="<?php echo $email; ?>"></div>
            
          </div>
          <div style="margin-top:10px;"><button style="float:right" type="button" class="btn btn-primary" id="btn-search" onclick="search()"><?php echo __('admin.articles.search_button'); ?></button></div>
          <script type="text/javascript">
            function search(){
              
              var url = '<?php echo $this->webroot; ?>admin/customers/index';
              if($('#keyword').val() != '') url = url + '/keyword:' + $('#keyword').val();
              if($('#email').val() != '') url = url + '/email:' + $('#email').val();
              if($('#date_from').val() != '') url = url + '/date_from:' + $('#date_from').val();
              if($('#date_to').val() != '') url = url + '/date_to:' + $('#date_to').val();


              window.location.href = url ;
            }
          </script>
        </form>


    </div>  
  </div>



<?php echo $this->Form->create('Customer',array('id' =>'form','url' => array('controller' => 'customers', 'action' => 'multi_delete'))); ?>
    <div class="row">
      <div class="col-lg-12">
      

        <div class="page-header">
          <h1 id="tables">Customers</h1>
        </div>
        <?php echo $this->element('flash');?>
        <div class="bs-component">
          
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th><input type="checkbox" id="checkAll"  hiddenField = "false"></th>
                <th>番号</th>
                <th>メールアドレス</th>
                <th>申込人氏名</th>
                <th>電話番号</th>
                <th>性的</th>
                <th><?php echo __('admin.user.list_header.register_date'); ?></th>

                <th><?php echo __('admin.user.list_header.status'); ?></th>
                
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($users as $user) { ?>
            <?php if($user['User']['status_id']==2 and $user['User']['is_deleted']==0) { $i++; ?>
              <tr>
              <td><input class="check_box" type="checkbox" name="customer_id[]" value ="<?php echo $user['User']['id'];?>" hiddenField = "false"></td>
                <td><?php echo $i;?></td>
                <td><?php echo $user['User']['email']; ?></td>
                <td><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></td>
                <td><?php echo $user['User']['phone']; ?></td>
                <td><?php echo $user['User']['gender']; ?></td>
                <td><?php echo $user['User']['created']; ?></td>
                <td><?php 
                  if($user['User']['status_id'] == 0) echo "Reject"; 
                   if($user['User']['status_id'] == 1) echo "Register"; 
                   else if($user['User']['status_id'] == 2) echo "Confirm Registered";
                    else if($user['User']['status_id'] == 3) echo "Completed";
                   ?>
                </td>
                <td>
                  <button type="button" class="btn btn-default"  id="btn-view" onclick="location.href='<?php echo $this->webroot;?>admin/customers/view/<?php echo $user['User']['id']?>'"> 
                    <?php echo __('admin.articles.view_button'); ?>
                  </button>
                </td>
              </tr>
              <?php } ?>
            <?php } ?>
            </tbody>
          </table> 
          <div class="form-group">
                <div class="col-lg-12 col-lg-offset-0">
                 
                  <input style="float:right; margin-top:20px;" id="btn-delete" class="btn btn-primary" type="submit" value="<?php echo __('admin.user.delete_button'); ?>">
                </div>
              </div>
          </div>
        </div>

      </div>
      </form>
    </div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){ 
        var agree = false;
        $("#checkAll").click(function(){
    $('.check_box').not(this).prop('checked', this.checked);
});
        $(function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
        

        $('#btn-delete').on('click', function(event) {
          if ($("#form").find('input[name="customer_id[]"]:checked').length > 0){
             $( "#dialog-confirm-delete" ).dialog("open");
               event.preventDefault(); 

          }
          else {
            $( "#dialog-delete-message" ).dialog('open');
            event.preventDefault();
          }
        });

        $( "#dialog-confirm-delete" ).dialog({
          autoOpen: false,
          resizable: true,
          modal: true,
          buttons: {
            "削除する": function() {
              $( "#dialog-confirm-delete1" ).dialog("open");
              $( this ).dialog( "close" );
              event.preventDefault();
            },
            'キャンセル': function() {
              agree = false;
              $( this ).dialog( "close" );
            }
          }
        });
        $( "#dialog-confirm-delete1" ).dialog({
          autoOpen: false,
          resizable: true,
          modal: true,
          buttons: {
            "削除する": function() {
              
              $( this ).dialog( "close" );
              $('#form').submit();
            },
            'キャンセル': function() {
              agree = false;
              $( this ).dialog( "close" );
            }
          }
        });
        $( "#dialog-delete-message" ).dialog({
          autoOpen: false,
            modal: true,
            buttons: {
              Ok: function() {
                $( this ).dialog( "close" );
              }
            }
          });
        
        

        $('#btn-export').on('click', function(event) {
          
             $( "#dialog-confirm-export" ).dialog("open");
             event.preventDefault();
          
        });
       
      });
    </script>
    <?php echo $this->element('admin/paginate');?>
  </div>

  <div id="dialog-confirm-delete" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>お知らせを削除しますか？</p>
  </div>

  <div id="dialog-confirm-delete1" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>お知らせを削除すると2度と復元できません。
お知らせを削除しますか？</p>
  </div>

  <div id="dialog-delete-message" title="Delete Alert">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Select least one user to delete.
  </p>
  </div>
</div>
