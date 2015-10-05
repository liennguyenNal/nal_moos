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
        <?php echo $this->Form->create("User", array('action'=>'update_basic_info','id'=>'UserEditBasicInfo' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after') ) ) ) ?>
        <div class="well bs-component">
       
         <!--  <form class="form-horizontal"> -->
           
            <fieldset>
              <legend>会員登録フォ一ム</legend>
              <table class="table table-striped table-hover ">
              <tr>
                <td>
                  <label for="inputEmail"> <?php echo __('user.register.username') ?><span style="color:red">*</span></label>
                </td>
                <td>
                  <div class="form-group">
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('User.first_name', array('type'=>'text', 'id'=>"first_name", 'label'=> __('user.register.firstname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false))?>
                   
                      <?php echo $this->Form->input('User.last_name', array('type'=>'text', 'id'=>"last_name", 'label'=> __('user.register.lastname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', 'div'=>false))?>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('User.first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=> __('user.register.firstnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px','div'=>false, 'required'=>false))?>              
                                       
                      <?php echo $this->Form->input('User.last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>"メイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px','div'=>false, 'required'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
             <tr>
	             <td> <label for="inputEmail">性的<span style="color:red">*</span></label></td>
	              <td>
	                <div class="form-group">
	                
	                  <div class="col-lg-10">
	                    <?php 
	                		echo $this->Form->radio('User.gender', array('male'=>"男性",'female'=> "女性"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male",'required'=>false));
	              		?>	
	                  </div>
	                </div>
	              </td>
              </tr>
              <tr>
                <td> <label for="inputEmail" >生年月日<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                   
                    <div class="col-lg-10">
                    	
                      年
                      <?php 
                      $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
                  		echo $this->Form->select('User.year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'year', 'onchange'=>'calculate_age()','required'=>false));
                		?>
    	              月
    	              <?php 
    	              	$months = array_combine(range(1, 12), range(1, 12));
                  		echo $this->Form->select('User.month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month','required'=>false));
                		?>
    	              日
    	              <?php 
    	              $dates = array_combine(range(1, 31), range(1, 31));
                  		echo $this->Form->select('User.day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day','required'=>false));
                		?>
                      歳 : <span id="age">0</span>
                    <script type="text/javascript">
                    var d = new Date();
                      var n = d.getFullYear();
                      $("#age").html(n - $("#year").val());
                    
                    </script>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" >同居家族<span style="color:red">*</span></label></td>
                <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                   <?php 
                    echo $this->Form->radio('User.live_with_family', array(1=>"有り" ,2=> "無し"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1,'required'=>false));
                  ?>  
                  </div>
                </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" >婚姻<span style="color:red">*</span></label></td>
                <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                   <?php 
                    echo $this->Form->radio('User.married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1,'required'=>false));
                  ?>  
                  </div>
                </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail"><?php echo __('user.my_page.basic_info.num_children'); ?><span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('User.num_child', array('type'=>'text', 'id'=>"num_child", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false,'required'=>false))?>
                   
                      
                    </div>
                  </div>
                  </td>
               </tr>
               </table>
            </fieldset>
       </div>
        <div class="well bs-component">
           
            <fieldset>
              <legend>申込人住所情報</legend>
              <table class="table table-striped table-hover ">
              <tr>
                <td><label for="inputEmail" >現住所<span style="color:red">*</span></td>
                <td>
                  <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">〒<span style="color:red">*<span></label>
	                <div class="col-lg-10" >
	                  <?php echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'101','div'=>false))?>
	                  <?php echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'0001','div'=>false))?>
	                  
	                  

	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">都道府県<span style="color:red">*<span></label>
	                <div class="col-lg-10">
	                  <?php 
	                  echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'青森県', 'required'=>false));
	                ?>
	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">市区町村<span style="color:red">*<span></label>
	                <div class="col-lg-10">
	                  <?php 
	                    echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false));
	                ?>
	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">番地<span style="color:red">*<span></label>
	                <div class="col-lg-10">
	                  <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">建物</label>
	                <div class="col-lg-10">
	                  <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'form-control', 'div'=>false,'required'=>false))?>
	                </div>
	              </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail">居住形態<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      	<?php echo $this->Form->select('UserAddress.residence_id', $residences, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'residence_id','required'=>false)); ?>
                    </div>
                  </div>
                </td>
              </tr>
               
               <tr>
                <td><label for="inputEmail"><?php echo __('user.my_page.basic_info.year_residence'); ?><span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      <?php echo $this->Form->input('UserAddress.year_residence', array('type'=>'text', 'id'=>"year_residence",'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
               
               <tr>
                <td><label for="inputEmail"><?php echo __('user.my_page.basic_info.house_cost'); ?><span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      <?php echo $this->Form->input('UserAddress.housing_costs', array('type'=>'text', 'id'=>"housing_costs",'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
               
              </table>
            </fieldset>
       </div>
        <div class="well bs-component">
           
            <fieldset>
              <legend>申込人連絡先情報</legend>
              <table class="table table-striped table-hover ">
	              <tr>
	                <td><label for="inputEmail">メールアドレス<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email",'label'=>false, 'class'=>'form-control', 'div'=>false, 'disabled'=>'true'))?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	              <tr>
	                <td><label for="inputEmail">電話番号<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>'携帯電話', 'class'=>'form-control', 'div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
	                   
	                      <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>'自宅', 'class'=>'form-control','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
	                    </div>
	                  </div>
	                  </td>
	                </tr>
	                <tr>
			             <td> <label for="inputEmail">日中連絡先 <span style="color:red">*</span></label></td>
			              <td>
			                <div class="form-group">
			                
			                  <div class="col-lg-10">
			                    <?php 
			                		echo $this->Form->radio('User.contact_type', array('1'=>"携帯",'2'=> "自宅",'3'=> "勤務先"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'required'=>false));
			              		?>	
			                  </div>
			                </div>
			              </td>
		             </tr>
            	</table>
          	</fieldset>
        </div>
              

             

            <div class="well bs-component">


             <legend>申込人勤務先情報</legend>
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">職業<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserCompany.work_id', $works, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'----', 'required'=>false));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.company'); ?></label>
                  <div class="col-lg-10">
                  <?php echo __('user.register.company_name'); ?>
                    <?php echo $this->Form->input('UserCompany.name', array('type'=>'text', 'id'=>"company-name", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false))?>
                    <?php echo __('user.register.company_name_kana'); ?>
                    <?php echo $this->Form->input('UserCompany.name_kana', array('type'=>'text', 'id'=>"company-name-kana", 'label'=>false, 'class'=>'form-control', 'style'=>'display:inline', 'div'=>false, 'required'=>false))?>
                  </div>
                </div>
               
                    
            <table class="table table-striped table-hover ">
              <tr>
                <td><label for="inputEmail" ><?php echo __('user.register.address'); ?><span style="color:red">*</span></td>
                <td>
                  <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">〒</label>
	                <div class="col-lg-10" >
	                  <?php echo $this->Form->input('UserCompany.post_num_1', array('type'=>'text', 'id'=>"company_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'101','div'=>false, 'required'=>false))?>
	                  <?php echo $this->Form->input('UserCompany.post_num_2', array('type'=>'text', 'id'=>"company_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'0001','div'=>false, 'required'=>false))?>
	                  

	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">都道府県</label>
	                <div class="col-lg-10">
	                  <?php 
	                  echo $this->Form->select('UserCompany.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'company_pref_id', 'empty'=>'青森県', 'required'=>false));
	                ?>
	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">市区町村</label>
	                <div class="col-lg-10">
	                  <?php 
	                    echo $this->Form->input('UserCompany.city', array('type'=>'text', 'id'=>"company_city", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false, 'required'=>false));
	                ?>
	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">番地</label>
	                <div class="col-lg-10">
	                  <?php echo $this->Form->input('UserCompany.address', array('type'=>'text', 'id'=>"company_address", 'label'=>false, 'class'=>'form-control','div'=>false,'required'=>false))?>
	                </div>
	              </div>
	              <div class="form-group">
	                <label for="inputEmail" class="col-lg-2 control-label">建物</label>
	                <div class="col-lg-10">
	                  <?php echo $this->Form->input('UserCompany.house_name', array('type'=>'text', 'id'=>"company_house_name", 'label'=>false, 'class'=>'form-control', 'div'=>false,'required'=>false))?>
	                </div>
	              </div>
                </td>
              </tr>
              </table>

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.contact.company-phone'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.contact.fax'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
                  </div>
                </div>
                

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">職業</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->select('UserCompany.career_id', $careers, array('class'=>'form-control','div'=>false, 'label'=>false, 'id'=>'carrer_id', 'empty'=>'青森県', 'required'=>false));?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.description'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.description', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false,'required'=>false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.department'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
                  </div>
                </div>

               <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.position'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">働続年数</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 年' , 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false,'required'=>false))?>
                    <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 月', 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required'=>false))?>
                  </div>
                </div>
               
               <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.tax'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.salary_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>円
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.register.salary_year'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.salary_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?><?php echo __('user.register.yen'); ?>
                  </div>
                </div>
                <div class="form-group">
                	 <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.salary_type'); ?></label>
                  <div class="col-lg-10">
                    <?php 
                		echo $this->Form->radio('UserCompany.salary_type', array('1'=>"固定給",'2'=> "一部歩合制 ", '3'=>"完全歩合制", "4"=>"その他" ), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'id'=>'salary_type', 'onchange'=>'change_type($(this))', 'required'=>false));

                		echo $this->Form->input('UserCompany.salary_type_other', array('type'=>'text', 'id'=>"salary_type_other", 'label'=>false, 'class'=>'form-control','div'=>false, 'disabled'=>true, 'style'=>'width:200px; display:inline', 'required'=>false))
              		?>	
                  
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">給料日</label>
                  <div class="col-lg-10">
                    <?php 
	                		echo $this->Form->radio('UserCompany.salary_receive_id', array('1'=>"日払い",'2'=> "週払い", '3'=>'月払い'), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
	                		echo $this->Form->input('UserCompany.salary_date', array('type'=>'text', 'id'=>"salary_date", 'label'=>'日', 'class'=>'form-control','div'=>false))
	              		?>	
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">健康保険種別<span style="color:red">*<span></label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserCompany.insurance_id', $insurances, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'正社貝', 'required'=>false));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.note'); ?></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
                  </div>
                </div>
              </fieldset>
          
            </div>
             <div class="well bs-component">


             <legend><?php echo __('user.my_page.basic_info.debt'); ?></legend>
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.debt_count'); ?></label>
                  <div class="col-lg-10">
                   
                    <?php echo $this->Form->input('User.debt_count', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false, 'required'=>false))?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.debt_total'); ?></label>
                  <div class="col-lg-10">
                 <?php echo $this->Form->input('User.debt_total_value', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false, 'required'=>false))?>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.my_page.basic_info.debt_month'); ?></label>
                  <div class="col-lg-10">
                 <?php echo $this->Form->input('User.debt_pay_per_month', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false, 'required'=>false))?>
                  </div>
                </div>
                </fieldset>
            </div>
            <h4>ご希望エリア　※最大５エリアまで</h4>
            <section id="expect-area">
            <?php $i = 0; foreach($user['ExpectArea'] as $item){ $i++;?>
            <div class="well bs-component" id="expect-area-content-<?php echo $i; ?>" >
              <fieldset>

                  <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">〒<span style="color:red">*</span></label>
                  <div class="col-lg-10" >
                    <?php echo $this->Form->input("ExpectArea.$i.post_num_1", array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , 'div'=>false, 'value'=>$item['post_num_1'], 'required'=>false))?>
                    <?php echo $this->Form->input("ExpectArea.$i.post_num_2", array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , 'div'=>false, 'value'=>$item['post_num_2'], 'required'=>false))?>
                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">都道府県<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->select("ExpectArea.$i.pref_id", $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'青森県', 'value'=>$item['pref_id'], 'required'=>false));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">市区町村<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                     <?php echo $this->Form->input("ExpectArea.$i.city", array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'form-control','div'=>false, 'value'=>$item['city'], 'required'=>false))?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">地城<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input("ExpectArea.$i.address", array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'value'=>$item['address'], 'required'=>false))?>
                    <?php echo $this->Form->hidden("ExpectArea.$i.id", array('value'=>$item['id']))?>
                  </div>
                </div>
              </fieldset>
              
            </div>
            <?php } ?>
            </section>
            <div >
           <script type="text/javascript" >
              $('#UserEditBasicInfo').find(':input').prop('disabled',true);
           </script>

        </form>

      
        </div>
      </div>
      
    </div>
  </div>
