

<div class="page-header">


    <div class="row">
      <div class="col-lg-12">
      <div class="bs-component">
       
          <h4 class="active">プロファイル編集</h4>
        
    </div>
        <div class="well bs-component">
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("User", array('action'=>'edit_profile', 'class'=>'form-horizontal')) ?>
            <fieldset>
             
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.email', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Email','div'=>false))?>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">姓</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.first_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'First Name','div'=>false))?>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">名</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.last_name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Last Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">セイ</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.first_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'First Name Kana','div'=>false))?>
                </div>
              </div>
               <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">メイ</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('Administrator.last_name_kana', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Last Name Kana','div'=>false))?>
                </div>
              </div>
              <?php echo $this->Form->hidden('Administrator.id');?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" onclick="location.href='<?php echo $this->webroot;?>admin/users/profile'" class="btn btn-default">キャンセル</button>
                  <button type="submit" class="btn btn-primary">変更する</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>