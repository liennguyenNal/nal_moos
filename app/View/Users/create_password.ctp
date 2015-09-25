
<div class="page-header">
    <div class="row">
      <div class="col-lg-4">
        <div class="bs-component">
           <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              
              <li><a href="<?php echo $this->webroot;?>admin/users/profile">My Profile</a></li>
              <li class="active">Change Password</li>
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
          <?php echo $this->element('flash');?>
          <?php echo $this->Form->create("User", array('action'=>'create_password', 'class'=>'form-horizontal')) ?>
            <fieldset>
              <legend>Create Your Password</legend>
              
              
             <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Your Password</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('password', array('type'=>'password', 'id'=>"password", 'label'=>false, 'class'=>'form-control', "placeholder"=>'New Password','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Confirm Password</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('confirm_password', array('type'=>'password', 'id'=>"confirm_password", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Confirm New Password','div'=>false))?>
                </div>
              </div>
              <?php echo $this->Form->hidden('email');?>
              <?php echo $this->Form->hidden('access_token');?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default" onclick="location.href='<?php echo $this->webroot;?>admin/users/profile'">キャンセル</button>
                  <button type="submit" class="btn btn-primary">保存</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>