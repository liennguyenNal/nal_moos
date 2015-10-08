<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php $paginator = $this->Paginator; ?>
<div class="page-header">

	<div class="col-lg-4">
		<div class="bs-component">
			 
			    <h4 class="active">申込み一覧</h4>
			  
		</div>
	</div>
   <div class="form-group" >
      <div class="col-lg-12">
      <?php
          //echo __('admin.user.export_csv')
         echo $this->Html->link("CSVデータダウンロード)",array('controller'=>'users','action'=>'download'), array('target'=>'_blank','class'=>"btn btn-primary", 'id'=>"btn-export"));
        ?>
        
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
              <button type="button" style="float:right" class="btn btn-primary" id="btn-search"><?php echo __("admin.user.search");?></button>
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
              <?php if($from_register){
                  $arr_from = explode("-", $from_register);
                  $from_year_register = $arr_from[0];
                  $from_month_register = $arr_from[1];
                  $from_day_register = $arr_from[2];
                }
                if($to_register){
                  $arr_to = explode("-", $to_register);
                  $to_year_register = $arr_to[0];
                  $to_month_register = $arr_to[1];
                  $to_day_register = $arr_to[2];
                }
                if($from_approve){
                  $arr_from_approve = explode("-", $from_approve);
                  $from_year_approve = $arr_from_approve[0];
                  $from_month_approve = $arr_from_approve[1];
                  $from_day_approve = $arr_from_approve[2];
                }
                if($to_approve){
                  $arr_to_approve = explode("-", $to_approve);
                  $to_year_approve = $arr_to_approve[0];
                  $to_month_approve = $arr_to_approve[1];
                  $to_day_approve = $arr_to_approve[2];
                }
                ?>
              <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('from_year_register', $years, array('id'=>'from-year-register', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$from_year_register));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('from_month_register', $months, array('id'=>'from-month-register', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$from_month_register));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('from_day_register', $dates, array('id'=>'from-day-register', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$from_day_register));
                  ?>    
               <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
                <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('to_year_register', $years, array('id'=>'to-year-register', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$to_year_register));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('to_month_register', $months, array('id'=>'to-month-register', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$to_month_register));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('to_day_register', $dates, array('id'=>'to-day-register', 'data-placement' => 'right','empty'=>"-----", 'value'=>$to_day_register));
                  ?>    
            
             <label><?php echo __('admin.user.list_header.approve_date')?> </label>
             <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('from_year_approve', $years, array('id'=>'from-year-approve', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$from_year_approve));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('from_month_approve', $months, array('id'=>'from-month-approve', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$from_month_approve));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('from_month_approve', $dates, array('id'=>'from-day-approve', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$from_day_approve));
                  ?>    
              
               <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
              <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('to_year_approve', $years, array('id'=>'to-year-approve', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$to_year_approve));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('to_month_aprove', $months, array('id'=>'to-month-approve', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$to_month_approve));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('to_day_approve', $dates, array('id'=>'to-day-approve', 'data-placement' => 'right', 'empty'=>"-----", 'value'=>$to_day_approve));
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
      

        
        <?php echo $this->element('flash');?>
        <div class="bs-component">
          
          <table class="table table-striped table-hover " id="tbl_users">
            <thead>
              <tr>
                <th width="3%"><input type="checkbox" id="chk-all"></th>
                <th width="6%"><?php echo __('admin.user.list_header.no'); ?></th>
                <th width="8%"><?php echo __('admin.user.list_header.id'); ?></th>
                <th width="8%"><?php echo __('admin.user.list_header.name'); ?></th>
                <th width="5%"><?php echo __('admin.user.list_header.age'); ?></th>
                <th width="8%"><?php echo __('admin.user.list_header.work'); ?></th>
                <th width="8%"><?php echo __('admin.user.list_header.income_month'); ?></th>
                <th width="8%"><?php echo __('admin.user.list_header.pref'); ?></th>
                <th width="10%"><?php echo __('admin.user.list_header.city'); ?></th>
                <th width="15%"><?php echo __('admin.user.list_header.status'); ?></th>
                <th width="10%"><?php echo __('admin.user.list_header.register_date'); ?></th>
                <th width="10%"><?php echo __('admin.user.list_header.approve_date'); ?></th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($users as $user) { $i++;?>
              <tr>
              <td width="3%"><input type="checkbox" id="chk[]" name="ids[]" value="<?php echo $user['User']['id']?>" class="checkbox"></td>
              <td width="6%"><?php echo $user['User']['id'];?></td>
              <td width="8%"><?php echo $user['User']['email'] ?></td>
                <td width="8%"><?php echo $user['User']['first_name'].$user['User']['last_name'] ?></td>
                <td width="5%"><?php echo date("Y") - $user['User']['year_of_birth'] ;?></td>
                <td width="8%"><?php echo $user['UserCompany']['Work']['name'] ?></td>
                <td width="8%"><?php echo $user['UserCompany']['salary_month'] ?></td>
                <td width="8%"><?php echo  $user['UserAddress']['Pref']['name'] ?></td>
                <td width="10%"><?php echo  $user['UserAddress']['city'] ?></td>
                <td width="15%"><?php echo $user['Status']['name']; ?>
                <td width="10%"><?php echo substr($user['User']['created'],0, 10); ?>
                <td width="10%"><?php echo substr($user['User']['approved_date'], 0,10); ?>
                </td>
                <td width="5%">
                  <button type="button" class="btn btn-default" style="float:right" id="btn-view" onclick="location.href='<?php echo $this->webroot;?>admin/users/view/<?php echo $user['User']['id']?>'"> 
                    <?php echo __("admin.articles.view_button")?>
                  </button>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table> 
          <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                 
                  <button type="button" class="btn btn-primary" style="float:right" id="btn-delete"> <?php echo __("admin.user.delete_button")?></button>
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
             if ($("#tbl_users").find('input[name="ids[]"]:checked').length > 0){
             $( "#dialog-confirm-delete" ).dialog("open");
           }
           else {
             $( "#dialog-no-choose" ).dialog("open");
           }
         
        });

        $( "#dialog-no-choose" ).dialog({
            autoOpen: false,
            resizable: true,
            modal: true,
            buttons: {
              
              OK: function() {
                $( this ).dialog( "close" );
              }
            }
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

                    var action = "<?php echo $this->webroot;?>admin/users/download" ;
                    if(action.lastIndexOf('index') == -1 ) action = action + '/index';
                    if(status) action = action + "/status:" + status;
                    if(pref) action = action + "/pref:" + pref;
                    if(city) action = action + "/city:" + city;
                    if(from_register) action = action + "/from_register:" + from_register;
                    if(to_register) action = action + "/to_register:" + to_register;
                    if(from_approve) action = action + "/from_approve:" + from_approve;
                    if(to_approve) action = action + "/to_approve:" + to_approve;
              window.location.href=action;

            },
            <?php echo __('admin.user.cancel_button')?>: function() {
              agree = false;
              $( this ).dialog( "close" );
            }
          }
        });

        $('#btn-export').on('click', function(event) {
              event.preventDefault();
          
             $( "#dialog-confirm-export" ).dialog("open");
          
        });
       
      });
    </script>
    <?php echo $this->element('admin/paginate');?>
  </div>

  </div>
  <div id="dialog-no-choose" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>削除項目を選んでください！</p>
  </div>
  <div id="dialog-confirm-delete" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>申込みを削除しますか？</p>
  </div>
  <div id="dialog-reconfirm-delete" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>申込みを削除すると2度と復元できません。</p>
  </div>
  
   <div id="dialog-confirm-export" title="CSVデータダウンロード">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>CSVファイルをダウンロードしますか。</p>
  </div>
</div>
