
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php $this->Paginator->options(array('url' => $this->passedArgs));?>
<div class="page-header">
  <div class="row">
    <div class="col-lg-4">
    <div class="bs-component">
       
          <h4 class="active">問合せ一覧</h4>
        
    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      
       
      
      <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <label style="margin-left:20px;" for="title" ><?php echo __('admin.contact.status'); ?></label>
            <?php 
              echo $this->Form->input('status', array('options' => array(1=>"No Processing",2=> "Processing",3=>"Completed"), 'empty' => '', 'class'=>'form-control', 'div'=>false,'style'=>"width:100px; display:inline;", 'label'=>false, 'id'=>'status', 'value'=>$status));
            ?>

            <label style="margin-left:20px;" for="title" ><?php echo __('user.contact.type-company'); ?></label>
            <?php 
              echo $this->Form->input('type', array('options' => array(1=>"一殷のお客様",2=> "メディア関係",3=>"建設会社", 4=> "その他"), 'empty' => '', 'class'=>'form-control', 'style'=>"width:100px; display:inline;", 'div'=>false, 'label'=>false, 'id'=>'type', 'value'=>$type));
            ?>
            
            <label style="margin-left:20px;" for="title" ><?php echo __('admin.contact.created_date'); ?></label>
            <input style="width:150px; display:inline;" id="date_from" name"date_from" type="text" class="datepicker" value="<?php echo $date_from; ?>">
             -- <input style="width:150px; display:inline;" id="date_to" name"date_to" type="text" class="datepicker" value="<?php echo $date_to; ?>">
            <div style="margin-top:20px;">
            <label style="margin-left:20px;" for="title" ><?php echo __('user.contact.username'); ?></label>
            <input style="width:250px; display:inline; " type="text" id="keyword" class="form-control"  value="<?php echo $keyword; ?>">
            <label style="margin-left:20px;" for="title" ><?php echo __('user.contact.company-name'); ?></label>
            <input style="width:250px; display:inline;" type="text" id="company" class="form-control"  value="<?php echo $company; ?>"></div>
            <!-- <select class="form-control" id="select" name="status">
                    <option value=""><font><font>All </font></font></option>
                    <option value="1"><font><font>No process yet</font></font></option>
                    <option value="2"><font><font>Processing</font></font></option>
                    <option value="3"><font><font>Completed</font></font></option>
                    
            </select> -->
            
          </div>
          <div>
          <button style="float:right; margin-top:20px;" type="button" class="btn btn-primary" id="btn-search" onclick="search()"><?php echo __('admin.articles.search_button'); ?></button>
          </div>
          <script type="text/javascript">
            function search(){
              
              var url = '<?php echo $this->webroot; ?>admin/contacts/index';
              if($('#keyword').val() != '') url = url + '/keyword:' + $('#keyword').val();
              if($('#status').val() != '') url = url + '/status:' + $('#status').val();
              if($('#company').val() != '') url = url + '/company:' + $('#company').val();
              if($('#type').val() != '') url = url + '/type:' + $('#type').val();
              if($('#date_from').val() != '') url = url + '/date_from:' + $('#date_from').val();
              if($('#date_to').val() != '') url = url + '/date_to:' + $('#date_to').val();


              window.location.href = url ;
            }
          </script>
        </form>


    </div>  
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">Contacts</h1>
      </div>

      <div class="bs-component">
      <?php echo $this->element('flash');?>
      <?php echo $this->Form->create('Contact',array('id' =>'form','url' => array('controller' => 'contacts', 'action' => 'multi_delete'))); ?>

        <table class="table table-striped table-hover ">
          <thead>
            <tr>
              <th><input type="checkbox" id="checkAll"  hiddenField = "false"></th>

              <th>番号</th>
              <th><?php echo __('admin.contact.created_date'); ?></th>
              <th><?php echo __('user.contact.username'); ?></th>
              <th><?php echo __('user.contact.company-name'); ?></th>
              <th><?php echo __('user.contact.type-company'); ?></th>
              <th><?php echo __('user.contact.company-phone'); ?></th>
              <th><?php echo __('user.register.email'); ?></th>
              
              
              
              <th><?php echo __('admin.contact.status'); ?></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php $i = 0;
          	foreach ($contacts as $contact) { 
          	$i++;
          	?>
            <tr>
                <td><input class="check_box" type="checkbox" name="contact_id[]" value ="<?php echo $contact['Contact']['id'];?>" hiddenField = "false"></td>

            

              
              <td><?php echo $i;?></td>
              <td><?php echo $contact['Contact']['created'] ?></td>
              <td><?php echo $contact['Contact']['first_name'].' '.$contact['Contact']['last_name']?></td>
              <td><?php echo $contact['Contact']['company'] ?></td>
              <td><?php if($contact['Contact']['type']==1) echo '一殷のお客様'; if($contact['Contact']['type']==2) echo 'メディア関係'; if($contact['Contact']['type']==3) echo '建設会社'; if($contact['Contact']['type']==4) echo 'その他';  ?></td>
              <td><?php echo $contact['Contact']['phone'] ?></td>
              <td><?php echo $contact['Contact']['email'] ?></td>
              
              
              
              
              <td><?php if($contact['Contact']['status']==1){echo 'No Processing';} if($contact['Contact']['status']==2){echo 'Processing';} if($contact['Contact']['status']==3){echo 'Completed';} ?></td>
              <td><a class="btn btn-default" href="<?php echo $this->webroot;?>admin/contacts/change_confirm/<?php echo $contact['Contact']['id'] ?>"><?php echo __('admin.articles.view_button'); ?></a> </td>
            </tr>
          <?php } ?>
          </tbody>
        </table> 
        <input style="float:right; margin-top:20px;" id="btn-delete" class="btn btn-primary" type="submit" value="<?php echo __('admin.user.delete_button'); ?>">
        </form>
        

        

        <!--<a href="<?php echo $this->webroot;?>admin/contacts/delete/<?php echo $contact['Contact']['id'] ?>" onclick="return confirm('Do you want to delete this contact')">Delete</a>-->
      </div><!-- /example -->
    </div>
  </div>
  <?php echo $this->element('admin/paginate');?>

</div>
<div id="dialog-confirm-delete" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>問い合わせを削除しますか？</p>
  </div>

  <div id="dialog-confirm-delete1" title="Confirm delete this users?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>A問い合わせを削除すると2度と復元できません。
問い合わせを削除しますか？</p>
  </div>

  <div id="dialog-delete-message" title="Delete Alert">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Select least one user to delete.
  </p>
  </div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="text/javascript">

$("#checkAll").click(function(){
    $('.check_box').not(this).prop('checked', this.checked);
});

$(function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });



        $('#btn-delete').on('click', function(event) {
          if ($("#form").find('input[name="contact_id[]"]:checked').length > 0){
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

</script>
