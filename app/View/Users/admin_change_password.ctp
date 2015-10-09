

<div class="page-header">
    <div class="row">
      <div class="col-lg-4">
        <div class="bs-component">
           <ul class="breadcrumb">
              
              
              <li class="active">パスワード変更</li>
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
          <?php echo $this->element('flash');?>
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("User", array('action'=>'change_password', 'class'=>'form-horizontal')) ?>
            <fieldset>
             
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">現在のパスワード</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('old_password', array('type'=>'password', 'id'=>"old_password", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                </div>
              </div>
              
             <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">新しいパスワード</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('password', array('type'=>'password', 'id'=>"password", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">新しいパスワード確認</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('confirm_password', array('type'=>'password', 'id'=>"confirm_password", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                 <button type="submit" class="btn btn-primary">パスワード変更</button>
                  <button type="reset" class="btn btn-default" onclick="location.href='<?php echo $this->webroot;?>admin/users'">キャンセル</button>
                 
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>