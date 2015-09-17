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
      <div class="page-header">
        <h1 id="tables">Customer</h1>
      </div>
      <?php echo $this->element('flash');?>
      <div class="bs-component">
      	<ul class="nav nav-tabs">
            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
            <!-- <li><a href="#profile" data-toggle="tab">愚見数則</a></li> -->
            <li class="disabled"><a>Others</a></li>
            
    	</ul>

    	<div id="myTabContent" class="tab-content">
          	<div class="tab-pane fade active in" id="profile">
		       <?php echo $this->Form->create("User", array('action'=>'register', 'id'=>'form', 'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
        <div class="well bs-component">
       
         
         
            <fieldset>
              <legend>Account Information</legend>
              <table class="table table-striped table-hover ">
              <tr>
                <td>
                  <label for="inputEmail" class="col-lg-2 control-label">Name<span style="color:red">*</span></label>
                </td>
                <td>
                  <div class="form-group">
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"title", 'label'=>"First", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,"placeholder"=>'First Name','div'=>false))?>
                   
                      <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"title", 'label'=>"Last", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', "placeholder"=>'Last Name','div'=>false))?>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>"First Kana", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', "placeholder"=>'First Name Kana','div'=>false))?>              
                                       
                      <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>"Last Kana", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px',"placeholder"=>'Last Name Kana','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
             <tr>
             <td> <label for="inputEmail" >Genre<span style="color:red">*</span></label></td>
              <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                    <?php 
                		echo $this->Form->radio('genre', array('male'=>"Male",'Female'=> "Female"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false));
              		?>	
                  </div>
                </div>
              </td>
              </tr>
              <tr>
                <td> <label for="inputEmail" >Birthday<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                   
                    <div class="col-lg-10">
                    	
                      Year
                      <?php 
                      $years = array_combine(range(date("Y") , 1930), range(date("Y"), 1930));
                  		echo $this->Form->select('year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'year'));
                		?>
    	              Month
    	              <?php 
    	              	$months = array_combine(range(1, 12), range(1, 12));
                  		echo $this->Form->select('month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month'));
                		?>
    	              Day
    	              <?php 
    	              $dates = array_combine(range(1, 31), range(1, 31));
                  		echo $this->Form->select('day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day'));
                		?>
                   	Age: <span><?php echo date("Y") - $user['User']['year_of_birth'];?></span>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" >Married Status<span style="color:red">*</span></label></td>
                <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                   
                    <?php 
                		
              		?>
                   <?php 
                    echo $this->Form->radio('married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false));
                  ?>  
                  </div>
                </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" >Address<span style="color:red">*</span></td>
                <td>
                  <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Post Number<span style="color:red">*<span></label>
                <div class="col-lg-10" >
                  <?php echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'Post Number 1','div'=>false))?>
                  <?php echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'Post Number 2','div'=>false))?>
                 
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">City<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php 
                  echo $this->Form->select('UserAddress.city_id', $cities, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'city', 'empty'=>'-- Select City --'));
                ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Ward/Town<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php 
                  echo $this->Form->select('UserAddress.ward_id', $wards, array('class'=>'form-control', 'style'=>'width:250px;','div'=>false, 'label'=>false, 'id'=>'city', 'empty'=>'-- Select Ward/Town --'));
                ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">House Num<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'2 - 5 - 1','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">House Name<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false))?>
                </div>
              </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail">Email<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Email','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
               
              <tr>
                <td><label for="inputEmail" class="col-lg-2 control-label">Phone<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"title", 'label'=>'Hand Phone', 'class'=>'form-control', "placeholder"=>'Hand Phone','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))?>
                   
                      <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"title", 'label'=>'Home Phone', 'class'=>'form-control', "placeholder"=>'Home Phone','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))?>
                    </div>
                  </div>
                  </td>
                </tr>
            </table>
            </fieldset>
            </div>
              

              

            <div class="well bs-component">
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Working Status<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserCompany.working_status_id', $working_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'-- Select One --'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Time Worked<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>' Year&nbsp;' , 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
                    <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>' Month&nbsp;', 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
                  </div>
                </div>

               
                    
                 
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Tax of Month<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.tax_of_month', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                  </div>
                </div>
                

               
              </fieldset>
          
            </div>
            <h4>Expect area</h4>
            <section id="expect-area">
            <?php foreach ($user['ExpectArea'] as $item) {?>
            <div class="well bs-component" id='expect-area-content' >
              <fieldset>

                  <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Post Number<span style="color:red">*</span></label>
                  <div class="col-lg-10" >
                    <?php echo $this->Form->input('ExpectArea.1.post_num_1', array('type'=>'text', 'id'=>"title",'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'Post Number 1','div'=>false, 'value'=>$item['post_num_1']))?>
                    <?php echo $this->Form->input('ExpectArea.1.post_num_2', array('type'=>'text', 'id'=>"title",  'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'Post Number 2','div'=>false, 'value'=>$item['post_num_2']))?>
                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">City<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->select('ExpectArea.1.city_id', $cities, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'city', 'empty'=>'-- Select City --', 'value'=>$item['city_id']));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Ward/Town<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->select('ExpectArea.1.ward_id', $wards, array('class'=>'form-control', 'style'=>'width:250px;','div'=>false, 'label'=>false, 'id'=>'city','empty'=>'-- Select Ward/Town --','value'=>$item['ward_id']));
                  ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Area<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('ExpectArea.1.area', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false, 'value'=>$item['area']))?>
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
			            <button type="button" class="btn btn-danger" id="btn-delete" style="float:left"> Delete User</button>
			            <div class="col-lg-offset-2" style="padding-left:150px">
			            	 <?php if($user['User']['status_id'] == 1){?>
				            <button type="button" class="btn btn-warning" id="btn-reject"> Reject Register</button>
			              	<button type="button" class="btn btn-primary" id="btn-approve">Approve Register</button>
			              	<?php } ?>
			              	<button type="button" class="btn btn-default" id="btn-cancel" style="float:right">Cancel</button>
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
			             	window.location.href='<?php echo $this->webroot;?>admin/users/reject_register/<?php echo $user['User']['id']?>';
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
			              window.location.href='<?php echo $this->webroot;?>admin/users/approve_register/<?php echo $user['User']['id']?>';
			              $( this ).dialog( "close" );
			            },
			            Cancel: function() {
			              agree = false;
			              $( this ).dialog( "close" );
			            }
			          }
			        });

			       
			       
			      });
			    </script>
		      
	        </div>
        </div>
        
    </div>

  </div>
  <div id="dialog-confirm-delete" title="Delete?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This user will be deleted. Are you sure?</p>
  </div>
  
   <div id="dialog-confirm-approve" title="Approve?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This user will be approved. Are you sure?</p>
  </div>
  <div id="dialog-confirm-reject" title="Reject?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Reject this user. Are you sure?</p>
  </div>
  </div>

