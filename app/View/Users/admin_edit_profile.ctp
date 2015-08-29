

<div class="page-header">
    <div class="row">
      <div class="col-lg-4">
        <div class="bs-component">
           <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              
              <li><a href="#">My Profile</a></li>
              <li class="active">Edit</li>
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("User", array('action'=>'edit_profile', 'class'=>'form-horizontal')) ?>
            <fieldset>
              <legend>Edit Profile</legend>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.email', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Email','div'=>false))?>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">First name</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.first_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'First Name','div'=>false))?>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Last Name</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.last_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Last Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">First name</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.first_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'First Name Kana','div'=>false))?>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Last Name</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.last_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Last Name Kana','div'=>false))?>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" onclick="location.href='<?php echo $this->webroot;?>admin/users/profile'" class="btn btn-default">キャンセル</button>
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>