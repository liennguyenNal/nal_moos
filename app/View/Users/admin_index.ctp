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
 echo $this->Html->link('Export CSV',array('controller'=>'users','action'=>'download'), array('target'=>'_blank','class'=>"btn btn-primary", 'id'=>"btn-export"));
?>
     </div>
   </div>
    <div class="col-lg-12" style="padding-top:20px">
      
      
          
    <?php echo $this->Form->create('User', array('action'=>'index', 'id'=>'form-search'))?>
     <table style="padding-top:20px">
        <tbody>
          <tr>
            <td margin-left:20px>
              <label>Filter </label>
            
               <select class="form-control" id="type" style="width:250px; display:inline">
                    <option value="1">Registered</option>
                    <option value="2">Updated</option>
                    <option value="3">Finished</option>
                  </select>
                 
           
              <label style="padding-left:20px">Select </label>
            
              <select class="form-control" id="" style="width:250px; display:inline; padding-left:20px"></select>
              <label style="padding-left:20px">Keyword </label>
              <input class="form-control" style="width:250px; display:inline">
              <button type="button" style="float:right" class="btn btn-primary" id="btn-search">Search</button>
              <script type="text/javascript">
                $(document).ready(function(){ 
                  $('#btn-search').on('click', function() {
                    var type = $("#type").val();
                    var action = $("#form-search").attr('action') ;
                    if(action.lastIndexOf('index') == -1 ) action = action + '/index';
                    if(type) action = action + "/type:" + type;
                    alert(action);
                    $("#form-search").attr('action', action);
                    $("#form-search").submit();
                    });
                  });
                </script>
            </td>
          </tr>
          <tr style="height:100px">
             <td>
                <label>Registered</label>
                <input class="form-control" style="width:100px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
               <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
                <input class="form-control" style="width:100px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
            
             <label>Updated</label>
              <input class="form-control" style="width:100px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
               <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
                <input class="form-control" style="width:100px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              <input class="form-control" style="width:50px; display:inline">
              
            </td>
          </tr>
        </tbody>
     </table>
     </form>

    </div>

    <?php echo $this->Form->create('User', array('action'=>'delete_users', 'id'=>'form'))?>
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
                <th><input type="checkbox" id="chk-all"></th>
                <th>No</th>
                <th>Email ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>First Name Kana</th>
                <th>Last Name Kana</th>
                <th>Age</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($users as $user) { $i++;?>
              <tr>
              <td><input type="checkbox" id="chk[]" name="ids[]" value="<?php echo $user['User']['id']?>" class="checkbox"></td>
                <td><?php echo $i;?></td>
                <td><?php echo $user['User']['email'] ?></td>
                <td><?php echo $user['User']['first_name'] ?></td>
                <td><?php echo $user['User']['last_name'] ?></td>
                 <td><?php echo $user['User']['first_name_kana'] ?></td>
                <td><?php echo $user['User']['last_name_kana'] ?></td>
                <td><?php echo date('Y') - $user['User']['year_of_birth'] ?></td>
                <td><?php 
                  if($user['User']['status_id'] == 0) echo "Reject"; 
                   if($user['User']['status_id'] == 1) echo "Register"; 
                   else if($user['User']['status_id'] == 2) echo "Confirm Registered";
                    else if($user['User']['status_id'] == 3) echo "Completed";
                   ?>
                </td>
                <td>
                  <button type="button" class="btn btn-default" style="float:right" id="btn-view" onclick="location.href='<?php echo $this->webroot;?>admin/users/view/<?php echo $user['User']['id']?>'"> 
                    View
                  </button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table> 
          <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                 
                  <button type="button" class="btn btn-primary" style="float:right" id="btn-delete"> Delete</button>
                </div>
              </div>
          </div>
        </div>

      </div>
      </form>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){ 
        var agree = false;
        $("#chk-all").change(function(){
            $(".checkbox").prop('checked', $(this).prop("checked"));
          });
        

        $('#btn-delete').on('click', function() {
          if ($("#form").find('input[name="ids[]"]:checked').length > 0){
             $( "#dialog-confirm-delete" ).dialog("open");
          }
          else {
            $( "#dialog-delete-message" ).dialog('open');
          }
        });

        $( "#dialog-confirm-delete" ).dialog({
          autoOpen: false,
          resizable: true,
          modal: true,
          buttons: {
            "Delete": function() {
              $("#form").submit();
              $( this ).dialog( "close" );
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
  <div id="dialog-delete-message" title="Download complete">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Select least one user to delete.
  </p>
   <div id="dialog-confirm-export" title="Do you want to export CSV file?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Export all user to CSV file. Are you sure?</p>
  </div>
</div>
