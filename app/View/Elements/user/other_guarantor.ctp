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
        	<?php echo $this->Form->create("User", array('action'=>'edit','id'=>'OtherGuarantorEdit' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        	'format' => array('before', 'label', 'between', 'input', 'after' ) ) ) ) ?>
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
	                      <?php echo $this->Form->input('OtherGuarantor.first_name', array('type'=>'text', 'id'=>"og_first_name", 'label'=>"姓", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,'div'=>false, 'required'=>false))?>
	                   
	                      <?php echo $this->Form->input('OtherGuarantor.last_name', array('type'=>'text', 'id'=>"og_last_name", 'label'=>"名", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', 'div'=>false , 'required'=>false))?>
	                    </div>
	                  </div>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('OtherGuarantor.first_name_kana', array('type'=>'text', 'id'=>"og_first_name_kana", 'label'=>"セイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false, 'required'=>false))?>              
	                                       
	                      <?php echo $this->Form->input('OtherGuarantor.last_name_kana', array('type'=>'text', 'id'=>"og_last_name_kana", 'label'=>"メイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px','div'=>false, 'required'=>false))?>
	                    </div>
	                  </div>
	                </td>
	                <script type="text/javascript">
	                	$(this).autoKana('#og_first_name', '#og_first_name_kana', {katakana:false, toggle:false});
                		$(this).autoKana('#og_last_name', '#og_last_name_kana', {katakana:false, toggle:false});
	                </script>
	              </tr>
	             <tr>
		             <td> <label for="inputEmail">性的<span style="color:red">*</span></label></td>
		              <td>
		                <div class="form-group">
		                
		                  <div class="col-lg-10">
		                    <?php 
		                		echo $this->Form->radio('OtherGuarantor.gender', array('male'=>"男性",'female'=> "女性"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required'=>false));
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
	                  		echo $this->Form->select('OtherGuarantor.year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'og−year', 'onchange'=>'g_calculate_age1()', 'required'=>false));
	                		?>
	    	              月
	    	              <?php 
	    	              	$months = array_combine(range(1, 12), range(1, 12));
	                  		echo $this->Form->select('OtherGuarantor.month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month', 'required'=>false));
	                		?>
	    	              日
	    	              <?php 
	    	              $dates = array_combine(range(1, 31), range(1, 31));
	                  		echo $this->Form->select('OtherGuarantor.day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day', 'required'=>false));
	                		?>
	                      歳 : <span id="og-age">0</span>
	                    
	                    	 <script type="text/javascript">
		                    var d = new Date();
		                      var n = d.getFullYear();
		                      $("#og-age").html(n - $("#og−year").val());
		                    function g_calculate_age1(){
		                      
		                      $("#og-age").html(n - $("#og−year").val());
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
	                    echo $this->Form->radio('OtherGuarantor.live_with_family', array("1"=>"有り" ,"2"=> "無し"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'required'=>false));
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
	                    echo $this->Form->radio('OtherGuarantor.married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'required'=>false));
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
	                      <?php echo $this->Form->input('OtherGuarantor.num_child', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false, 'required'=>false))?>
	                   
	                      
	                    </div>
	                  </div>
	                  </td>
	               </tr>
	               <tr>
	                <td><label for="inputEmail">Relationship<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">
	                      <?php echo $this->Form->input('OtherGuarantor.relate', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                   
	                      
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
		                  <?php echo $this->Form->input('OtherGuarantor.post_num_1', array('type'=>'text', 'id'=>"og_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,'div'=>false, 'required'=>false))?>
		                  <?php echo $this->Form->input('OtherGuarantor.post_num_2', array('type'=>'text', 'id'=>"og_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required'=>false))?>
		                  <button type="button" class="btn btn-primary" id="btn-og-find-address">郵使番号から住所を検索</button>
		                  <img id="loader" style="vertical-align: middle; display: none" src="<?php echo $this->webroot;?>images/loader.gif" />
		                  <script type="text/javascript">
		                    $('#btn-og-find-address').on('click', function() {
		                         var loader = $('#og_loader');
		                        
		                          loader.show();
		                        $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#og_post_num_1').val().trim() + $('#og_post_num_2').val().trim()}, 
		                          function(json) {
		                            loader.hide();
		                            $("#og_pref_id").val(json.pref_id);
		                            $("#og_city").val(json.ward);
		                            $("#og_address").val(json.addr1);
		                        });
		                    });
		                  </script>

		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">都道府県<span style="color:red">*<span></label>
		                <div class="col-lg-10">
		                  <?php 
		                  echo $this->Form->select('OtherGuarantor.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'og_pref_id', 'empty'=>'-----', 'required'=>false));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">市区町村<span style="color:red">*<span></label>
		                <div class="col-lg-10">
		                  <?php 
		                    echo $this->Form->input('OtherGuarantor.city', array('type'=>'text', 'id'=>"og_city", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">番地<span style="color:red">*<span></label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('OtherGuarantor.address', array('type'=>'text', 'id'=>"og_address", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">建物</label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('OtherGuarantor.house_name', array('type'=>'text', 'id'=>"og_house_name", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
		                </div>
		              </div>
	                </td>
	              </tr>
	              <tr>
	                <td><label for="inputEmail">居住形態<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      	<?php echo $this->Form->select('OtherGuarantor.residence_id', $residences, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'residence_id', 'required'=>false)); ?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	               <tr>
	                <td><label for="inputEmail">Year<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      <?php echo $this->Form->input('OtherGuarantor.year_residence', array('type'=>'text', 'id'=>"year_residence",'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	               <tr>
	                <td><label for="inputEmail">House Fee<span style="color:red">*</span></label></td>
	                <td>
	                  <div class="form-group">
	                    
	                    <div class="col-lg-10">                 
	                      <?php echo $this->Form->input('OtherGuarantor.housing_cost', array('type'=>'text', 'id'=>"housing_cost",'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
	                    </div>
	                  </div>
	                </td>
	              </tr>
	               
	              </table>
	            </fieldset>
	       	</div>
	        <div class="well bs-component">
	           
	            <fieldset>
	              <legend>Contact</legend>
	              <table class="table table-striped table-hover ">
		              <!-- <tr>
		                <td><label for="inputEmail">メールアドレス<span style="color:red">*</span></label></td>
		                <td>
		                  <div class="form-group">
		                    
		                    <div class="col-lg-10">                 
		                      <?php echo $this->Form->input('OtherGuarantor.email', array('type'=>'text', 'id'=>"email",'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
		                    </div>
		                  </div>
		                </td>
		              </tr> -->
		               
		              <tr>
		                <td><label for="inputEmail">電話番号<span style="color:red">*</span></label></td>
		                <td>
		                  <div class="form-group">
		                    
		                    <div class="col-lg-10">
		                      <?php echo $this->Form->input('OtherGuarantor.phone', array('type'=>'text', 'id'=>"phone", 'label'=>'携帯電話', 'class'=>'form-control', 'div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
		                   
		                      <?php echo $this->Form->input('OtherGuarantor.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>'自宅', 'class'=>'form-control','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
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
				                		echo $this->Form->radio('OtherGuarantor.contact_type_id', array('1'=>"携帯",'2'=> "自宅",'3'=> "勤務先"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
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
	                    echo $this->Form->select('OtherGuarantor.work_id', $works, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'-----'));
	                  ?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Company Name</label>
	                  <div class="col-lg-10">
	                  Hira
	                    <?php echo $this->Form->input('OtherGuarantor.company', array('type'=>'text', 'id'=>"og-company", 'label'=>false, 'class'=>'form-control', 'display:inline', 'div'=>false))?>
	                    Kana
	                    <?php echo $this->Form->input('OtherGuarantor.company_kana', array('type'=>'text', 'id'=>"og-company-kana", 'label'=>false, 'class'=>'form-control', 'style'=>'display:inline', 'div'=>false))?>
	                  </div>
	                </div>
	                <script type="text/javascript">
                    $(this).autoKana('#og-company', '#og-company-kana', {katakana:false, toggle:false});
                  </script>

	               
	                    
	            <table class="table table-striped table-hover ">
	              <tr>
	                <td><label for="inputEmail" >Company Address<span style="color:red">*</span></td>
	                <td>
	                  <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">〒</label>
		                <div class="col-lg-10" >
		                  <?php echo $this->Form->input('OtherGuarantor.company_post_num_1', array('type'=>'text', 'id'=>"og_company_post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , 'div'=>false))?>
		                  <?php echo $this->Form->input('OtherGuarantor.company_post_num_2', array('type'=>'text', 'id'=>"og_company_post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,'div'=>false))?>
		                  <button type="button" class="btn btn-primary" id="btn-og-company-address">郵使番号から住所を検索</button>
		                  <img id="og-company-loader" style="vertical-align: middle; display: none" src="<?php echo $this->webroot;?>images/loader.gif" />
		                  <script type="text/javascript">
		                    $('#btn-og-company-address').on('click', function() {
		                         var loader = $('#og-company-loader');
		                        
		                          loader.show();
		                         // alert($('#post_num_1').val().trim() + $('#post_num_2').val().trim());
		                        $.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#og_company_post_num_1').val().trim() + $('#og_company_post_num_2').val().trim()}, 
		                          function(json) {
		                            loader.hide();
		                            $("#og_company_pref_id").val(json.pref_id);
		                            $("#og_company_city").val(json.ward);
		                            $("#og_company_address").val(json.addr1);
		                        });
		                    });
		                  </script>

		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">都道府県</label>
		                <div class="col-lg-10">
		                  <?php 
		                  echo $this->Form->select('OtherGuarantor.company_pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'og_company_pref_id', 'empty'=>'-----'));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">市区町村</label>
		                <div class="col-lg-10">
		                  <?php 
		                    echo $this->Form->input('OtherGuarantor.company_city', array('type'=>'text', 'id'=>"og_company_city", 'label'=>false, 'class'=>'form-control', 'div'=>false));
		                ?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">番地</label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('OtherGuarantor.company_address', array('type'=>'text', 'id'=>"og_company_address", 'label'=>false, 'class'=>'form-control','div'=>false))?>
		                </div>
		              </div>
		              <div class="form-group">
		                <label for="inputEmail" class="col-lg-2 control-label">建物</label>
		                <div class="col-lg-10">
		                  <?php echo $this->Form->input('OtherGuarantor.company_house_name', array('type'=>'text', 'id'=>"og_company_house_name", 'label'=>false, 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
		                </div>
		              </div>
	                </td>
	              </tr>
	              </table>

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Phone</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Fax</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">職業</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->select('OtherGuarantor.career_id', $careers, array('class'=>'form-control','div'=>false, 'label'=>false, 'id'=>'carrer_id', 'empty'=>'-----', 'required'=>false));?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Description</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Department</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>

	               <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Position</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">働続年数</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 年' , 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required'=>false))?>
	                    <?php echo $this->Form->input('OtherGuarantor.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 月', 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	               
	               <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Salary Month</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.income_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>円
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Salary Year</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.income_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>円
	                  </div>
	                </div>
	                <div class="form-group">
	                	 <label for="inputEmail" class="col-lg-2 control-label">Salary Type</label>
	                  <div class="col-lg-10">
	                    <?php 
	                		echo $this->Form->radio('OtherGuarantor.salary_type', array('1'=>"固定給",'2'=> "一部歩合制 ", '3'=>"完全歩合制", "4"=>"その他" ), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'onchange'=>'og_change_type($(this))'));
	                		echo $this->Form->input('OtherGuarantor.salary_type_other', array('type'=>'text', 'id'=>"og_salary_type_other", 'label'=>false, 'class'=>'form-control','div'=>false, 'disabled'=>true, 'required'=>false))
	              		?>	
	                  </div>
	                  	<script type="text/javascript">
	                    function og_change_type(obj){
	                      
	                        if(obj.val() == '4')
	                        $('#og_salary_type_other').prop('disabled',false);
	                        else {
	                          $('#og_salary_type_other').prop('disabled',true);
	                        }
	                    }
	                  </script>
	                </div>


	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">給料日</label>
	                  <div class="col-lg-10">
	                    <?php 
		                		echo $this->Form->radio('OtherGuarantor.salary_receive_id', array('1'=>"日払い",'2'=> "週払い", '3'=>'月払い'), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
		                		echo $this->Form->input('OtherGuarantor.salary_date', array('type'=>'text', 'id'=>"salary_date", 'label'=>'日', 'class'=>'form-control','div'=>false, 'required'=>false))
		              		?>	
	                  </div>
	                </div>

	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">健康保険種別<span style="color:red">*</span></label>
	                  <div class="col-lg-10">
	                   
	                    <?php 
	                    echo $this->Form->select('OtherGuarantor.insurance_id', $insurances, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'-----', 'required'=>false));
	                  ?>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail" class="col-lg-2 control-label">Note</label>
	                  <div class="col-lg-10">
	                    <?php echo $this->Form->input('OtherGuarantor.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false, 'required'=>false))?>
	                  </div>
	                </div>
	                 <?php echo $this->Form->hidden('OtherGuarantor.id')?>
	              </fieldset>
	          
	            </div>
	             
	             
	              
	            <?php if($user['User']['status_id'] == 2){?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="button" class="btn btn-primary" id="btn-edit-other-guarantor" >Update</button>
                  <button type="submit" class="btn btn-primary" id="btn-save-other-guarantor" >Save</button>
                  <button type="button" class="btn btn-default" id="btn-cancel-other-guarantor" >Cancel</button>
                </div>
              </div>
              <?php }
              else {?>
                <script type="text/javascript" charset="utf-8" async defer>
                

                </script>
              <?php }?>
               
                <script type="text/javascript" >
                var edit;
                $( document ).ready(function() {
                  if(edit != 1){
                    //alert(edit);
                    $('#btn-edit-other-guarantor').show();
                    $('#btn-save-other-guarantor').hide();
                    $('#btn-cancel-other-guarantor').hide();
                    $('#OtherGuarantorEdit').find(':input:not(#btn-edit-other-guarantor)').prop('disabled',true);
                    $('#OtherGuarantorEdit').find(':button:not(#btn-edit-other-guarantor)').hide();
                  }
                  else{
                    $('#btn-cancel-guarantor').show();
                    $('#btn-save-guarantor').show();
                      
                     
                    $('#btn-edit-guarantor').hide();
                  }
                });
                 

                    
                   $('#btn-edit-other-guarantor').on('click', function() {
                      $('#OtherGuarantorEdit').find(':button:not(#btn-edit-other-guarantor)').show();
                      $('#OtherGuarantorEdit').find(':input').prop('disabled',false);
                      $('#btn-cancel-other-guarantor').show();
                      $('#btn-save-other-guarantor').show();
                      
                     
                      $('#btn-edit-other-guarantor').hide();
                      edit = 1;

                   });
                   $('#btn-cancel-other-guarantor').on('click', function() {
                      $('#btn-edit-other-guarantor').show();
                      $('#btn-save-other-guarantor').hide();
                      $('#btn-cancel-other-guarantor').hide();
                      $('#OtherGuarantorEdit').find(':input:not(#btn-edit-other-guarantor)').prop('disabled',true);
                      $('#OtherGuarantorEdit').find(':button:not(#btn-edit-other-guarantor)').hide();
                      $.ajax({
                           url: "<?php echo $this->webroot;?>user_guarantors/edit_other_guarantor",
                            success: function(result){
                              edit = 0;
                              $('#other_guarantor').html(result);
                            }
                        });

                   });
                  $("#OtherGuarantorEdit").submit(function() {

                      var url = "<?php echo $this->webroot;?>user_guarantors/edit_other_guarantor"; // the script where you handle the form input.

                      $.ajax({
                             type: "POST",
                             url: url,
                             data: $("#OtherGuarantorEdit").serialize(), // serializes the form's elements.
                             success: function(result)
                             {
                                 edit = 0;
                                 $('#other_guarantor').html(result);
                                 $.ajax({
                                   url: "<?php echo $this->webroot?>users/reload_dashboard",
                                    success: function(result){
                                      $('#home').html(result);
                                    }
                                });
                             }
                           });

                      return false; // avoid to execute the actual submit of the form.
                  });
                </script>

        </form>

        
      </div>
      
    </div>
  </div>
