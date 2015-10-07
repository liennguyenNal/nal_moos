<style type="text/css">
  .error-message {
    color: red;
    padding-left: 10px;
  }
</style>
<div class="page-header">
    <?php echo $this->element('flash');?>

    <div class="row">
      	<div class="col-lg-12">
        	<?php echo $this->Form->create("User", array('action'=>'edit','id'=>'UserGuarantorEdit' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        	'format' => array('before', 'label', 'between', 'input', 'after' ) ) ) ) ?>
	        <div class="well bs-component">
	       
	         <!--  <form class="form-horizontal"> -->
	           
	            <fieldset>
	              <legend>会員登録フォ一ム</legend>
	              <table class="table table-striped table-hover ">
	              <tr>
	                <td>
	                  <label for="inputEmail"><?php echo __('user.register.username'); ?></label>
	                </td>
	                <td>
	                  <div class="form-group">
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('UserGuarantor.first_name', array('type'=>'text', 'id'=>"g_first_name", 'label'=>__('user.register.firstname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,'div'=>false, 'required'=>false))?>
	                   
	                      <?php echo $this->Form->input('UserGuarantor.last_name', array('type'=>'text', 'id'=>"g_last_name", 'label'=>__('user.register.lastname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', 'div'=>false , 'required'=>false))?>
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('UserGuarantor.first_name_kana', array('type'=>'text', 'id'=>"g_first_name_kana", 'label'=>__('user.register.firstnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false, 'required'=>false))?>              
	                                       
	                      <?php echo $this->Form->input('UserGuarantor.last_name_kana', array('type'=>'text', 'id'=>"g_last_name_kana", 'label'=>__('user.register.lastnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px','div'=>false, 'required'=>false))?>
	                    </div>
	                  </div>
	                </td>
	                <script type="text/javascript">
	                	$(this).autoKana('#g_first_name', '#g_first_name_kana', {katakana:false, toggle:false});
                		$(this).autoKana('#g_last_name', '#g_last_name_kana', {katakana:false, toggle:false});
	                </script>
	              </tr>
	             <tr>
		             <td> <label for="inputEmail"><?php echo __('user.register.gender'); ?></label></td>
		              <td>
		                <div class="form-group">
		                
		                  <div class="col-lg-10">
		                    <?php 
		                		echo $this->Form->radio('UserGuarantor.gender', array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required'=>false));
		              		?>	
		                  </div>
		                </div>
		              </td>
	              </tr>
	              <tr>
	                <td> <label for="inputEmail" ><?php echo __('user.register.birthday'); ?></label></td>
	                <td>
	                  <div class="form-group">
	                   
	                    <div class="col-lg-10">
	                    	
	                      
	                      <?php 
	                      $years = array_combine(  range(1900, date("Y")), range(1900, date("Y")));
	                  		echo $this->Form->select('UserGuarantor.year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'g1−year',  'required'=>false));
	                		?>
	                		<?php echo __('user.register.year'); ?>
	    	              
	    	              <?php 
	    	              	$months = array_combine(range(1, 12), range(1, 12));
	                  		echo $this->Form->select('UserGuarantor.month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month', 'required'=>false));
	                		?>
	                		<?php echo __('user.register.month'); ?>
	    	              
	    	              <?php 
	    	              $dates = array_combine(range(1, 31), range(1, 31));
	                  		echo $this->Form->select('UserGuarantor.day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day', 'required'=>false));
	                		?>
	                		<?php echo __('user.register.day'); ?>
	                     	&nbsp;&nbsp;<span id="g-age-1">0</span>&nbsp; <?php echo __('user.register.age'); ?>
	                    
	                    	 <script type="text/javascript">
		                    var d = new Date();
		                    var n = d.getFullYear();
		                    $("#g-age-1").html(n - $("#g1−year").val());
		                   
		                    </script>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	              <tr>
	                <td><label for="inputEmail" ><?php echo __('user.my_page.basic_info.family'); ?></label></td>
	                <td>
	                <div class="form-group">
	                
	                  <div class="col-lg-10">
	                   <?php 
	                    echo $this->Form->radio('UserGuarantor.live_with_family', array("1"=>__('user.my_page.basic_info.have_family'),"2"=>__('user.my_page.basic_info.alone')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'required'=>false));
	                  ?>  
	                  </div>
	                </div>
	                </td>
	              </tr>
	              <tr>
	                <td><label for="inputEmail" ><?php echo __('user.register.married'); ?></label></td>
	                <td>
	                <div class="form-group">
	                
	                  <div class="col-lg-10">
	                   <?php 
	                    echo $this->Form->radio('UserGuarantor.married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'required'=>false));
	                  ?>  
	                  </div>
	                </div>
	                </td>
	              </tr>
	              <tr>
	                <td><label for="inputEmail"><?php echo __('user.my_page.basic_info.num_children'); ?></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('UserGuarantor.num_child', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false, 'required'=>false))?>
	                   
	                      
	                    </div>
	                  </div>
	                  </td>
	               </tr>
	               <tr>
	                <td><label for="inputEmail"><?php echo __('user.my_page.guarantor.relationship'); ?></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('UserGuarantor.relate', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                   
	                      
	                    </div>
	                  </div>
	                  </td>
	               </tr>
	               </table>
	            </fieldset>
	        </div>
	        <div class="well bs-component">
	           
	            <fieldset>
	              <legend><?php echo __('user.register.address'); ?></legend>
	              <table class="table table-striped table-hover ">
	              <tr>
	                <td><label for="inputEmail" ><?php echo __('user.register.address'); ?></td>
	                <td>
	                  <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.post'); ?></label>
		                <div class="col-lg-10" >
		                  <?php echo $this->Form->input('UserGuarantor.post_num_1', array('type'=>'text', 'id'=>"g_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,'div'=>false, 'required'=>false))?>
		                  <?php echo $this->Form->input('UserGuarantor.post_num_2', array('type'=>'text', 'id'=>"g_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required'=>false))?>
		                 

		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.pref'); ?></label>
		                <div class="col-lg-10">
		                  <?php 
		                  echo $this->Form->select('UserGuarantor.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'g_pref_id', 'empty'=>'--------', 'required'=>false));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.city'); ?></label>
		                <div class="col-lg-10">
		                  <?php 
		                    echo $this->Form->input('UserGuarantor.city', array('type'=>'text', 'id'=>"g_city", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.street'); ?></label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('UserGuarantor.address', array('type'=>'text', 'id'=>"g_address", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.house'); ?></label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('UserGuarantor.house_name', array('type'=>'text', 'id'=>"g_house_name", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
		                </div>
		              </div>
	                </td>
	              </tr>
	              <tr>
	                <td><label for="inputEmail"><?php echo __('user.my_page.basic_info.residence'); ?></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      	<?php echo $this->Form->select('UserGuarantor.residence_id', $residences, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'residence_id', 'required'=>false)); ?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	               <tr>
	                <td><label for="inputEmail"><?php echo __('user.my_page.basic_info.year_residence'); ?></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      <?php echo $this->Form->input('UserGuarantor.year_residence', array('type'=>'text', 'id'=>"year_residence",'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	             
	               
	              </table>
	            </fieldset>
	       	</div>
	        <div class="well bs-component">
	           
	            <fieldset>
	              <legend>連帯保証人連絡先情報</legend>
	              <table class="table table-striped table-hover ">
		              <!-- <tr>
		                <td><label for="inputEmail">メールアドレス<span style="color:red">*</span></label></td>
		                <td>
		                  <div class="form-group">
		                    
		                    <div class="col-lg-10">                 
		                      <?php echo $this->Form->input('UserGuarantor.email', array('type'=>'text', 'id'=>"email",'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
		                    </div>
		                  </div>
		                </td>
		              </tr> -->
		               
		              <tr>
		                <td><label for="inputEmail"><?php echo __('user.contact.company-phone'); ?></label></td>
		                <td>
		                  <div class="form-group">
		                    
		                    <div class="col-lg-10">
		                      <?php echo $this->Form->input('UserGuarantor.phone', array('type'=>'text', 'id'=>"phone", 'label'=>__('user.register.mobiphone'), 'class'=>'form-control', 'div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
		                   
		                      <?php echo $this->Form->input('UserGuarantor.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>__('user.register.homephone'), 'class'=>'form-control','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
		                    </div>
		                  </div>
		                  </td>
		                </tr>
		                <tr>
				             <td> <label for="inputEmail"><?php echo __('user.my_page.basic_info.contact_type'); ?> </label></td>
				              <td>
				                <div class="form-group">
				                
				                  <div class="col-lg-10">
				                    <?php 
				                		echo $this->Form->radio('UserGuarantor.contact_type_id', array('1'=>__('user.register.mobiphone'),'2'=>__('user.my_page.basic_info.home_phone'),'3'=>__('user.my_page.basic_info.work_phone')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
				              		?>	
				                  </div>
				                </div>
				              </td>
			             </tr>
	            	</table>
	          	</fieldset>
	        </div>
	              

	             

	        <div class="well bs-component">


	             <legend>連帯保証人連絡先情報</legend>
	              <fieldset>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.work'); ?></label>
	                  <div class="col-lg-10">
	                   
	                    <?php 
	                    echo $this->Form->select('UserGuarantor.work_id', $works, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------'));
	                  ?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.address'); ?></label>
	                  <div class="col-lg-10">
	                  <?php echo __('user.my_page.basic_info.company_name'); ?>
	                    <?php echo $this->Form->input('UserGuarantor.company', array('type'=>'text', 'id'=>"g-company", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false))?>
	                    <?php echo __('user.my_page.basic_info.company_name_kana'); ?>
	                    <?php echo $this->Form->input('UserGuarantor.company_kana', array('type'=>'text', 'id'=>"g-company-kana", 'label'=>false, 'class'=>'form-control', 'style'=>'display:inline', 'div'=>false))?>
	                  </div>
	                </div>

	               
	                    
	            <table class="table table-striped table-hover ">
	              <tr>
	                <td><label for="inputEmail" ><?php echo __('user.register.address'); ?></td>
	                <td>
	                  <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.post'); ?></label>
		                <div class="col-lg-10" >
		                  <?php echo $this->Form->input('UserGuarantor.company_post_num_1', array('type'=>'text', 'id'=>"g_company_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , 'div'=>false))?>
		                  <?php echo $this->Form->input('UserGuarantor.company_post_num_2', array('type'=>'text', 'id'=>"g_company_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,'div'=>false))?>
		                  

		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.pref'); ?></label>
		                <div class="col-lg-10">
		                  <?php 
		                  echo $this->Form->select('UserGuarantor.company_pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'g_company_pref_id', 'empty'=>'--------'));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.city'); ?></label>
		                <div class="col-lg-10">
		                  <?php 
		                    echo $this->Form->input('UserGuarantor.company_city', array('type'=>'text', 'id'=>"g_company_city", 'label'=>false, 'class'=>'form-control', 'div'=>false));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.street'); ?></label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('UserGuarantor.company_address', array('type'=>'text', 'id'=>"g_company_address", 'label'=>false, 'class'=>'form-control','div'=>false))?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.house'); ?></label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('UserGuarantor.company_house_name', array('type'=>'text', 'id'=>"g_company_house_name", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
		                </div>
		              </div>
	                </td>
	              </tr>
	              </table>

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.contact.company-phone'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.fax'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.career'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->select('UserGuarantor.career_id', $careers, array('class'=>'form-control','div'=>false, 'label'=>false, 'id'=>'carrer_id', 'empty'=>'--------', 'required'=>false));?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.description'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.department'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>

	               <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.position'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.experience'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>__('user.register.year'), 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required'=>false))?>
	                    <?php echo $this->Form->input('UserGuarantor.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>__('user.register.month'), 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	               
	               <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.tax'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.income_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>円
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.salary_year'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.income_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>円
	                  </div>
	                </div>
	                <div class="form-group">
	                	 <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.salary_type'); ?></label>
	                  <div class="col-lg-10">
	                    <?php 
	                		echo $this->Form->radio('UserGuarantor.salary_type', array('1'=>__('user.my_page.basic_info.salary_fix'),'2'=>__('user.my_page.basic_info.salary_bonus'), '3'=>__('user.my_page.basic_info.salary_product'), "4"=>__('global.other')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'onchange'=>'g_change_type($(this))'));
	                		echo $this->Form->input('UserGuarantor.salary_type_other', array('type'=>'text', 'id'=>"g_salary_type_other", 'label'=>false, 'class'=>'form-control','div'=>false, 'disabled'=>true, 'required'=>false))
	              		?>	
	                  </div>
	                  	<script type="text/javascript">
	                    function g_change_type(obj){
	                      
	                        if(obj.val() == '4')
	                        $('#g_salary_type_other').prop('disabled',false);
	                        else {
	                          $('#g_salary_type_other').prop('disabled',true);
	                        }
	                    }
	                  </script>
	                </div>


	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.salary_receive'); ?></label>
	                  <div class="col-lg-10">
	                    <?php 
		                		echo $this->Form->radio('UserGuarantor.salary_receive_id', array('1'=>__('user.my_page.basic_info.salary_day'),'2'=>__('user.my_page.basic_info.salary_week'), '3'=>__('user.my_page.basic_info.salary_month')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
		                		echo $this->Form->input('UserGuarantor.salary_date', array('type'=>'text', 'id'=>"salary_date", 'label'=>__('user.my_page.basic_info.salary_date'), 'class'=>'form-control','div'=>false, 'required'=>false))
		              		?>	
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.insurances'); ?></label>
	                  <div class="col-lg-10">
	                   
	                    <?php 
	                    echo $this->Form->select('UserGuarantor.insurance_id', $insurances, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'required'=>false));
	                  ?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.note'); ?></label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	              </fieldset>
	          
	            </div>
	             
	             
	              
	           
                <script type="text/javascript" >
                
                  $('#UserGuarantorEdit').find(':input').prop('disabled',true);
               
                </script>
             
          	
           
            
        	</form>

       
        
      	</div>      
    </div>
</div>
