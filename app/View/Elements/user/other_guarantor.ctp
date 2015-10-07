<div class="from-login">
	<div class="from-ldpage">
		<div class="content">
			<div class="content-from">
				<div class="title-tab title-tab-fix-mb">
					<h3>連帯保証人基本情報</h3>
				</div>
				<!-- FORM -->
				<?php echo $this->element('flash_success');?>
	            <div class="block-warning" id="error-section" style="display:none">
	                <?php echo __('global.errors'); ?>
	            </div>
	            <?php echo $this->Form->create("User", array('action'=>'edit','id'=>'OtherGuarantorEdit')) ?>
				<div class="content-from-block">
					<div class="content-from-how">
						<table class="from" id="theform">
							<tbody>
								<tr>
									<td class="label-text"><label><?php echo __('user.register.username'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="block-input">
											<div class="div-style">
												<span class="w-auto"><?php echo __('user.register.firstname'); ?></span>
												<?php echo $this->Form->input('OtherGuarantor.first_name', array('type'=>'text', 'id'=>"og_first_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
												?>
											</div>
											<div class="div-style">
												<span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
												<?php echo $this->Form->input('OtherGuarantor.last_name', array('type'=>'text', 'id'=>"og_last_name", 'label'=>false, 'class'=>'w198', 'div'=>false , 'required'=>false, 'data-placement'=>'right'))
												?>
											</div>
										</div>
										<div class="block-input">
											<div class="div-style">
												<span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
												<?php echo $this->Form->input('OtherGuarantor.first_name_kana', array('type'=>'text', 'id'=>"og_first_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
												?>
											</div>
											<div class="div-style">
												<span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
												<?php echo $this->Form->input('OtherGuarantor.last_name_kana', array('type'=>'text', 'id'=>"og_last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))?>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.register.gender'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="form-radio">
											<div class="form-w">
												<div class="block-input-radio">
													<?php 
								                		echo $this->Form->radio('OtherGuarantor.gender', array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required'=>false, 'data-placement'=>'right'));
								              		?>	
												</div>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.register.birthday'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="select">
											<?php 
						                      	$years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
						                  		echo $this->Form->select('OtherGuarantor.year_of_birth', $years, array('div'=>false, 'label'=>false, 'id'=>'og−year', 'onchange'=>'og_calculate_age()', 'required'=>false, 'data-placement'=>'right'));
						                	?>
											<span><?php echo __('user.register.year'); ?></span>
											<?php 
						    	              	$months = array_combine(range(1, 12), range(1, 12));
						                  		echo $this->Form->select('OtherGuarantor.month_of_birth', $months, array('div'=>false, 'label'=>false, 'id'=>'month', 'required'=>false, 'data-placement'=>'right'));
						                	?>
											<span><?php echo __('user.register.month'); ?></span>
											<?php 
						    	              	$dates = array_combine(range(1, 31), range(1, 31));
						                  		echo $this->Form->select('OtherGuarantor.day_of_birth', $dates, array('div'=>false, 'label'=>false, 'id'=>'day', 'required'=>false, 'data-placement'=>'right'));
						                	?>
											<span><?php echo __('user.register.day'); ?></span>
											<span class="style" id="og-age">0</span>
											<span class="style"><?php echo __('user.register.age'); ?></span>
											<!-- Script tinh tuoi -->
				                            <script type="text/javascript">
							                    var d = new Date();
							                    var n = d.getFullYear();
							                    $("#og-age").html(n - $("#og−year").val());
							                    function og_calculate_age(){
							                      $("#og-age").html(n - $("#og−year").val());
							                    }
						                    </script>
				                            <!-- End script -->
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.register.married'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="form-radio">
											<div class="form-w">
												<div class="block-input-radio">
													<?php 
									                    echo $this->Form->radio('OtherGuarantor.married_status_id', $married_statuses, array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'required'=>false, 'data-placement'=>'right'));
									                ?>
												</div>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.basic_info.family'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="form-radio">
											<div class="form-w">
												<div class="block-input-radio">
													<?php 
									                    echo $this->Form->radio('OtherGuarantor.live_with_family', array("1"=>__('user.my_page.basic_info.have_family'),"2"=>__('user.my_page.basic_info.alone')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'required'=>false, 'data-placement'=>'right'));
									                ?>
												</div>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.basic_info.num_children'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="block-input">
											<?php echo $this->Form->input('OtherGuarantor.num_child', array('type'=>'text', 'id'=>"num_child", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
											?>
											<span class="w-auto1"><?php echo __('user.my_page.basic_info.person'); ?></span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.guarantor.relationship'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="block-input">
											<?php echo $this->Form->input('OtherGuarantor.relate', array('type'=>'text', 'id'=>"relate", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right'))
											?>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="title-tab title-tab-fix-mb title-tab-fix-mt">
					<h3>連帯保証人住所情報</h3>
				</div>
				<div class="content-from-how">
					<table class="from">
						<tbody>
							<tr>
								<td class="label-text"><label><?php echo __('user.register.address'); ?></label><span><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input">
										<span class="w-auto1"><?php echo __('user.register.post'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.post_num_1', array('type'=>'text', 'id'=>"og_post_num_1", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
										<span class="w-auto1">-</span>
										<?php echo $this->Form->input('OtherGuarantor.post_num_2', array('type'=>'text', 'id'=>"og_post_num_2", 'label'=>false, 'class'=>'w80', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
										<a href="javascript:void(0)" type="button" class="style-link" id="btn-g-find-address" onclick="javascript:find_og_address($(this));"><?php echo __('user.register.findaddress'); ?></a>
										<!-- Script tim dia chi buu dien -->
				                          <script type="text/javascript">
				                            function find_og_address(obj){
				                            	$.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#og_post_num_1').val().trim() + $('#og_post_num_2').val().trim()}, 
						                        function(json) {
						                            $("#og_pref_id").val(json.pref_id);
						                            $("#og_city").val(json.ward);
						                            $("#og_address").val(json.addr1);
						                        });
				                          }
				                          </script>
				                        <!-- End script -->
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.pref'); ?></span>
										<div class="select">
											<?php 
							                  	echo $this->Form->select('OtherGuarantor.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'og_pref_id', 'empty'=>'--------', 'required'=>false, 'data-placement'=>'right'));
							                ?>
										</div>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.city'); ?></span>
										<?php 
						                    echo $this->Form->input('OtherGuarantor.city', array('type'=>'text', 'id'=>"og_city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'maxlength'=>false));
						                ?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.street'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.address', array('type'=>'text', 'id'=>"og_address", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.house'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.house_name', array('type'=>'text', 'id'=>"og_house_name", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>right))
										?>
									</div>
								</td>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.basic_info.residence'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="select">
											<?php echo $this->Form->select('OtherGuarantor.residence_id', $residences, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'residence_id', 'required'=>false, 'data-placement'=>'right', 'empty'=>'--------')); 
											?>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.basic_info.year_residence'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="block-input">
											<?php echo $this->Form->input('OtherGuarantor.year_residence', array('type'=>'text', 'id'=>"year_residence", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
											?>
											<span class="w-auto1"><?php echo __('user.register.year'); ?></span>
										</div>
									</td>
								</tr>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="title-tab title-tab-fix-mb title-tab-fix-mt">
					<h3>連帯保証人連絡先情報</h3>
				</div>
				<div class="content-from-how">
					<table class="from">
						<tbody>
							<tr>
								<td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label><span><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input fix-padding">
										<div class="div-style">
											<span class="w78"><?php echo __('user.register.mobiphone'); ?></span>
											<?php echo $this->Form->input('OtherGuarantor.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
											?>
										</div>
										<div class="div-style">
											<span class="w43"><?php echo __('user.register.homephone'); ?></span>
											<?php echo $this->Form->input('OtherGuarantor.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right'))
											?>
										</div>
									</div>
									<span class="black">※どちらかひとつ必須。”-”ハイフンなしで入力してください。</span>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.contact_type'); ?></label><span><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="form-radio">
										<div class="form-w">
											<div class="block-input-radio">
												<?php 
							                		echo $this->Form->radio('OtherGuarantor.contact_type_id', array('1'=>__('user.register.mobiphone'),'2'=>__('user.my_page.basic_info.home_phone'),'3'=>__('user.my_page.basic_info.work_phone')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'data-placement'=>'right'));
							              		?>
											</div>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="title-tab title-tab-fix-mb title-tab-fix-mt">
					<h3>連帯保証人勤務先情報</h3>
				</div>
				<div class="content-from-how">
					<table class="from">
						<tbody>
							<tr>
								<td class="label-text"><label><?php echo __('user.register.work'); ?></label><span><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="select">
										<?php 
						                    echo $this->Form->select('OtherGuarantor.work_id', $works, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'data-placement'=>'right', 'required'=>false));
						                ?>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.register.address'); ?></label><span><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input">
										<span class="w78"><?php echo __('user.my_page.basic_info.company_name'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.company', array('type'=>'text', 'id'=>"og-company", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right'))
										?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.company_kana', array('type'=>'text', 'id'=>"og-company-kana", 'label'=>false, 'class'=>'w198', 'div'=>false))
										?>
									</div>
									<script type="text/javascript">
				                    	$(this).autoKana('#og-company', '#og-company-kana', {katakana:true, toggle:false});
				                  	</script>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.register.address'); ?></label></td>
								<td>
									<div class="block-input">
										<span class="w-auto1"><?php echo __('user.register.post'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.company_post_num_1', array('type'=>'text', 'id'=>"og_company_post_num_1", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement'=>'right'))
										?>
										<span class="w-auto1">-</span>
										<?php echo $this->Form->input('OtherGuarantor.company_post_num_2', array('type'=>'text', 'id'=>"og_company_post_num_2", 'label'=>false, 'class'=>'w80', 'div'=>false, 'data-placement'=>'right'))
										?>
										<a href="javascript:void(0)" type="button" class="style-link" id="btn-guarantor-company-address" onclick="javascript:find_address2($(this));"><?php echo __('user.register.findaddress'); ?></a>
										<!-- Script tim dia chi buu dien -->
				                          <script type="text/javascript">
				                            function find_address2(obj){
				                            	$.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#og_company_post_num_1').val().trim() + $('#og_company_post_num_2').val().trim()}, 
						                        function(json) {
						                            $("#og_company_pref_id").val(json.pref_id);
						                            $("#og_company_city").val(json.ward);
						                            $("#og_company_address").val(json.addr1);
						                        });
				                          }
				                          </script>
				                        <!-- End script -->
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.pref'); ?></span>
										<div class="select">
											<?php 
							                  	echo $this->Form->select('OtherGuarantor.company_pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'og_company_pref_id', 'empty'=>'--------'));
							                ?>
										</div>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.city'); ?></span>
										<?php 
						                    echo $this->Form->input('OtherGuarantor.company_city', array('type'=>'text', 'id'=>"og_company_city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'maxlength'=>false));
						                ?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.street'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.company_address', array('type'=>'text', 'id'=>"og_company_address", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right'))
										?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.house'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.company_house_name', array('type'=>'text', 'id'=>"og_company_house_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label></td>
								<td>
									<div class="block-input fix-padding">
										<div class="div-style">
										<?php echo $this->Form->input('OtherGuarantor.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
										<span class="style">※”-”ハイフンなしで入力してください。</span>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.fax'); ?></label></td>
								<td>
									<div class="block-input fix-padding">
										<div class="div-style">
											<?php echo $this->Form->input('OtherGuarantor.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right'))
											?>
											<span class="style">※”-”ハイフンなしで入力してください。</span>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.career'); ?></label></td>
								<td>
									<div class="select">
										<?php echo $this->Form->select('OtherGuarantor.career_id', $careers, array('class'=>'w198','div'=>false, 'label'=>false, 'id'=>'carrer_id', 'empty'=>'--------', 'required'=>false, 'data-placement'=>'right'));
										?>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.description'); ?></label></td>
								<td>
									<?php echo $this->Form->input('OtherGuarantor.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required'=>false, 'data-placement'=>'right'))
									?>
								</td>
							</tr>
							<tr>
								<td class="label-text">
									<label><?php echo __('user.my_page.basic_info.department'); ?></label>
								</td>
								<td>
									<?php echo $this->Form->input('OtherGuarantor.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required'=>false, 'data-placement'=>'right'))
									?>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.position'); ?></label></td>
								<td>
									<?php echo $this->Form->input('OtherGuarantor.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required'=>false, 'data-placement'=>'right'))
									?>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.register.experience'); ?></label></td>
								<td>
									<div class="block-input">
										<?php echo $this->Form->input('OtherGuarantor.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
										<span class="w-auto1"><?php echo __('user.register.year'); ?></span>
										<?php echo $this->Form->input('OtherGuarantor.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
										<span class="w-auto1"><?php echo __('user.register.month'); ?></span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_type'); ?></label><span><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="form-radio">
										<div class="form-w">
											<div class="block-input-radio">
												 <?php 
					                                echo $this->Form->radio('OtherGuarantor.salary_type', array('1'=>__('user.my_page.basic_info.salary_fix'),'2'=>__('user.my_page.basic_info.salary_bonus'), '3'=>__('user.my_page.basic_info.salary_product'), "4"=>__('global.other')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'id'=>'salary_type', 'onchange'=>'og_change_type($(this))', 'data-placement'=>'right'));
					                            ?>
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
					                            <?php 
					                                echo $this->Form->input('OtherGuarantor.salary_type_other', array('type'=>'text', 'id'=>"og_salary_type_other", 'label'=>false, 'class'=>'w40 input-style fix-pd','div'=>false, 'disabled'=>true, 'data-placement'=>'right', 'style'=>'width: 100px'))
					                            ?>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.register.tax'); ?></label></td>
								<td>
									<div class="block-input">
										<?php echo $this->Form->input('OtherGuarantor.income_month', array('type'=>'text', 'id'=>"salary_month", 'label'=>false, 'class'=>'w108','div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
										<span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_year'); ?></label></td>
								<td>
									<div class="block-input">
										<?php echo $this->Form->input('OtherGuarantor.income_year', array('type'=>'text', 'id'=>"salary_year", 'label'=>false, 'class'=>'w108','div'=>false, 'required'=>false, 'data-placement'=>'right'))
										?>
										<span class="w-auto1"><?php echo __('user.my_page.basic_info.salary_man'); ?></span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_receive'); ?></label></td>
								<td>
									<div class="form-radio">
										<div class="form-w">
											<div class="block-input-radio">
												<?php 
							                		echo $this->Form->radio('OtherGuarantor.salary_receive_id', array('1'=>__('user.my_page.basic_info.salary_day'),'2'=> __('user.my_page.basic_info.salary_week'), '3'=>__('user.my_page.basic_info.salary_month')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'data-placement'=>'right', 'id'=>'salary_receive', 'onchange'=>'og_change_type_date($(this))')); 
							                	?>
											</div>
											<script type="text/javascript">
				                                function og_change_type(obj){
				                                    if(obj.val() == '3')
				                                    $('#og_salary_date').prop('disabled',false);
				                                    else {
				                                      $('#og_salary_date').prop('disabled',true);
				                                    }
				                                }
				                            </script>  
											<div class="style-a">
												<label for="11"><?php echo __('user.my_page.basic_info.salary_date'); ?></label>
												<?php 
													echo $this->Form->input('OtherGuarantor.salary_date', array('type'=>'text', 'id'=>"og_salary_date", 'label'=>false, 'class'=>'w40','div'=>false, 'required'=>false, 'data-placement'=>'right'))
	              								?>
												<label for="11"><?php echo __('global.date'); ?></label>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.insurances'); ?></label><span><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="select">
										<?php 
						                    echo $this->Form->select('OtherGuarantor.insurance_id', $insurances, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'required'=>false, 'data-placement'=>'right'));
						                ?>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.note'); ?></label></td>
								<td>
									<span class="black style">※派遣社員の方は派遣先、出向中の方は出向先、入社6ヶ月以下の方は前職の情報を入力ください。<br>※未就業（職業が専業主婦／主夫、無職、その他の方）で収入がある場合、詳細な情報を記載ください。</span>
									<?php echo $this->Form->input('OtherGuarantor.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'div'=>false, 'required'=>false, 'rows'=>4, 'cols'=>50))
									?>
								</td>
							</tr>
						</tbody>
						<?php echo $this->Form->hidden('OtherGuarantor.id')?>
					</table>
				</div>
				<?php if($user['User']['status_id'] == 2){?>
              <div class="button-tab">
					<!-- <a href="#" class="link-tab-1a"><img src="img/front/link-tab-3.png" alt="変更する"></a> -->
					<!-- <a href="#" class="link-tab-1b"><img src="img/front/link-tab-3b.png" alt="キャンセル"/></a> -->
					<button type="button" class="link-tab-1a" id="btn-edit-other-guarantor"><img src="<?php echo $this->webroot; ?>img/front/Update.png" alt="Update"></button>
		            <button type="submit" class="link-tab-1a" id="btn-save-other-guarantor"><img src="<?php echo $this->webroot; ?>img/front/Save.png" alt="Save"></button>
		            <button type="button" class="link-tab-1b" id="btn-cancel-other-guarantor"><img src="<?php echo $this->webroot; ?>img/front/Update.png" alt="Cancel"></button>
				</div>
              <?php }
              else {?>
                <script type="text/javascript" charset="utf-8" async defer>
                

                </script>
              <?php }?>
               
                <script type="text/javascript" >
                $(this).autoKana('#og_first_name', '#og_first_name_kana', {katakana:true, toggle:false});
        		$(this).autoKana('#og_last_name', '#og_last_name_kana', {katakana:true, toggle:false});
                var og_edit;
                $( document ).ready(function() {
                  if(og_edit != 1){
                    
                    $('#btn-edit-other-guarantor').show();
                    $('#btn-save-other-guarantor').hide();
                    $('#btn-cancel-other-guarantor').hide();
                    $('#OtherGuarantorEdit').find(':input:not(#btn-edit-other-guarantor)').prop('disabled',true);
                     $('#OtherGuarantorEdit').find('a:not(#btn-edit-other-guarantor)').hide();
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
                      $('#OtherGuarantorEdit').find('a').show();
                      $('#btn-cancel-other-guarantor').show();
                      $('#btn-save-other-guarantor').show();
                      
                     
                      $('#btn-edit-other-guarantor').hide();
                      og_edit = 1;

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

                              og_edit = 0;
                              $('#other_guarantor').html(result);
                            }
                        });

                   });
                  
                </script>
              	<!-- END MAIN SCRIPT -->
				</form>
			</div>
		</div>
	</div>
</div>

<!-- SCRIPT VALIDATION -->
<script>
  $.validator.addMethod(
    "phone_number",
    function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    },
    "携帯電話を正しく入力してください。"
  );
  $("#OtherGuarantorEdit").validate({
    rules: {
    	'data[OtherGuarantor][num_child]': {number: true},
    	'data[OtherGuarantor][post_num_1]': {
    		number: true,
    		minlength: 3,
    		maxlength: 3
    	},
    	'data[OtherGuarantor][post_num_2]': {
    		number: true,
    		minlength: 4,
    		maxlength: 4
    	},
    	'data[OtherGuarantor][year_residence]': {number: true},
    	'data[OtherGuarantor][phone]': {
    		// required: function(element) {
      //           return !$("#home_phone").val();
      //        },
                number: true,
                maxlength: 10,
                phone_number: "^0[0-9]{9}"
    		},
    	'data[OtherGuarantor][home_phone]': {
    		// required: function(element) {
      //           return  !$("#phone").val();
      //         },
                number: true,
                maxlength: 10,
                phone_number: "[0-9]{11}"
        },
        'data[OtherGuarantor][company_post_num_1]': {
        	number: true,
        	minlength: 3,
        	maxlength: 3
        },
        'data[OtherGuarantor][company_post_num_2]': {
        	number: true,
        	minlength: 4,
        	maxlength: 4
        },
        'data[OtherGuarantor][company_phone]': {
        	number: true,
        	maxlength: 10,
        	phone_number: "^0[0-9]{9}"
        },
        'data[OtherGuarantor][company_fax]': {
        	number: true,
        	maxlength: 10
        },
        'data[OtherGuarantor][year_worked]': {number: true},
        'data[OtherGuarantor][month_worked]': {number: true},
        'data[OtherGuarantor][income_month]': {number: true},
        'data[OtherGuarantor][income_year]': {number: true},
        'data[OtherGuarantor][salary_type_other]': {
        	required: {
                depends: function() {
                  return $('input[name="data[OtherGuarantor][salary_type]"]:checked').val() == '4';
                }
            },
            number: true
      	},
      	'data[OtherGuarantor][salary_date]': {
        	required: {
                depends:  function() {
                  return $('input[name="data[OtherGuarantor][salary_receive_id]"]:checked').val() == '3';
                }
            },
            number: true
      	}
    },
    messages: {
    	'data[OtherGuarantor][post_num_1]': {
    		minlength: "<?php echo __('global.errors.minlength_3'); ?>",
    		maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
    	},
    	'data[OtherGuarantor][post_num_2]': {
    		minlength: "<?php echo __('global.errors.minlength_4'); ?>",
    		maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
    	},
    	'data[OtherGuarantor][company_post_num_1]': {
    		minlength: "<?php echo __('global.errors.minlength_3'); ?>",
    		maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
    	},
    	'data[OtherGuarantor][company_post_num_2]': {
    		minlength: "<?php echo __('global.errors.minlength_4'); ?>",
    		maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
    	},
    	'data[OtherGuarantor][salary_type_other]': {required: "<?php echo __('global.errors.required'); ?>"},
    	'data[OtherGuarantor][salary_date]': {required: "<?php echo __('global.errors.required'); ?>"},
    	'data[OtherGuarantor][company_phone]': {maxlength: "<?php echo __('global.errors.minlength_10'); ?>"},
    	'data[OtherGuarantor][company_fax]': {maxlength: "<?php echo __('global.errors.minlength_10'); ?>"},
    	'data[OtherGuarantor][phone]': {maxlength: "<?php echo __('global.errors.minlength_10'); ?>"},
    	'data[OtherGuarantor][home_phone]': {maxlength: "<?php echo __('global.errors.minlength_10'); ?>"}
    },
    invalidHandler: function(event, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        $("#error-section").show();
      } else {
        $("#error-section").hide();
      }
    },
    submitHandler: function(form) {
       var url = "<?php echo $this->webroot;?>user_guarantors/edit_other_guarantor"; // the script where you handle the form input.

      $.ajax({
             type: "POST",
             url: url,
             data: $("#OtherGuarantorEdit").serialize(), // serializes the form's elements.
             success: function(result)
             {
                 og_edit = 0;
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
    }
  });
  jQuery.extend(jQuery.validator.messages, {
    	number: "<?php echo __('global.errors.number'); ?>"
  });
</script>
<!-- END SCRIPT VALIDATION -->

