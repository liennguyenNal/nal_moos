<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php $paginator = $this->Paginator; ?>
<div class="page-header">

  <div class="col-lg-4">
    <div class="bs-component">
       <ul class="breadcrumb">
          <li class="active">Users</li>
        </ul>
    </div>
  </div>
   <div class="form-group" >
      <div class="col-lg-12">
      <?php
 //echo $this->Html->link('Export CSV',array('controller'=>'users','action'=>'download'), array('target'=>'_blank','class'=>"btn btn-primary", 'id'=>"btn-export"));
?>
        
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
            
            Registerd Date: <input style="width:250px; display:inline;" id="date_from" name"date_from" type="text" class="datepicker" value="<?php echo $date_from; ?>">
            ~ <input style="width:250px; display:inline;" id="date_to" name"date_to" type="text" class="datepicker" value="<?php echo $date_to; ?>">
            <div style="margin-top:20px;">Name<input style="width:250px; display:inline; " type="text" id="keyword" class="form-control" placeholder="Search" value="<?php echo $keyword; ?>">
            E-mail<input style="width:250px; display:inline;" type="text" id="email" class="form-control" placeholder="Search" value="<?php echo $email; ?>"></div>
            
          </div>
          <div style="margin-top:10px;"><button style="float:right" type="button" class="btn btn-primary" id="btn-search" onclick="search()">Search</button></div>
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
                <th>No</th>
                <th>Email ID</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Registered Date</th>

                <th>Status</th>
                
                <th>Action</th>
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
                <td><?php echo $user['User']['year_of_birth']; ?></td>
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
                    View
                  </button>
                </td>
              </tr>
              <?php } ?>
            <?php } ?>
            </tbody>
          </table> 
          <div class="form-group">
                <div class="col-lg-10 col-lg-offset-0">
                 
                  <input id="btn-delete" type="submit" value="Delete">
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
            "Delete": function() {
              $( "#dialog-confirm-delete1" ).dialog("open");
              $( this ).dialog( "close" );
              event.preventDefault();
            },
            Cancel: function() {
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
            "Delete": function() {
              
              $( this ).dialog( "close" );
              $('#form').submit();
            },
            Cancel: function() {
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
        
        $( "#dialog-confirm-export" ).dialog({
          autoOpen: false,
          resizable: true,
          modal: true,
          buttons: {
            "Export": function() {
              
              $( this ).dialog( "close" );
              window.location.href="<?php echo $this->webroot;?>admin/users/download";

            },
            Cancel: function() {
              agree = false;
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

<div id="dialog-confirm-delete" title="Delete this users?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>All selected user will be deleted. Are you sure?</p>
  </div>

  <div id="dialog-confirm-delete1" title="Confirm delete this users?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure?</p>
  </div>

  <div id="dialog-delete-message" title="Download complete">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Select least one user to delete.
  </p>
  </div>
   <div id="dialog-confirm-export" title="Do you want to export CSV file?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Export all user to CSV file. Are you sure?</p>
  </div>

