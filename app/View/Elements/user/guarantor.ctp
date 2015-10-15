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
	            <?php echo $this->Form->create("User", array('action'=>'edit','id'=>'UserGuarantorEdit', 'inputDefaults' => array(
        	'format' => array('before', 'label', 'between', 'input', 'after' )))) ?>
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
												<?php echo $this->Form->input('UserGuarantor.first_name', array('type'=>'text', 'id'=>"g_first_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'例）山田'))
												?>
											</div>
											<div class="div-style">
												<span class="w-auto"><?php echo __('user.register.lastname'); ?></span>
												<?php echo $this->Form->input('UserGuarantor.last_name', array('type'=>'text', 'id'=>"g_last_name", 'label'=>false, 'class'=>'w198', 'div'=>false , 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'太郎'))
												?>
											</div>
										</div>
										<div class="block-input">
											<div class="div-style">
												<span class="w-auto"><?php echo __('user.register.firstnamekana'); ?></span>
												<?php echo $this->Form->input('UserGuarantor.first_name_kana', array('type'=>'text', 'id'=>"g_first_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'ヤマダ'))
												?>
											</div>
											<div class="div-style">
												<span class="w-auto"><?php echo __('user.register.lastnamekana'); ?></span>
												<?php echo $this->Form->input('UserGuarantor.last_name_kana', array('type'=>'text', 'id'=>"g_last_name_kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'タロウ'))?>
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
								                		echo $this->Form->radio('UserGuarantor.gender', array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male", 'required'=>false, 'data-placement'=>'right'));
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
						                      	$years = array_combine(  range(1900, date("Y")), range(1900, date("Y")));
						                  		echo $this->Form->select('UserGuarantor.year_of_birth', $years, array('div'=>false, 'label'=>false, 'id'=>'g_year', 'onchange'=>'g_calculate_age()', 'required'=>false, 'data-placement'=>'right', 'empty'=>'----'));
						                	?>
											<span><?php echo __('user.register.year'); ?></span>
											<?php 
						    	              	$months = array_combine(range(1, 12), range(1, 12));
						                  		echo $this->Form->select('UserGuarantor.month_of_birth', $months, array('div'=>false, 'label'=>false, 'id'=>'g_month', 'required'=>false, 'data-placement'=>'right', 'empty'=>'--', 'onchange'=>'g_calculate_age()'));
						                	?>
											<span><?php echo __('user.register.month'); ?></span>
											<?php 
						    	              	$dates = array_combine(range(1, 31), range(1, 31));
						                  		echo $this->Form->select('UserGuarantor.day_of_birth', $dates, array('div'=>false, 'label'=>false, 'id'=>'g_day', 'required'=>false, 'data-placement'=>'right', 'empty'=>'--', 'onchange'=>'g_calculate_age()'));
						                	?>
											<span><?php echo __('user.register.day'); ?></span>
											<span class="style" id="g_age">0</span>
											<span class="style"><?php echo __('user.register.age'); ?></span>
											<!-- Script tinh tuoi -->
				                            <script type="text/javascript">
							                    // var d = new Date();
							                    // var n = d.getFullYear();
							                    // if ($("#g−year").val() == "") {
							                    // 	$("#g-age").html("00");
							                    // } else {
							                    // 	$("#g-age-1").html(n - $("#g1−year").val());
							                    // }
							                    // function g_calculate_age1(){
							                    //   $("#g-age-1").html(n - $("#g1−year").val());
							                    // }

						                    g_calculate_age();
			                                function g_calculate_age(){
			                                  //alert($("#g−year").val());
			                                  if($('#g_year').val() && $('#g_month').val() && $('#g_day').val()){
			                                   
			                                    age = calculateAge($('#g_year').val(), $('#g_month').val(), $('#g_day').val() );
			                                    //alert(age);

			                                  }
			                                  else {
			                                    age = "";
			                                  }

			                                  $("#g_age").html(age);

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
									                    echo $this->Form->radio('UserGuarantor.married_status_id', $married_statuses, array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'required'=>false, 'data-placement'=>'right'));
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
									                    echo $this->Form->radio('UserGuarantor.live_with_family', array(1=>__('user.my_page.basic_info.have_family'),0=>__('user.my_page.basic_info.alone')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1, 'required'=>false, 'data-placement'=>'right', 'default'=>1));
									                ?>
												</div>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.basic_info.num_children'); ?></label><span></td>
									<td>
										<div class="block-input">
											<?php echo $this->Form->input('UserGuarantor.num_child', array('type'=>'text', 'id'=>"num_child", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'00'))
											?>
											<span class="w-auto1"><?php echo __('user.my_page.basic_info.person'); ?></span>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.guarantor.relationship'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="block-input">
											<?php echo $this->Form->input('UserGuarantor.relate', array('type'=>'text', 'id'=>"relate", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'例）長男、次女、父、母、叔父など'))
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
										<?php echo $this->Form->input('UserGuarantor.post_num_1', array('type'=>'text', 'id'=>"g_post_num_1", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'101'))
										?>
										<span class="w-auto1">-</span>
										<?php echo $this->Form->input('UserGuarantor.post_num_2', array('type'=>'text', 'id'=>"g_post_num_2", 'label'=>false, 'class'=>'w80', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'0000'))
										?>
										<a href="javascript:void(0)" type="button" class="style-link" id="btn-g-find-address" onclick="javascript:find_address1($(this));"><?php echo __('user.register.findaddress'); ?></a>
										<!-- Script tim dia chi buu dien -->
				                          <script type="text/javascript">
				                            function find_address1(obj){
				                            	$.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#g_post_num_1').val().trim() + $('#g_post_num_2').val().trim()}, 
						                        function(json) {
						                            $("#g_pref_id").val(json.pref_id);
						                            $("#g_city").val(json.ward);
						                            $("#g_address").val(json.addr1);
						                        });
				                          }
				                          </script>
				                        <!-- End script -->
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.pref'); ?></span>
										<div class="select">
											<?php 
							                  	echo $this->Form->select('UserGuarantor.pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'g_pref_id', 'empty'=>'--------', 'required'=>false, 'data-placement'=>'right'));
							                ?>
										</div>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.city'); ?></span>
										<?php 
						                    echo $this->Form->input('UserGuarantor.city', array('type'=>'text', 'id'=>"g_city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'maxlength'=>false, 'placeholder'=>'千代田区神田多町'));
						                ?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.street'); ?></span>
										<?php echo $this->Form->input('UserGuarantor.address', array('type'=>'text', 'id'=>"g_address", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'2-14-17'))
										?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.house'); ?></span>
										<?php echo $this->Form->input('UserGuarantor.house_name', array('type'=>'text', 'id'=>"g_house_name", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>right, 'placeholder'=>'グレイス高輪ビル８階'))
										?>
									</div>
								</td>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.basic_info.residence'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="select">
											<?php echo $this->Form->select('UserGuarantor.residence_id', $residences, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'residence_id', 'required'=>false, 'data-placement'=>'right', 'empty'=>'--------')); 
											?>
										</div>
									</td>
								</tr>
								<tr>
									<td class="label-text"><label><?php echo __('user.my_page.basic_info.year_residence'); ?></label><span><?php echo __('global.require'); ?></span></td>
									<td>
										<div class="block-input">
											<?php echo $this->Form->input('UserGuarantor.year_residence', array('type'=>'text', 'id'=>"year_residence", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'00'))
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
											<?php echo $this->Form->input('UserGuarantor.phone', array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'required'=>false, 'placeholder'=>'例）09012345678'))
											?>
										</div>
										<div class="div-style">
											<span class="w43"><?php echo __('user.register.homephone'); ?></span>
											<?php echo $this->Form->input('UserGuarantor.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'0312345678'))
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
							                		echo $this->Form->radio('UserGuarantor.contact_type_id', array('1'=>__('user.register.mobiphone'),'2'=>__('user.my_page.basic_info.home_phone'),'3'=>__('user.my_page.basic_info.work_phone')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'data-placement'=>'right'));
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
						                    echo $this->Form->select('UserGuarantor.work_id', $works, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'g_work_id', 'empty'=>'--------', 'data-placement'=>'right','required'=>false, 'onchange'=>'show_g_company_required_field()'));
						                ?>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.partner.company'); ?></label><span id="g_company_required_label_0"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input">
										<span class="w78"><?php echo __('user.my_page.basic_info.company_name'); ?></span>
										<?php echo $this->Form->input('UserGuarantor.company', array('type'=>'text', 'id'=>"g-company", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'placeholder'=>'例）株式会社ヤチンデモラエル'))
										?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.my_page.basic_info.company_name_kana'); ?></span>
										<?php echo $this->Form->input('UserGuarantor.company_kana', array('type'=>'text', 'id'=>"g-company-kana", 'label'=>false, 'class'=>'w198', 'div'=>false, 'placeholder'=>'カブシキガイシャヤチンデモラエル'))
										?>
									</div>
									<script type="text/javascript">
				                    	$(this).autoKana('#g-company', '#g-company-kana', {katakana:false, toggle:false});
				                  	</script>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.guarantor.address'); ?></label><span id="g_company_required_label_1"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input">
										<span class="w-auto1"><?php echo __('user.register.post'); ?></span>
										<?php echo $this->Form->input('UserGuarantor.company_post_num_1', array('type'=>'text', 'id'=>"g_company_post_num_1", 'label'=>false, 'class'=>'w40', 'div'=>false, 'data-placement'=>'right', 'placeholder'=>'101'))
										?>
										<span class="w-auto1">-</span>
										<?php echo $this->Form->input('UserGuarantor.company_post_num_2', array('type'=>'text', 'id'=>"g_company_post_num_2", 'label'=>false, 'class'=>'w80', 'div'=>false, 'data-placement'=>'right', 'placeholder'=>'0000'))
										?>
										<a href="javascript:void(0)" type="button" class="style-link" id="btn-guarantor-company-address" onclick="javascript:find_address($(this));"><?php echo __('user.register.findaddress'); ?></a>
										<!-- Script tim dia chi buu dien -->
				                          <script type="text/javascript">
				                            function find_address(obj){
				                            	$.getJSON('<?php echo $this->webroot;?>zipcode/find_address', {zipcode: $('#g_company_post_num_1').val().trim() + $('#g_company_post_num_2').val().trim()}, 
						                        function(json) {
						                            $("#g_company_pref_id").val(json.pref_id);
						                            $("#g_company_city").val(json.ward);
						                            $("#g_company_address").val(json.addr1);
						                        });
				                          }
				                          </script>
				                        <!-- End script -->
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.pref'); ?></span>
										<div class="select">
											<?php 
							                  	echo $this->Form->select('UserGuarantor.company_pref_id', $prefs, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'g_company_pref_id', 'empty'=>'--------'));
							                ?>
										</div>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.city'); ?></span>
										<?php 
						                    echo $this->Form->input('UserGuarantor.company_city', array('type'=>'text', 'id'=>"g_company_city", 'label'=>false, 'class'=>'w198', 'div'=>false, 'data-placement'=>'right', 'maxlength'=>false, 'placeholder'=>'千代田区神田多町'));
						                ?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.street'); ?></span>
										<?php echo $this->Form->input('UserGuarantor.company_address', array('type'=>'text', 'id'=>"g_company_address", 'label'=>false, 'class'=>'w198','div'=>false, 'data-placement'=>'right', 'placeholder'=>'2-14-17'))
										?>
									</div>
									<div class="block-input">
										<span class="w78"><?php echo __('user.register.house'); ?></span>
										<?php echo $this->Form->input('UserGuarantor.company_house_name', array('type'=>'text', 'id'=>"g_company_house_name", 'label'=>false, 'class'=>'w198', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'グレイス高輪ビル８階'))
										?>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.contact.company-phone'); ?></label><span id="g_company_required_label_2"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input fix-padding">
										<div class="div-style">
										<?php echo $this->Form->input('UserGuarantor.company_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'例）09012345678'))
										?>
										<span class="style">※”-”ハイフンなしで入力してください。</span>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.fax'); ?></label><span id="g_company_required_label_3"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input fix-padding">
										<div class="div-style">
											<?php echo $this->Form->input('UserGuarantor.company_fax', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w198','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'例）0312345678'))
											?>
											<span class="style">※”-”ハイフンなしで入力してください。</span>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.career'); ?></label><span id="g_company_required_label_4"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="select">
										<?php echo $this->Form->select('UserGuarantor.career_id', $careers, array('class'=>'w198','div'=>false, 'label'=>false, 'id'=>'carrer_id', 'empty'=>'--------', 'required'=>false, 'data-placement'=>'right'));
										?>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.description'); ?></label><span id="g_company_required_label_5"><?php echo __('global.require'); ?></span></td>
								<td>
									<?php echo $this->Form->input('UserGuarantor.company_job_desc', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'例）病院での薬剤師(医療事務)業務、建設会社での営業(設土木作業)業務など'))
									?>
								</td>
							</tr>
							<tr>
								<td class="label-text">
									<label><?php echo __('user.my_page.basic_info.department'); ?></label><span id="g_company_required_label_6"><?php echo __('global.require'); ?></span>
								</td>
								<td>
									<?php echo $this->Form->input('UserGuarantor.company_department', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'例）営業部 第一営業課'))
									?>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.position'); ?></label><span id="g_company_required_label_7"><?php echo __('global.require'); ?></span></td>
								<td>
									<?php echo $this->Form->input('UserGuarantor.company_position', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40 input-style','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'例）部長、課長、次長、係長、主任など'))
									?>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.register.experience'); ?></label><span id="g_company_required_label_8"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input">
										<?php echo $this->Form->input('UserGuarantor.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'00'))
										?>
										<span class="w-auto1"><?php echo __('user.register.year'); ?></span>
										<?php echo $this->Form->input('UserGuarantor.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'w40', 'div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'00'))
										?>
										<span class="w-auto1"><?php echo __('user.landing-page.month'); ?></span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_type'); ?></label><span id="g_company_required_label_9"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="form-radio">
										<div class="form-w">
											<div class="block-input-radio">
												 <?php 
					                                echo $this->Form->radio('UserGuarantor.salary_type', array('1'=>__('user.my_page.basic_info.salary_fix'),'2'=>__('user.my_page.basic_info.salary_bonus'), '3'=>__('user.my_page.basic_info.salary_product'), "4"=>__('global.other')), array( 'class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1", 'id'=>'salary_type', 'onchange'=>'g_change_type($(this))', 'data-placement'=>'right'));
					                            ?>
					                            <script type="text/javascript">
					                                function g_change_type(obj){
					                                    if(obj.val() == '4')
					                                    	$('#g_salary_type_other').prop('disabled',false);
					                                    else {
					                                      	$('#g_salary_type_other').val("").prop('disabled',true);
					                                    }
					                                }
					                            </script>  
					                          </div>
					                            <?php 
					                                echo $this->Form->input('UserGuarantor.salary_type_other', array('type'=>'text', 'id'=>"g_salary_type_other", 'label'=>false, 'class'=>'w40 input-style fix-pd','div'=>false, 'disabled'=> $user['UserGuarantor']['salary_type'] != 4, 'data-placement'=>'right', 'style'=>'width: 100px'))
					                            ?>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.register.tax'); ?></label><span id="g_company_required_label_10"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input">
										<?php echo $this->Form->input('UserGuarantor.income_month', array('type'=>'text', 'id'=>"g_income_month", 'label'=>false, 'class'=>'w108','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'000,000'))
										?>
										<span class="w-auto1"><?php echo __('user.register.yen'); ?></span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_year'); ?></label><span id="g_company_required_label_11"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="block-input">
										<?php echo $this->Form->input('UserGuarantor.income_year', array('type'=>'text', 'id'=>"g_income_year", 'label'=>false, 'class'=>'w108','div'=>false, 'required'=>false, 'data-placement'=>'right', 'placeholder'=>'000,000'))
										?>
										<span class="w-auto1"><?php echo __('user.my_page.basic_info.salary_man'); ?></span>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.salary_receive'); ?></label><span id="g_company_required_label_12"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="form-radio">
										<div class="form-w">
											<div class="block-input-radio">
												<?php 
							                		echo $this->Form->radio('UserGuarantor.salary_receive_id', array('1'=>__('user.my_page.basic_info.salary_day'),'2'=> __('user.my_page.basic_info.salary_week'), '3'=>__('user.my_page.basic_info.salary_month')), array('class'=>'radio fix-pd', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"3", 'data-placement'=>'right', 'id'=>'salary_receive', 'onchange'=>'g_change_type_date($(this))')); 
							                	?>
											</div>
											<script type="text/javascript">
					                              function g_change_type_date(obj){
					                                  if(obj.val() == '3')
					                                  $('#g_salary_date').prop('disabled',false);
					                                  else {
					                                    $('#g_salary_date').val("").prop('disabled',true);
					                                  }
					                              }
					                          </script>
											<div class="style-a">
												<label for="11"><?php echo __('user.my_page.basic_info.salary_date'); ?></label>
												<?php 
													echo $this->Form->input('UserGuarantor.salary_date', array('type'=>'text', 'id'=>"g_salary_date", 'label'=>false, 'class'=>'w40','div'=>false, 'placeholder'=>'25', 'required'=>false, 'data-placement'=>'right', 'disabled'=> $user['UserGuarantor']['salary_receive_id'] != 3))
	              								?>
												<label for="11"><?php echo __('global.date'); ?></label>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.insurances'); ?></label><span id="g_company_required_label_13"><?php echo __('global.require'); ?></span></td>
								<td>
									<div class="select">
										<?php 
						                    echo $this->Form->select('UserGuarantor.insurance_id', $insurances, array('class'=>'w198', 'div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'--------', 'required'=>false, 'data-placement'=>'right'));
						                ?>
									</div>
								</td>
							</tr>
							<tr>
								<td class="label-text"><label><?php echo __('user.my_page.basic_info.note'); ?></label></td>
								<td>
									<span class="black style">※派遣社員の方は派遣先、出向中の方は出向先、入社6ヶ月以下の方は前職の情報を入力ください。<br>※未就業（職業が専業主婦／主夫、無職、その他の方）で収入がある場合、詳細な情報を記載ください。</span>
									<?php echo $this->Form->input('UserGuarantor.note', array('type'=>'textarea', 'id'=>"title", 'label'=>false, 'div'=>false, 'required'=>false, 'rows'=>4, 'cols'=>50))
									?>
								</td>
							</tr>
						</tbody>
						<?php echo $this->Form->hidden('UserGuarantor.id')?>
					</table>
					<script type="text/javascript">
		                show_g_company_required_field();
		               //function check required
		               function show_g_company_required_field(){
		                  var work_id = $("#g_work_id").val();
		                  if(work_id){
		                    var work = new Array(13, 13);
		                 

		                    work[1] =  Array(1, 1, 1, 0, 1, 1 , 1, 0, 1, 1, 1, 1, 1, 1);
		                    work[2] =  Array(1, 1, 1, 0, 1, 1 , 1, 1, 1, 1, 1, 1, 1, 1);
		                    work[3] =  Array(1, 1, 1, 0, 1, 1 , 1, 0, 1, 1, 1, 1, 1, 1);
		                    work[4] =  Array(1, 1, 1, 0, 1, 1 , 1, 0, 1, 1, 1, 1, 1, 1);
		                    work[5] =  Array(0, 1, 1, 0, 1, 1 , 0, 0, 1, 1, 1, 1, 1, 1);
		                    work[6] =  Array(1, 1, 1, 0, 1, 1 , 1, 0, 1, 1, 1, 1, 1, 1);
		                    work[7] =  Array(1, 1, 1, 0, 1, 1 , 0, 0, 1, 1, 1, 1, 1, 1);               
		                    work[8] =  Array(0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 0, 0, 0, 1);
		                    work[9] =  Array(0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 1, 1, 0, 1);
		                    work[10] = Array(0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 0, 0, 0, 1);
		                    work[11] = Array(0, 0, 0, 0, 0, 0 , 0, 0, 0, 0, 0, 0, 0, 1);
		                    for(i=0; i< work[work_id].length; i++){
		                      if(work[work_id][i] == 0){
		                        $("#g_company_required_label_"+i).hide();

		                      }
		                      else $("#g_company_required_label_"+i).show();
		                    }
		                  }
		                  else {
		                    for(i=0; i< 14; i++){
		                      
		                        $("#g_company_required_label_"+i).hide();

		                        
		                    }
		                    $("#g_company_required_label_13").show();
		                  }
		               }
		          </script>

				</div>
				<?php if($user['User']['status_id'] == 2){?>
				<div class="button-tab">
					<!-- <a href="#" class="link-tab-1a"><img src="img/front/link-tab-3.png" alt="変更する"></a> -->
					<!-- <a href="#" class="link-tab-1b"><img src="img/front/link-tab-3b.png" alt="キャンセル"/></a> -->
					<button type="button" class="link-tab-1a" id="btn-edit-guarantor"><img src="<?php echo $this->webroot; ?>img/front/change.png" alt="変更する"></button>
		            <button type="submit" class="link-tab-1a" id="btn-save-guarantor"><img src="<?php echo $this->webroot; ?>img/front/save-b.png" alt="Save"></button>
		            <button type="button" class="link-tab-1b" id="btn-cancel-guarantor"><img src="<?php echo $this->webroot; ?>img/front/Cancel.png" alt="Cancel"></button>
				</div>
				 <?php } else { ?>
                <script type="text/javascript" charset="utf-8" async defer></script>
              	<?php } ?>
              	<!-- MAIN SCRIPT -->
				<script type="text/javascript" >
                	$(this).autoKana('#g_first_name', '#g_first_name_kana', {katakana:true, toggle:false});
            		$(this).autoKana('#g_last_name', '#g_last_name_kana', {katakana:true, toggle:false});
            		$(this).autoKana('#g-company', '#g-company-kana', {katakana:true, toggle:false});
	                
	                $( document ).ready(function() {
	                  if(g_edit != 1){
	                    //alert(edit);
	                    $('#btn-edit-guarantor').show();
	                    $('#btn-save-guarantor').hide();
	                    $('#btn-cancel-guarantor').hide();
	                    $('#UserGuarantorEdit').find(':input:not(#btn-edit-guarantor)').prop('disabled',true);
	                    $('#UserGuarantorEdit').find('a:not(#btn-edit-guarantor)').hide();
	                  }
	                  else{
	                    $('#btn-cancel-guarantor').show();
	                    $('#btn-save-guarantor').show();
	                    $('#btn-edit-guarantor').hide();
	                  }
	                });

                    $('#btn-edit-guarantor').on('click', function() {
                    	
                      	$('#UserGuarantorEdit').find(':button:not(#btn-edit-guarantor)').show();
                      	$('#UserGuarantorEdit').find(':input').prop('disabled',false);
                      	$('#UserGuarantorEdit').find('a').show();
                      	$('#btn-cancel-guarantor').show();
                      	$('#btn-save-guarantor').show();
                      	$('#btn-edit-guarantor').hide();
                      	$('#g_salary_type_other').prop('disabled', $('input[name="data[UserGuarantor][salary_type]"]:checked').val() != 4);
                		$('#g_salary_date').prop('disabled', $('input[name="data[UserGuarantor][salary_receive_id]"]:checked').val() != 3);
                      	g_edit = 1;
                   	});
	                   
                    $('#btn-cancel-guarantor').on('click', function() {
                      	$('#btn-edit-guarantor').show();
                      	$('#btn-save-guarantor').hide();
                      	$('#btn-cancel-guarantor').hide();
                      	$('#UserGuarantorEdit').find(':input:not(#btn-edit-guarantor)').prop('disabled',true);
                      	$('#UserGuarantorEdit').find(':button:not(#btn-edit-guarantor)').hide();
                      	$.ajax({
                           	url: "<?php echo $this->webroot;?>user_guarantors/edit",
                            	success: function(result){
                              	g_edit = 0;
                              	$('#guarantor').html(result);
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

  	$.validator.addMethod("integer_number", function(value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    }, "半角数字で入力してください。" );

  $("#UserGuarantorEdit").validate({
    rules: {
    	'data[UserGuarantor][num_child]': {
    		number: true,
          	maxlength: 2,
          	integer_number: "^[0-9]*$"
    	},
    	'data[UserGuarantor][post_num_1]': {
    		number: true,
    		minlength: 3,
    		maxlength: 3
    	},
    	'data[UserGuarantor][post_num_2]': {
    		number: true,
    		minlength: 4,
    		maxlength: 4
    	},
    	'data[UserGuarantor][year_residence]': {number: true},
    	'data[UserGuarantor][phone]': {
    		// required: function(element) {
      //           return !$("#home_phone").val();
      //        },
                number: true,
                maxlength: 11,
                minlength: 11,
                phone_number: "^0[0-9]"
    		},
    	'data[UserGuarantor][home_phone]': {
    		// required: function(element) {
      //           return  !$("#phone").val();
      //         },
                number: true,
                maxlength: 10,
                minlength: 10,
                phone_number: "[0-9]"
        },
        'data[UserGuarantor][company_post_num_1]': {
        	number: true,
        	minlength: 3,
        	maxlength: 3
        },
        'data[UserGuarantor][company_post_num_2]': {
        	number: true,
        	minlength: 4,
        	maxlength: 4
        },
        'data[UserGuarantor][company_phone]': {
        	number: true,
        	maxlength: 11,
        	minlength: 10,
        	phone_number: "^0[0-9]"
        },
        'data[UserGuarantor][company_fax]': {
        	number: true,
        	maxlength: 10,
        	minlength: 10
        },
        'data[UserGuarantor][year_worked]': {number: true},
        'data[UserGuarantor][month_worked]': {number: true},
        'data[UserGuarantor][income_month]': {number: true},
        'data[UserGuarantor][income_year]': {number: true},
        'data[UserGuarantor][salary_type_other]': {
        	required: {
                depends: function() {
                  return $('input[name="data[UserGuarantor][salary_type]"]:checked').val() == '4';
                }
            },
            number: true  
      	},
      	'data[UserGuarantor][salary_date]': {
        	required: {
                depends:  function() {
                  return $('input[name="data[UserGuarantor][salary_receive_id]"]:checked').val() == '3';
                }
            },
            number: true,
            min: 1,
            max: 30
      	}
    },
    messages: {
    	'data[UserGuarantor][post_num_1]': {
    		minlength: "<?php echo __('global.errors.minlength_3'); ?>",
    		maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
    	},
    	'data[UserGuarantor][post_num_2]': {
    		minlength: "<?php echo __('global.errors.minlength_4'); ?>",
    		maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
    	},
    	'data[UserGuarantor][company_post_num_1]': {
    		minlength: "<?php echo __('global.errors.minlength_3'); ?>",
    		maxlength: "<?php echo __('global.errors.minlength_3'); ?>"
    	},
    	'data[UserGuarantor][company_post_num_2]': {
    		minlength: "<?php echo __('global.errors.minlength_4'); ?>",
    		maxlength: "<?php echo __('global.errors.minlength_4'); ?>"
    	},
    	'data[UserGuarantor][salary_type_other]': {required: "<?php echo __('global.errors.required'); ?>"},
    	'data[UserGuarantor][salary_date]': {
    		required: "<?php echo __('global.errors.required'); ?>",
    		min: "<?php echo __('global.errors.salary_date.min'); ?>",
            max: "<?php echo __('global.errors.salary_date.max') ?>"
    	},
    	'data[UserGuarantor][company_phone]': {
    		maxlength: "<?php echo __('global.errors.company.phone'); ?>",
    		minlength: "<?php echo __('global.errors.company.phone'); ?>"
    	},
    	'data[UserGuarantor][company_fax]': {
    		maxlength: "<?php echo __('global.errors.maxlength_10'); ?>",
    		minlength: "<?php echo __('global.errors.minlength_10'); ?>"
    	},
    	'data[UserGuarantor][phone]': {
    		maxlength: "<?php echo __('global.errors.maxlength_11'); ?>",
    		minlength: "<?php echo __('global.errors.minlength_11'); ?>"
    	},
    	'data[UserGuarantor][home_phone]': {
    		maxlength: "<?php echo __('global.errors.maxlength_10'); ?>",
    		minlength: "<?php echo __('global.errors.minlength_10'); ?>"
    	},
    	'data[UserGuarantor][num_child]': {maxlength: "<?php echo __('global.errors.maxlength_2'); ?>"}
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
    	$('#btn-save-guarantor').prop('disabled', true);
        var url = "<?php echo $this->webroot;?>user_guarantors/edit";
      	$.ajax({
            type: "POST",
            url: url,
            data: $("#UserGuarantorEdit").serialize(),
            success: function(result)
            {
                g_edit = 0;
                if(result!= "0"){
	                $('#guarantor').html(result);
	                $.ajax({
	                    url: "<?php echo $this->webroot?>users/reload_dashboard",
	                    success: function(result){
	                      $('#home').html(result);
	                    }
	                });
            	}
            	else {
            		window.location.href = "<?php echo $this->webroot?>users/login"
            	}
             }
           }).done(function() {
             $('#btn-save-guarantor').prop('disabled', false);
            });
            return false;
        }
  });
  jQuery.extend(jQuery.validator.messages, {
    	number: "<?php echo __('global.errors.number'); ?>"
  });

  jQuery(function($) {
      $('#g_income_month').autoNumeric('init', {aNum: '0123456789',mRound: 'CHF'});  
      $('#g_income_year').autoNumeric('init', {aNum: '0123456789',mRound: 'CHF'});      
  });
</script>
<!-- END SCRIPT VALIDATION -->

