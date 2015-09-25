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
        	'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
	        <div class="well bs-component">
	       
	         <!--  <form class="form-horizontal"> -->
	           
	            <fieldset>
	              <legend>会員登録フォ一ム</legend>
	              <table class="table table-striped table-hover ">
	              <tr>
	                <td>
	                  <label for="inputEmail">申込人氏名<span style="color:red">*</span></label>
	                </td>
	                <td>
	                  <div class="form-group">
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('UserGuarantor.first_name', array('type'=>'text', 'id'=>"g_first_name", 'label'=>"姓", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,"placeholder"=>'山田','div'=>false))?>
	                   
	                      <?php echo $this->Form->input('UserGuarantor.last_name', array('type'=>'text', 'id'=>"g_last_name", 'label'=>"名", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', "placeholder"=>'雪','div'=>false))?>
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('UserGuarantor.first_name_kana', array('type'=>'text', 'id'=>"g_first_name_kana", 'label'=>"セイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', "placeholder"=>'ヤマダ','div'=>false))?>              
	                                       
	                      <?php echo $this->Form->input('UserGuarantor.last_name_kana', array('type'=>'text', 'id'=>"g_last_name_kana", 'label'=>"メイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px',"placeholder"=>'ユキ','div'=>false))?>
	                    </div>
	                  </div>
	                </td>
	                <script type="text/javascript">
	                	$(this).autoKana('#g_first_name', '#g_first_name_kana', {katakana:false, toggle:false});
                		$(this).autoKana('#g_last_name', '#g_last_name_kana', {katakana:false, toggle:false});
	                </script>
	              </tr>
	             <tr>
		             <td> <label for="inputEmail">性的<span style="color:red">*</span></label></td>
		              <td>
		                <div class="form-group">
		                
		                  <div class="col-lg-10">
		                    <?php 
		                		echo $this->Form->radio('UserGuarantor.gender', array('male'=>"男性",'female'=> "女性"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
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
	                  		echo $this->Form->select('UserGuarantor.year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'g1−year', 'onchange'=>'g_calculate_age1()'));
	                		?>
	    	              月
	    	              <?php 
	    	              	$months = array_combine(range(1, 12), range(1, 12));
	                  		echo $this->Form->select('UserGuarantor.month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month'));
	                		?>
	    	              日
	    	              <?php 
	    	              $dates = array_combine(range(1, 31), range(1, 31));
	                  		echo $this->Form->select('UserGuarantor.day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day'));
	                		?>
	                      歳 : <span id="g-age-1">0</span>
	                    
	                    	 <script type="text/javascript">
		                    var d = new Date();
		                      var n = d.getFullYear();
		                      $("#g-age-1").html(n - $("#g1−year").val());
		                    function g_calculate_age1(){
		                      
		                      $("#g-age-1").html(n - $("#g1−year").val());
		                    }
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
	                    echo $this->Form->radio('UserGuarantor.live_with_family', array("1"=>"有り" ,"2"=> "無し"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1));
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
	                    echo $this->Form->radio('UserGuarantor.married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1));
	                  ?>  
	                  </div>
	                </div>
	                </td>
	              </tr>
	              <tr>
	                <td><label for="inputEmail">Num Children<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('UserGuarantor.num_child', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false, 'required'=>false))?>
	                   
	                      
	                    </div>
	                  </div>
	                  </td>
	               </tr>
	               </table>
	            </fieldset>
	        </div>
	        <div class="well bs-component">
	           
	            <fieldset>
	              <legend>Address</legend>
	              <table class="table table-striped table-hover ">
	              <tr>
	                <td><label for="inputEmail" >現住所<span style="color:red">*</span></td>
	                <td>
	                  <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">〒<span style="color:red">*<span></label>
		                <div class="col-lg-10" >
		                  <?php echo $this->Form->input('UserGuarantor.post_num_1', array('type'=>'text', 'id'=>"g_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'101','div'=>false))?>
		                  <?php echo $this->Form->input('UserGuarantor.post_num_2', array('type'=>'text', 'id'=>"g_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'0001','div'=>false))?>
		                  <button type="button" class="btn btn-primary" id="btn-g-find-address">郵使番号から住所を検索</button>
		                  <img id="loader" style="vertical-align: middle; display: none" src="<?php echo $this->webroot;?>images/loader.gif" />
		                  <script type="text/javascript">
		                    $('#btn-g-find-address').on('click', function() {
		                         var loader = $('#loader');
		                        
		                          loader.show();
		                        $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#g_post_num_1').val().trim() + $('#g_post_num_2').val().trim()}, 
		                          function(json) {
		                            loader.hide();
		                            $("#g_pref_id").val(json.pref_id);
		                            $("#g_city").val(json.ward);
		                            $("#g_address").val(json.addr1);
		                        });
		                    });
		                  </script>

		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">都道府県<span style="color:red">*<span></label>
		                <div class="col-lg-10">
		                  <?php 
		                  echo $this->Form->select('UserGuarantor.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'g_pref_id', 'empty'=>'青森県'));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">市区町村<span style="color:red">*<span></label>
		                <div class="col-lg-10">
		                  <?php 
		                    echo $this->Form->input('UserGuarantor.city', array('type'=>'text', 'id'=>"g_city", 'label'=>false, 'class'=>'form-control', 'div'=>false));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">番地<span style="color:red">*<span></label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('UserGuarantor.address', array('type'=>'text', 'id'=>"g_address", 'label'=>false, 'class'=>'form-control','div'=>false))?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">建物</label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('UserGuarantor.house_name', array('type'=>'text', 'id'=>"g_house_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false))?>
		                </div>
		              </div>
	                </td>
	              </tr>
	              <tr>
	                <td><label for="inputEmail">居住形態<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      	<?php echo $this->Form->select('UserGuarantor.residence_id', $residences, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'residence_id')); ?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	               <tr>
	                <td><label for="inputEmail">Year<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      <?php echo $this->Form->input('UserGuarantor.year_residence', array('type'=>'text', 'id'=>"year_residence",'label'=>false, 'class'=>'form-control', 'div'=>false))?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	               <tr>
	                <td><label for="inputEmail">House Fee<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      <?php echo $this->Form->input('UserGuarantor.housing_cost', array('type'=>'text', 'id'=>"housing_cost",'label'=>false, 'class'=>'form-control', 'div'=>false))?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	              </table>
	               <?php echo $this->Form->hidden('UserGuarantor.id')?>
	            </fieldset>
	       	</div>
	        <div class="well bs-component">
	           
	            <fieldset>
	              <legend>Contact</legend>
	              <table class="table table-striped table-hover ">
		              <tr>
		                <td><label for="inputEmail">メールアドレス<span style="color:red">*</span></label></td>
		                <td>
		                  <div class="form-group">
		                    
		                    <div class="col-lg-10">                 
		                      <?php echo $this->Form->input('UserGuarantor.email', array('type'=>'text', 'id'=>"email",'label'=>false, 'class'=>'form-control', "placeholder"=>'sample@gmail.com','div'=>false))?>
		                    </div>
		                  </div>
		                </td>
		              </tr>
		               
		              <tr>
		                <td><label for="inputEmail">電話番号<span style="color:red">*</span></label></td>
		                <td>
		                  <div class="form-group">
		                    
		                    <div class="col-lg-10">
		                      <?php echo $this->Form->input('UserGuarantor.phone', array('type'=>'text', 'id'=>"phone", 'label'=>'携帯電話', 'class'=>'form-control', 'div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
		                   
		                      <?php echo $this->Form->input('UserGuarantor.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>'自宅', 'class'=>'form-control','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))?>
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
				                		echo $this->Form->radio('UserGuarantor.contact_type_id', array('1'=>"携帯",'2'=> "自宅",'3'=> "勤務先"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
				              		?>	
				                  </div>
				                </div>
				              </td>
			             </tr>
	            	</table>
	          	</fieldset>
	        </div>
	              

	             

	        <div class="well bs-component">


	             <legend>Company</legend>
	              <fieldset>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">職業<span style="color:red">*<span></label>
	                  <div class="col-lg-10">
	                   
	                    <?php 
	                    echo $this->Form->select('UserGuarantor.work_id', $works, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'正社貝'));
	                  ?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Company Name</label>
	                  <div class="col-lg-10">
	                  Hira
	                    <?php echo $this->Form->input('UserGuarantor.company', array('type'=>'text', 'id'=>"g-company", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false))?>
	                    Kana
	                    <?php echo $this->Form->input('UserGuarantor.company_kana', array('type'=>'text', 'id'=>"g-company-kana", 'label'=>false, 'class'=>'form-control', 'style'=>'display:inline', 'div'=>false))?>
	                  </div>
	                </div>
	                <script type="text/javascript">
                    $(this).autoKana('#g-company', '#g-company-kana', {katakana:false, toggle:false});
                  </script>

	               
	                    
	            <table class="table table-striped table-hover ">
	              <tr>
	                <td><label for="inputEmail" >Company Address<span style="color:red">*</span></td>
	                <td>
	                  <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">〒</label>
		                <div class="col-lg-10" >
		                  <?php echo $this->Form->input('UserGuarantor.company_post_num_1', array('type'=>'text', 'id'=>"g_company_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'101','div'=>false))?>
		                  <?php echo $this->Form->input('UserGuarantor.company_post_num_2', array('type'=>'text', 'id'=>"g_company_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'0001','div'=>false))?>
		                  <button type="button" class="btn btn-primary" id="btn-guarantor-company-address">郵使番号から住所を検索</button>
		                  <img id="g-loader" style="vertical-align: middle; display: none" src="<?php echo $this->webroot;?>images/loader.gif" />
		                  <script type="text/javascript">
		                    $('#btn-guarantor-company-address').on('click', function() {
		                         var loader = $('#g-loader');
		                        
		                          loader.show();
		                         // alert($('#post_num_1').val().trim() + $('#post_num_2').val().trim());
		                        $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#g_company_post_num_1').val().trim() + $('#g_company_post_num_2').val().trim()}, 
		                          function(json) {
		                            loader.hide();
		                            $("#g_company_pref_id").val(json.pref_id);
		                            $("#g_company_city").val(json.ward);
		                            $("#g_company_address").val(json.addr1);
		                        });
		                    });
		                  </script>

		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">都道府県</label>
		                <div class="col-lg-10">
		                  <?php 
		                  echo $this->Form->select('UserGuarantor.company_pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'g_company_pref_id', 'empty'=>'青森県'));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">市区町村</label>
		                <div class="col-lg-10">
		                  <?php 
		                    echo $this->Form->input('UserGuarantor.company_city', array('type'=>'text', 'id'=>"g_company_city", 'label'=>false, 'class'=>'form-control', 'div'=>false));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">番地</label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('UserGuarantor.company_address', array('type'=>'text', 'id'=>"g_company_address", 'label'=>false, 'class'=>'form-control','div'=>false))?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">建物</label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('UserGuarantor.company_house_name', array('type'=>'text', 'id'=>"g_company_house_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false))?>
		                </div>
		              </div>
	                </td>
	              </tr>
	              </table>

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Phone</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Fax</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
	                  </div>
	                </div>
	                

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">職業</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->select('UserGuarantor.career_id', $careers, array('class'=>'form-control','div'=>false, 'label'=>false, 'id'=>'carrer_id', 'empty'=>'青森県'));?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Description</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Department</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
	                  </div>
	                </div>

	               <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Position</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">働続年数</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 年' , 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
	                    <?php echo $this->Form->input('UserGuarantor.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 月', 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
	                  </div>
	                </div>
	               
	               <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Salary Month</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.income_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'form-control','div'=>false))?>円
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Salary Year</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.income_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'form-control','div'=>false))?>円
	                  </div>
	                </div>
	                <div class="form-group">
	                	 <label for="inputEmail" class="col-lg-2 control-label">Salary Type</label>
	                  <div class="col-lg-10">
	                    <?php 
	                		echo $this->Form->radio('UserGuarantor.salary_type', array('1'=>"固定給",'2'=> "一部歩合制 ", '3'=>"完全歩合制", "4"=>"その他" ), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'onchange'=>'g_change_type($(this))'));
	                		echo $this->Form->input('UserGuarantor.salary_type_other', array('type'=>'text', 'id'=>"g_salary_type_other", 'label'=>false, 'class'=>'form-control','div'=>false, 'disabled'=>true))
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
	                  <label for="inputEmail" class="col-lg-2 control-label">給料日</label>
	                  <div class="col-lg-10">
	                    <?php 
		                		echo $this->Form->radio('UserGuarantor.salary_receive_id', array('1'=>"日払い",'2'=> "週払い", '3'=>'月払い'), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
		                		echo $this->Form->input('UserGuarantor.salary_date', array('type'=>'text', 'id'=>"salary_date", 'label'=>'日', 'class'=>'form-control','div'=>false))
		              		?>	
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">健康保険種別<span style="color:red">*</span></label>
	                  <div class="col-lg-10">
	                   
	                    <?php 
	                    echo $this->Form->select('UserGuarantor.insurance_id', $insurances, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'正社貝'));
	                  ?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Note</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('UserGuarantor.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
	                  </div>
	                </div>
	                 <?php echo $this->Form->hidden('UserGuarantor.id')?>
	              </fieldset>
	          
	            </div>
	             
	             
	              
	            <div class="form-group">
	              <div class="col-lg-10 col-lg-offset-2">
	                <button type="submit" class="btn btn-primary">Save</button>
	              </div>
	            </div>
             
          	
           
            
        	</form>

        <?php
	    // JsHelper should be loaded in $helpers in controller
	    // Form ID: #ContactsContactForm
	    // Div to use for AJAX response: #contactStatus
	    $data = $this->Js->get('#UserGuarantorEdit')->serializeForm(array('isForm' => true, 'inline' => true));
	    $this->Js->get('#UserGuarantorEdit')->event(
	       'submit',
	       $this->Js->request(
	        array('action' => 'edit', 'controller' => 'user_guarantors'),
	        array(
	            'update' => '#guarantor',
	            'data' => $data,
	            'async' => true,    
	            'dataExpression'=>true,
	            'method' => 'POST'
	        )
	      )
	    );
	    echo $this->Js->writeBuffer(); 
	    ?>
        
      	</div>      
    </div>
</div>
