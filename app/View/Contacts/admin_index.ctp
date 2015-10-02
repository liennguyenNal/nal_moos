
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php $this->Paginator->options(array('url' => $this->passedArgs));?>
<div class="page-header">
  <div class="row">
    <div class="col-lg-4">
      <div class="bs-component">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            
            <li class="active">Contacts</li>
          </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      
       
      
      <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <?php 
              echo $this->Form->input('status', array('options' => array(1=>"No Processing",2=> "Processing",3=>"Completed"), 'empty' => '-- All --', 'class'=>'form-control', 'div'=>false,'style'=>"width:250px; display:inline;", 'label'=>false, 'id'=>'status', 'value'=>$status));
            ?>
            <?php 
              echo $this->Form->input('type', array('options' => array(1=>"Normal",2=> "Media",3=>"Contruction Company", 4=> "Others"), 'empty' => '-- All --', 'class'=>'form-control', 'style'=>"width:250px; display:inline;", 'div'=>false, 'label'=>false, 'id'=>'type', 'value'=>$type));
            ?>
            
            From: <input style="width:250px; display:inline;" id="date_from" name"date_from" type="text" class="datepicker" value="<?php echo $date_from; ?>">
            To: <input style="width:250px; display:inline;" id="date_to" name"date_to" type="text" class="datepicker" value="<?php echo $date_to; ?>">
            <div style="margin-top:20px;">Name<input style="width:250px; display:inline; " type="text" id="keyword" class="form-control" placeholder="Search" value="<?php echo $keyword; ?>">
            Company Name<input style="width:250px; display:inline;" type="text" id="company" class="form-control" placeholder="Search" value="<?php echo $company; ?>"></div>
            <!-- <select class="form-control" id="select" name="status">
                    <option value=""><font><font>All </font></font></option>
                    <option value="1"><font><font>No process yet</font></font></option>
                    <option value="2"><font><font>Processing</font></font></option>
                    <option value="3"><font><font>Completed</font></font></option>
                    
            </select> -->
            
          </div>
          <button style="float:right" type="button" class="btn btn-primary" id="btn-search" onclick="search()">Search</button>
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

              <th>No</th>
              <th>Created</th>
              <th>Full Name</th>
              <th>Company</th>
              <th>Type</th>
              <th>Phone</th>
              <th>Email</th>
              
              
              
              <th>Status</th>
              <th>Action</th>
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
              <td><?php echo $contact['Contact']['type'] ?></td>
              <td><?php echo $contact['Contact']['phone'] ?></td>
              <td><?php echo $contact['Contact']['email'] ?></td>
              
              
              
              
              <td><?php if($contact['Contact']['status']==1){echo 'No Processing';} if($contact['Contact']['status']==2){echo 'Processing';} if($contact['Contact']['status']==3){echo 'Completed';} ?></td>
              <td><a href="<?php echo $this->webroot;?>admin/contacts/change_confirm/<?php echo $contact['Contact']['id'] ?>">View</a> </td>
            </tr>
          <?php } ?>
          </tbody>
        </table> 
        <input id="btn-delete" type="submit" value="Delete">
        </form>
        

        

        <!--<a href="<?php echo $this->webroot;?>admin/contacts/delete/<?php echo $contact['Contact']['id'] ?>" onclick="return confirm('Do you want to delete this contact')">Delete</a>-->
      </div><!-- /example -->
    </div>
  </div>
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

</script>
