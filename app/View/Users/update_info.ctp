

<div class="page-header">
    <div class="row">
      <div class="col-lg-4">
        <div class="bs-component">
           <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              
              <li class="active">Contact</li>
              
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
        <?php echo $this->element('flash');?>
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("User", array('action'=>'register', 'class'=>'form-horizontal')) ?>
            <fieldset>
              <legend>Register Account</legend>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Your Email','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">First Name<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'First Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Last Name<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Last Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">First Name Kana<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'First Name Kana','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Last Nam Kana<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Last Name Kana','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Last Nam Kana<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php 
              		echo $this->Form->input('status', array('options' => array('male'=>"Male",'Female'=> "Female"), 'class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'status', 'value'=>$status));
            		?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Birthday<span style="color:red">*<span></label>
                <div class="col-lg-10">
                	Age
                  <input class="form-control" style="width:100px; display:inline" type="slelect">
                  Year
                  <input class="form-control" style="width:100px; display:inline">
	              Month
	              <input class="form-control" style="width:50px; display:inline">
	              Day
	              <input class="form-control" style="width:50px; display:inline">
               
                </div>
              </div>
             
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Married Status<span style="color:red">*<span></label>
                <div class="col-lg-10">
                 
                  <?php 
              		echo $this->Form->select('married_status', $married_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false));
            		?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Family Stucture<span style="color:red">*<span></label>
                <div class="col-lg-10">
                 
                  <?php 
              		echo $this->Form->select('family_structure', $family_structures, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'status', 'value'=>$status));
            		?>
                </div>
              </div>
               <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" />

              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Post Office<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('UserAddress.post_num', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Post Number','div'=>false))?>
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
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Day Phone<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.day_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Phone in day','div'=>false))?>
                </div>
              </div>




              <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" />

              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Post Office<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('UserCompany.post_num', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Post Number','div'=>false))?>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Address<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserCompany.address', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Address','div'=>false))?>
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
                  <?php echo $this->Form->input('UserCompany.email', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Email','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Mobile Phone<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserCompany.phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Mobile Phone','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Home Phone<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.home_phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Home Phone','div'=>false))?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>