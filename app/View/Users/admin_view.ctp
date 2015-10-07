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
      <div class="page-header">
        <h1 id="tables">お客様</h1>
      </div>
      
      <div class="bs-component">
      	
      <?php echo $this->element('/admin/flash');?>
    	
       <?php echo $this->Form->create("User", array('action'=>'register', 'id'=>'form', 'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
         <div class="well bs-component">
       
         
         
            <fieldset>
              <legend>会員登録フォ一ム</legend>
              <table class="table table-striped table-hover ">
              <tr>
                <td>
                  <label for="inputEmail"><?php echo __('user.register.username') ;?></label>
                </td>
                <td>
                  <div class="form-group">
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>__('user.register.firstname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,"placeholder"=>'山田','div'=>false))?>
                   
                      <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>__('user.register.lastname'), 'label'=>"名", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', "placeholder"=>'雪','div'=>false))?>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>__('user.register.firstnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', "placeholder"=>'ヤマダ','div'=>false))?>              
                                       
                      <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>__('user.register.lastnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px',"placeholder"=>'ユキ','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
             <tr>
             <td> <label for="inputEmail"><?php echo __('user.register.gender'); ?></label></td>
              <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('genre', array('male'=>"男性",'Female'=> "女性"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
                  ?>  
                  </div>
                </div>
              </td>
              </tr>
              <tr>
                <td> <label for="inputEmail" ><?php echo __('user.register.birthday')?></label></td>
                <td>
                  <div class="form-group">
                   
                    <div class="col-lg-10">
                      
                     
                      <?php 
                      $years = array_combine(  range(1900, date("Y")), range(1900, date("Y")));
                      echo $this->Form->select('year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'year', 'onchange'=>'calculate_age()'));
                    ?>
                     <?php echo __('user.register.year')?>
                    
                    <?php 
                      $months = array_combine(range(1, 12), range(1, 12));
                      echo $this->Form->select('month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month'));
                    ?>
                    <?php echo __('user.register.month')?>
                    
                    <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                      echo $this->Form->select('day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day'));
                    ?>
                    <?php echo __('user.register.day')?>
                      &nbsp;&nbsp;&nbsp;<span id="age">0</span> <?php echo __('user.register.age')?>
                    <script type="text/javascript">

                    function calculate_age(){
                      var d = new Date();
                      var n = d.getFullYear();
                      $("#age").html(n - $("#year").val());
                    }
                    </script>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" ><?php echo __('user.register.married')?></label></td>
                <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                   
                    <?php 
                    //echo $this->Form->select('married_status_id', $married_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'empty'=>'-- Select One --'));
                  ?>
                   <?php 
                    echo $this->Form->radio('married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1));
                  ?>  
                  </div>
                </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" ><?php echo __('user.register.address')?></td>
                <td>
                  <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">〒</label>
                <div class="col-lg-10" >
                  <?php echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'101','div'=>false))?>
                  <?php echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'0001','div'=>false))?>
                 

                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.pref')?></label>
                <div class="col-lg-10">
                  <?php 
                  echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'青森県'));
                ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.city')?></label>
                <div class="col-lg-10">
                  <?php 
                    echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'form-control','div'=>false));
                ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.street')?></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.house')?></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false))?>
                </div>
              </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail"><?php echo __('user.register.email')?></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', "placeholder"=>'sample@gmail.com','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
               
              <tr>
                <td><label for="inputEmail">電話番号</label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>__('user.register.mobiphone'), 'class'=>'form-control', "placeholder"=>'','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
                   
                      <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>__('user.register.homephone'), 'class'=>'form-control', "placeholder"=>'','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))?>
                    </div>
                  </div>
                  </td>
                </tr>
            </table>
            </fieldset>
            </div>
              

             

            <div class="well bs-component">


              <!-- <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" /> -->
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.work')?></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserCompany.work_id', $works, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'work', 'empty'=>'-----'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">働続年数</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 年' , 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
                    <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 月', 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
                  </div>
                </div>

               
                    
                 
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">税込月収</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.salary_year', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>円
                  </div>
                </div>
                

               
              </fieldset>
          
            </div>
            <!-- <h4>ご希望エリア　※最大５エリアまで</h4> -->
            <section id="expect-area">
            <?php foreach ($user['ExpectArea'] as $item) {?>
            <div class="well bs-component" id='expect-area-content' >
              <fieldset>

                  <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">〒</label>
                  <div class="col-lg-10" >
                    <?php echo $this->Form->input('ExpectArea.1.post_num_1', array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'101','div'=>false, 'value'=>$item["post_num_1"]))?>
                    <?php echo $this->Form->input('ExpectArea.1.post_num_2', array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'0001','div'=>false, 'value'=>$item["post_num_2"]))?>
                    
                   
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">都道府県</label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->select('ExpectArea.1.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'pref_id', 'value'=>$item["pref_id"] , 'empty'=>'青森県'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">市区町村</label>
                  <div class="col-lg-10">
                     <?php echo $this->Form->input('ExpectArea.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false, 'value'=>$item["city"]))?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">地城</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input("ExpectArea.address", array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false, 'value'=>$item["address"]))?>
                  </div>
                </div>
              </fieldset>
              
            </div>
            <?php } ?>
            </section>
            <div >


        </form>
        <script type="text/javascript">
        	$( document ).ready(function() {
        		$('#form').find(':input:not(:button):not(:disabled)').prop('disabled',true);

        	});
        </script>
		       
		        <div class="form-group">
		            <div class="col-lg-10 ">
			            <button type="button" class="btn btn-danger" id="btn-delete" style="float:left"> 削除します</button>
			            <div class="col-lg-offset-2" style="padding-left:150px">
			            	 <?php if($user['User']['status_id'] == 1){?>
				            <button type="button" class="btn btn-warning" id="btn-reject"> 拒絶します</button>
			              	<button type="button" class="btn btn-primary" id="btn-approve">会員登碌を承認すます</button>
			              	<?php } ?>
			              	<button type="button" class="btn btn-default" id="btn-cancel" style="float:right">一覧へ戻る</button>
		              	</div>
		              	
		            </div>
		          </div>
		      </div>
		      <script type="text/javascript">
			      function approve(){
			      	if(confirm("Are you sure approve for this customer reigstration"))
			      		window.location.href='<?php echo $this->webroot;?>admin/users/approve_register/<?php echo $user['User']['id']?>';
			      }
			      function reject(){
			      	if(confirm("Are you sure reject for this customer reigstration"))
			      		window.location.href='<?php echo $this->webroot;?>admin/users/reject_register/<?php echo $user['User']['id']?>';
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
			             	window.location.href='<?php echo $this->webroot;?>admin/users/reject_register/<?php echo $user['User']['id']?>';
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
			              window.location.href='<?php echo $this->webroot;?>admin/users/approve_register/<?php echo $user['User']['id']?>';
			              $( this ).dialog( "close" );
			            },
			             'キャンセル': function() {
			              agree = false;
			              $( this ).dialog( "close" );
			            }
			          }
			        });

			       
			       
			      });
			    </script>
		      
	        
        
    </div>

  </div>
  <div id="dialog-confirm-delete" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>申込みを削除しますか？</p>
  </div>
  <div id="dialog-reconfirm-delete" title="<?php echo __('admin.user.delete_button')?>">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>申込みを削除すると2度と復元できません。</p>
  </div>
   <div id="dialog-confirm-approve" title="会員登録承認">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>会員登録を承認しますか？</p>
  </div>
  <div id="dialog-confirm-reject" title="却下">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>申込みを却下しますか？</p>
  </div>
  </div>

