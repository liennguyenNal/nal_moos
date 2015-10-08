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
            
            <label style="margin-left:20px;" for="title" ><?php echo __('admin.user.list_header.register_date'); ?></label> 
            <?php 
              $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
              echo $this->Form->select('from_year_register', $years, array('id'=>'from-year-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_year_register));
            ?>
           
            <?php 
              $months = array_combine(range(1, 12), range(1, 12));
              echo $this->Form->select('from_month_register', $months, array('id'=>'from-month-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_month_register));
            ?>
            <?php 
                $dates = array_combine(range(1, 31), range(1, 31));
                echo $this->Form->select('from_day_register', $dates, array('id'=>'from-day-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_day_register));
              ?>  
            <p style="width:50px; display:inline; padding:10px"> <b>~ </b> </p>
                <?php 
                  $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                  echo $this->Form->select('to_year_register', $years, array('id'=>'to-year-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$to_year_register));
                ?>
               
                <?php 
                  $months = array_combine(range(1, 12), range(1, 12));
                  echo $this->Form->select('to_month_register', $months, array('id'=>'to-month-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$to_month_register));
                ?>
                <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                    echo $this->Form->select('to_day_register', $dates, array('id'=>'to-day-register', 'data-placement' => 'right','empty'=>"-----",  'value'=>$to_day_register));
                  ?> 
            <div style="margin-top:20px;">
             <label style="margin-left:20px;" for="title" >申込人氏名</label>
             <input style="width:250px; display:inline; " type="text" id="keyword" class="form-control"  value="<?php echo $keyword; ?>">
             <label style="margin-left:20px;" for="title" >メールアドレス</label>
             <input style="width:150px; display:inline;" type="text" id="email" class="form-control"  value="<?php echo $email; ?>"></div>
            
          </div>
          <button style=" margin-left:50px; float:right" type="button" class="btn btn-primary" id="btn-search" onclick="search()"><?php echo __('admin.articles.search_button'); ?></button>
          <script type="text/javascript">
            function search(){

              var from_register ;
                    if($("#from-year-register").val() && $("#from-month-register").val() && $("#from-day-register").val()){
                      from_register = $("#from-year-register").val() + "-" + $("#from-month-register").val() + "-" + $("#from-day-register").val();
                    }

            var to_register ;
                    if($("#to-year-register").val() && $("#to-month-register").val()  && $("#to-day-register").val())
                      to_register= $("#to-year-register").val() + "-" + $("#to-month-register").val() + "-" + $("#to-day-register").val();
              
              var url = '<?php echo $this->webroot; ?>admin/members/index';
              if($('#keyword').val() != '') url = url + '/keyword:' + $('#keyword').val();
              if($('#email').val() != '') url = url + '/email:' + $('#email').val();
              if(from_register) url = url + '/date_from:' + from_register;
              if(to_register) url = url + '/date_to:' + to_register;


              window.location.href = url ;
            }
          </script>
        </form>


    </div>  
  </div>



<?php echo $this->Form->create('Member',array('id' =>'form','url' => array('controller' => 'members', 'action' => 'multi_delete'))); ?>
    <div class="row">
      <div class="col-lg-12">
      

        
        <?php //echo $this->element('flash');?>
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
            <?php  $i++; ?>
              <tr>
              <td><input class="check_box" type="checkbox" name="customer_id[]" value ="<?php echo $user['User']['id'];?>" hiddenField = "false"></td>
                <td><?php echo $i;?></td>
                <td><?php echo $user['User']['email']; ?></td>
                <td><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></td>
                <td><?php echo $user['User']['phone']; ?></td>
                <td><?php if ($user['User']['gender']=='male') echo '男性'; else echo '女性'; ?></td>
                <td><?php echo $user['User']['created']; ?></td>
                <td><?php 

                  if($user['User']['status_id'] == 2) echo "審査申し込み待ち"; 
                   if($user['User']['status_id'] == 3) echo "審査待ち"; 
                    if($user['User']['status_id'] == 4) echo "保証金入金待ち";
                     if($user['User']['status_id'] == 5) echo "保証金入金確認済み";
                   ?>
                </td>
                <td>
                  <button type="button" class="btn btn-default"  id="btn-view" onclick="location.href='<?php echo $this->webroot;?>admin/members/view/<?php echo $user['User']['id']?>'"> 
                    <?php echo __('admin.articles.view_button'); ?>
                  </button>
                </td>
              </tr>
              
            <?php } ?>
            </tbody>
          </table> 
          <div class="form-group">
                <div class="col-lg-12 col-lg-offset-0">
                 
                  <input style="float:right; margin-top:20px;" id="btn-delete" class="btn btn-primary" type="submit" value="削除">
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
