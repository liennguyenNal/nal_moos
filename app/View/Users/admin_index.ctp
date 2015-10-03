<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php $paginator = $this->Paginator; ?>
<div class="page-header">

	<div class="col-lg-4">
		<div class="bs-component">
			 
			    <h4 class="active"><?php echo __('admin.register_users')?></h4>
			  
		</div>
	</div>
   <div class="form-group" >
      <div class="col-lg-12">
        <button type="button" class="btn btn-primary" id="btn-export" > <?php echo __('admin.user.export_csv')?></button>
     </div>
   </div>
    <div class="col-lg-12" style="padding-top:20px">
      
      
          
    <?php echo $this->Form->create('User', array('action'=>'index', 'id'=>'form-search'))?>
     <table style="padding-top:20px">
        <tbody>
          <tr>
            <td margin-left:20px>
              <label><?php echo __('admin.user.status')?> </label>
            
               
                 <?php echo  $this->Form->select('User.list_headercity.status_id', $statuses, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'status', 'required'=>false, 'value'=>$status));?>
           
              <label style="padding-left:20px"><?php echo __('admin.user.list_header.pref')?>  </label>
              <?php echo  $this->Form->select('User.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'pref', 'required'=>false, 'value'=>$pref));?>
              
              <label style="padding-left:20px"><?php echo __('admin.user.list_header.city')?> </label>
              <input class="form-control" style="width:250px; display:inline" id="city" value="<?php echo $city;?>">
              <button type="button" style="float:right" class="btn btn-primary" id="btn-search">Search</button>
              <script type="text/javascript">
                $(document).ready(function(){ 
                  $('#btn-search').on('click', function() {
                    var status = $("#status").val();
                    var pref = $("#pref").val();
                    var city = $("#city").val();

                    var from_register ;
                    if($("#from-year-register").val() && $("#from-month-register").val() && $("#from-day-register").val()){
                      from_register = $("#from-year-register").val() + "-" + $("#from-month-register").val() + "-" + $("#from-day-register").val();
                    }
                    var to_register ;
                    if($("#to-year-register").val() && $("#to-month-register").val()  && $("#to-day-register").val())
                      to_register= $("#to-year-register").val() + "-" + $("#to-month-register").val() + "-" + $("#to-day-register").val();
                    var from_approve ;
                    if($("#from-year-approve").val() &&  $("#from-month-approve").val() && $("#from-day-approve").val())
                      from_approve= $("#from-year-approve").val() + "-" + $("#from-month-approve").val() + "-" + $("#from-day-approve").val();
                    
                    var to_approve ;
                    if($("#to-year-approve").val() && $("#to-month-approve").val() && $("#to-day-approve").val())
                        to_approve= $("#to-year-approve").val() + "-" + $("#to-month-approve").val() + "-" + $("#to-day-approve").val();

                    var action = $("#form-search").attr('action') ;
                    if(action.lastIndexOf('index') == -1 ) action = action + '/index';
                    if(status) action = action + "/status:" + status;
                    if(pref) action = action + "/pref:" + pref;
                    if(city) action = action + "/city:" + city;
                    if(from_register) action = action + "/from_register:" + from_register;
                    if(to_register) action = action + "/to_register:" + to_register;
                    if(from_approve) action = action + "/from_approve:" + from_approve;
                    if(to_approve) action = action + "/to_approve:" + to_approve;

                    $("#form-search").attr('action', action);
                    $("#form-search").submit();
                    });
                  });
                </script>
            </td>
          </tr>
          <tr style="height:100px">
             <td>
                <label><?php echo __('admin.user.list_header.register_date')?> </label>
              <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('from_year_register', $years, array('id'=>'from-year-register', 'data-placement' => 'right', 'empty'=>"-----"));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('from_month_register', $months, array('id'=>'from-month-register', 'data-placement' => 'right', 'empty'=>"-----"));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('from_day_register', $dates, array('id'=>'from-day-register', 'data-placement' => 'right', 'empty'=>"-----"));
                  ?>    
               <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
                <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('from_day_register', $years, array('id'=>'to-year-register', 'data-placement' => 'right', 'empty'=>"-----"));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('from_day_register', $months, array('id'=>'from-day-register', 'data-placement' => 'right', 'empty'=>"-----"));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('to_day_register', $dates, array('id'=>'to-day-register', 'data-placement' => 'right','empty'=>"-----"));
                  ?>    
            
             <label><?php echo __('admin.user.list_header.approve_date')?> </label>
             <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('from_year_approve', $years, array('id'=>'from-year-approve', 'data-placement' => 'right', 'empty'=>"-----"));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('from_month_approve', $months, array('id'=>'from-month-approve', 'data-placement' => 'right', 'empty'=>"-----"));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('from_month_approve', $dates, array('id'=>'from-month-approve', 'data-placement' => 'right', 'empty'=>"-----"));
                  ?>    
              
               <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
              <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('to_year_approve', $years, array('id'=>'to-year-approve', 'data-placement' => 'right', 'empty'=>"-----"));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('to_month_aprove', $months, array('id'=>'to-month-approve', 'data-placement' => 'right', 'empty'=>"-----"));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('to_day_approve', $dates, array('id'=>'to-day-approve', 'data-placement' => 'right', 'empty'=>"-----"));
                  ?>    
              
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
                <th><?php echo __('admin.user.list_header.no'); ?></th>
                <th><?php echo __('admin.user.list_header.id'); ?></th>
                <th><?php echo __('admin.user.list_header.name'); ?></th>
                <th><?php echo __('admin.user.list_header.age'); ?></th>
                <th><?php echo __('admin.user.list_header.work'); ?></th>
                <th><?php echo __('admin.user.list_header.income_month'); ?></th>
                <th><?php echo __('admin.user.list_header.pref'); ?></th>
                <th><?php echo __('admin.user.list_header.city'); ?></th>
                <th><?php echo __('admin.user.list_header.status'); ?></th>
                <th><?php echo __('admin.user.list_header.register_date'); ?></th>
                <th><?php echo __('admin.user.list_header.approve_date'); ?></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($users as $user) { $i++;?>
              <tr>
              <td><input type="checkbox" id="chk[]" name="ids[]" value="<?php echo $user['User']['id']?>" class="checkbox"></td>
                <td><?php echo $i;?></td>
                <td><?php echo $user['User']['email'] ?></td>
                <td><?php echo $user['User']['first_name'].$user['User']['last_name'] ?></td>
                <td><?php echo date("Y") - $user['User']['year_of_birth'] ;?></td>
                <td><?php echo $user['UserCompany']['Work']['name'] ?></td>
                <td><?php echo $user['UserCompany']['salary_month'] ?></td>
                <td><?php echo  $user['UserAddress']['Pref']['name'] ?></td>
                <td><?php echo  $user['UserAddress']['city'] ?></td>
                <td><?php echo $user['Status']['name']; ?>
                <td><?php echo $user['User']['created']; ?>
                <td><?php echo $user['User']['approved_date']; ?>
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
              
                 $( "#dialog-confirm-delete" ).dialog("open");
             
            });
        $( "#dialog-confirm-delete" ).dialog({
            autoOpen: false,
            resizable: true,
            modal: true,
            buttons: {
              "<?php echo __('admin.user.delete_button')?>": function() {
               $( "#dialog-reconfirm-delete" ).dialog("open");
                $( this ).dialog( "close" );
              },
              <?php echo __('admin.user.cancel_button')?>: function() {
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
              "<?php echo __('admin.user.delete_button')?>": function() {
                $("#form").submit();
                $( this ).dialog( "close" );
              },
              <?php echo __('admin.user.cancel_button')?>: function() {
                agree = false;
                $( this ).dialog( "close" );
              }
            }
          });

        // $( "#dialog-confirm-delete" ).dialog({
        //   autoOpen: false,
        //   resizable: true,
        //   modal: true,
        //   buttons: {
        //     "Delete": function() {
        //       $("#form").submit();
        //       $( this ).dialog( "close" );
        //     },
        //     Cancel: function() {
        //       agree = false;
        //       $( this ).dialog( "close" );
        //     }
        //   }
        // });
        // $( "#dialog-delete-message" ).dialog({
        //   autoOpen: false,
        //     modal: true,
        //     buttons: {
        //       Ok: function() {
        //         $( this ).dialog( "close" );
        //       }
        //     }
        //   });
        
        $( "#dialog-confirm-export" ).dialog({
          autoOpen: false,
          resizable: true,
          modal: true,
          buttons: {
            "<?php echo __('admin.user.export_csv')?>": function() {
              
              $( this ).dialog( "close" );
            },
            <?php echo __('admin.user.cancel_button')?>: function() {
              agree = false;
              $( this ).dialog( "close" );
            }
          }
        });

        $('#btn-export').on('click', function() {
          
             $( "#dialog-confirm-export" ).dialog("open");
          
        });
       
      });
    </script>
    <?php echo $this->element('admin/paginate');?>
  </div>

  </div>
  <div id="dialog-confirm-delete" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This user will be deleted. Are you sure?</p>
  </div>
  <div id="dialog-reconfirm-delete" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>If you delete user, all related data also deleted . Are you sure?</p>
  </div>
  
   <div id="dialog-confirm-export" title="Do you want to export CSV file?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Export all user to CSV file. Are you sure?</p>
  </div>
</div>
