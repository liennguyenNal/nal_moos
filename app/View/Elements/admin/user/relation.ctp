<h4>同居人</h4>

<section id="relation-area">
<?php 

	$len = sizeof($user['UserRelation']);

for($i =0; $i< $len; $i++){?>

<div class="well bs-component" id="relation-area-content" >

	<fieldset>

	    <div class="form-group">
	      <table class="table table-striped table-hover ">
	        <tr>
	          <td>
	            <label><?php echo __('user.partner.name'); ?><span style="color:red"><?php echo __('global.require'); ?></span></label>
	          </td>
	          <td>
	            <div class="form-group">
	              <div class="col-lg-10">
	                <?php echo $this->Form->input("UserRelation.$i.first_name", array('type'=>'text', 'id'=>"r_first_name_$i", 'label'=>__('user.register.firstname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,'div'=>false))?>
	             
	                <?php echo $this->Form->input("UserRelation.$i.last_name", array('type'=>'text', 'id'=>"r_last_name_$i", 'label'=>__('user.register.lastname'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', 'div'=>false))?>
	              </div>
	            </div>
	            <div class="form-group">
	              
	              <div class="col-lg-10">
	                <?php echo $this->Form->input("UserRelation.$i.first_name_kana", array('type'=>'text', 'id'=>"r_first_name_kana_$i", 'label'=>__('user.register.firstnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false))?>              
	                                 
	                <?php echo $this->Form->input("UserRelation.$i.last_name_kana", array('type'=>'text', 'id'=>"r_last_name_kana_$i", 'label'=>__('user.register.lastnamekana'), 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', 'div'=>false))?>
	              </div>
	            </div>
	          </td>
	        </tr>
	        <tr>
	           <td> <label ><?php echo __('user.register.gender'); ?><span style="color:red"><?php echo __('global.require'); ?></span></label></td>
	            <td>
	              <div class="form-group">
	              
	                <div class="col-lg-10">
	                  <?php 
	                  echo $this->Form->radio("UserRelation.$i.gender", array('male'=>__('user.register.male'),'female'=>__('user.register.female')), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
	                ?>  
	                </div>
	              </div>
	            </td>
	          </tr>
	          <tr>
	            <td> <label ><?php echo __('user.register.birthday'); ?><span style="color:red"><?php echo __('global.require'); ?></span></label></td>
	            <td>
	              <div class="form-group">
	               
	                <div class="col-lg-10">
	                  
	                  <?php echo __('user.register.year'); ?>
	                  <?php 
	                  $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
	                  echo $this->Form->select("UserRelation.$i.year_of_birth", $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'p-year-<?php echo $i?>', 'onchange'=>'calculate_relation_age($(this))'));
	                ?>
	                <?php echo __('user.register.month'); ?>
	                <?php 
	                  $months = array_combine(range(1, 12), range(1, 12));
	                  echo $this->Form->select("UserRelation.$i.month_of_birth", $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month'));
	                ?>
	                <?php echo __('user.register.day'); ?>
	                <?php 
	                $dates = array_combine(range(1, 31), range(1, 31));
	                  echo $this->Form->select("UserRelation.$i.day_of_birth", $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day'));
	                ?>
	                  <?php echo __('user.register.age'); ?> : <span id="p-age-<?php echo $i?>">0</span>
	                <script type="text/javascript">
	                var d = new Date();
	                  var n = d.getFullYear();
	                 $("#p-age-<?php echo $i?>").html("<?php echo date('Y') - $user['UserRelation'][$i]['year_of_birth'] ?>");
	                function calculate_relation_age(obj){
	                	var age = n - obj.val();
	                	obj.parent().parent().find('span').html(age);
	                }
	                </script>
	                </div>
	              </div>
	            </td>
	          </tr>
	          <tr>
	            <td><?php echo __('user.my_page.guarantor.relationship'); ?></td>
	            <td><?php echo $this->Form->input("UserRelation.$i.relate", array('type'=>'text', 'id'=>"last_name_kana", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
	            </td>
	          </tr>
	          <tr>
	            <td><label for="phone"><?php echo __('user.partner.phone'); ?></label></td>
	            <td>
	              <div class="form-group">
	                
	                <div class="col-lg-10">
	                  <?php echo $this->Form->input("UserRelation.$i.phone", array('type'=>'text', 'id'=>"phone", 'label'=>false, 'class'=>'form-control', 'div'=>false,  'required'=>false))?>                           
	                  
	                </div>
	              </div>
	              </td>
	            </tr>
	            <tr>
	            <td><label for="company"><?php echo __('user.partner.info'); ?><span style="color:red">*</span></label></td>
	            <td>
	              <div class="form-group">
	                
	                <div class="col-lg-10">
	                  <?php echo $this->Form->input("UserRelation.$i.company", array('type'=>'text', 'id'=>"company", 'label'=>__('user.partner.company'), 'class'=>'form-control', 'div'=>false, 'required'=>false))?>
	                  <?php echo $this->Form->input("UserRelation.$i.school", array('type'=>'text', 'id'=>"school", 'label'=>__('user.my_page.basic_info.company_name_kana'), 'class'=>'form-control', 'div'=>false,  'required'=>false))?>
	                  
	                </div>
	              </div>
	              </td>
	            </tr>
	      </table>
	    </div>
	    
	</fieldset>
	  
</div>


<?php } ?>
</section>

  