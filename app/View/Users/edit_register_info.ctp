
<script src="<?php echo $this->webroot;?>js/jquery.validate.js"></script>
<div class="page-header">
    <div class="row">
      <div class="col-lg-4">
        <div class="bs-component">
           <ul class="breadcrumb">
              <li><a href="<?php echo $this->webroot;?>">Home</a></li>
              
              <li class="active">Edit Info</li>
              
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
        <?php echo $this->element('flash');?>
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("User", array('action'=>'edit_register_info', 'class'=>'form-horizontal', 'inputDefaults' => array(
        		'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
            <fieldset>
              <legend>Edit Account Info</legend>
              
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">First Name<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'First Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Last Name<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Last Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">First Name Kana<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'First Name Kana','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Last Nam Kana<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Last Name Kana','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Genre<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php 
              		echo $this->Form->input('genre', array('options' => array('male'=>"Male",'Female'=> "Female"), 'class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'genre'));
            		?>	
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Birthday<span style="color:red">*<span></label>
                <div class="col-lg-10">
                	Age
                  <?php 
                  	$ages = array_combine(range(date("Y") - 10, 1930), range(date("Y") - 10, 1930));
              		echo $this->Form->select('age_of_birth', $ages, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'status'));
            		?>
                  Year
                  <?php 
                  $years = array_combine(range(date("Y") - 10, 1930), range(date("Y") - 10, 1930));
              		echo $this->Form->select('year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'status'));
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
               
                </div>
              </div>
             
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Married Status<span style="color:red">*<span></label>
                <div class="col-lg-10">
                 
                  <?php 
              		echo $this->Form->select('married_status_id', $married_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'empty'=>'-- Select One --'));
            		?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Family Stucture<span style="color:red">*<span></label>
                <div class="col-lg-10">
                 
                  <?php 
              		echo $this->Form->select('family_structure_id', $family_structures, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'family_status', 'empty'=>'-- Select One --'));
            		?>
                </div>
              </div>
               <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" />

              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Post Number<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.post_num', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Post Number','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">City<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php 
              		echo $this->Form->select('UserAddress.city_id', $working_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'city', 'empty'=>'-- Select City --'));
            		?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Address<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Address','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Address Kana<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.address_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Address Kana','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email<span style="color:red">*<span></label>
                <div class="col-lg-10">                 
                  <?php echo $this->Form->input('UserAddress.email', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Email','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Mobile Phone<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Mobile Phone','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Home Phone<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.home_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Home Phone','div'=>false))?>
                </div>
              </div>
              




              <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" />

              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Number Year Worked<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Number Month Worked<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Tax of Month<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserCompany.tax_of_month', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Working Status<span style="color:red">*<span></label>
                <div class="col-lg-10">
                 
                  <?php 
              		echo $this->Form->select('UserCompany.working_status_id', $working_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'-- Select One --'));
            		?>
                </div>
              </div>
              <?php echo $this->Form->hidden('User.id');?>
              <?php echo $this->Form->hidden('UserAddress.id');?>
              <?php echo $this->Form->hidden('UserCompany.id');?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="button" onclick="window.location.href='<?php echo $this->webroot;?>'" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Register</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>