<?php //var_dump($user);var_dump($prefs); die; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<div class="page-header" id="banner">


<div class="row">

    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables">お客様</h1>
      </div>
      
      <div class="bs-component">
        

      
       <?php echo $this->Form->create("User", array('action'=>'register', 'id'=>'form', 'class'=>'form-horizontal', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
         <div class="well bs-component">
       
         
         
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
                      <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>"姓", 'class'=>'form-control', 'style'=>'display:inline; width:150px; ' ,'div'=>false))?>
                   
                      <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>"名", 'class'=>'form-control', 'style'=>'display:inline; width:150px; ','div'=>false))?>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>"セイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; ','div'=>false))?>              
                                       
                      <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>"メイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; ','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
             <tr>
             <td> <label for="inputEmail"><?php echo __('user.register.gender')?><span style="color:red">*</span></label></td>
              <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('genre', array('male'=>"男性",'Female'=> "女性"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px; margin-left:20px; margin-right:10px;', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
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
                      $years = array_combine(  range(1900, date("Y")), range(1900, date("Y")));
                      echo $this->Form->select('year_of_birth', $years, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'year', 'onchange'=>'calculate_age()'));
                    ?>
                    月
                    <?php 
                      $months = array_combine(range(1, 12), range(1, 12));
                      echo $this->Form->select('month_of_birth', $months, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'month'));
                    ?>
                    日
                    <?php 
                    $dates = array_combine(range(1, 31), range(1, 31));
                      echo $this->Form->select('day_of_birth', $dates, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'day'));
                    ?>


              <?php  $age = 0;
              if($user['User']['year_of_birth'] && $user['User']['month_of_birth'] && $user['User']['day_of_birth']){
                $age = date('Y') - $user['User']['year_of_birth']; 

                if (date('m')< $user['User']['month_of_birth'] - 1)
                {
                  $age--;
                }

                if ($user['User']['month_of_birth'] - 1 == date('m') && date('d') < $user['User']['day_of_birth'])
                {
                  $age--;
                }
              }
                ?>
           
                      歳 : <span id="age"><?php echo $age; ?></span>
                    
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
                    //echo $this->Form->select('married_status_id', $married_statuses, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'empty'=>'-- Select One --'));
                  ?>
                   <?php 
                    echo $this->Form->radio('married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px; margin-left:20px; margin-right:10px;', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1));
                  ?>  
                  </div>
                </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail" >現住所<span style="color:red">*</span></td>
                <td>
                  <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">〒</label>
                <div class="col-lg-10" >
                  <?php echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,'div'=>false))?>
                  <?php echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,'div'=>false))?>
                 

                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">都道府県</label>
                <div class="col-lg-10">
                  <?php 
                  echo $this->Form->select('UserAddress.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'pref_id', 'empty'=>'青森県'));
                ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">市区町村</label>
                <div class="col-lg-10">
                  <?php 
                    echo $this->Form->input('UserAddress.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'form-control','div'=>false));
                ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">番地</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.address', array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">建物</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                </div>
              </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail">メールアドレス<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
               
              <tr>
                <td><label for="inputEmail">電話番号<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>'携帯電話', 'class'=>'form-control', 'div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
                   
                      <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>'自宅', 'class'=>'form-control','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))?>
                    </div>
                  </div>
                  </td>
                </tr>
            </table>
            </fieldset>
            </div>
              

             

            
            
            <div >


        </form>
        <script type="text/javascript">
          $( document ).ready(function() {
            $('#form').find(':input:not(:button):not(:disabled)').prop('disabled',true);

          });
        </script>
           
            <div class="form-group">
                <div class="col-lg-10 ">
                  <button type="button" class="btn btn-danger" id="btn-delete" style="float:left"> 削除する</button>
                  <div class="col-lg-offset-2" style="padding-left:150px">
                     <?php if($user['User']['status_id'] == 1){?>
                    <button type="button" class="btn btn-warning" id="btn-reject"> 拒絶します</button>
                      <button type="button" class="btn btn-primary" id="btn-approve">会員登碌を承認すます</button>
                      <?php } ?>
                      <button type="button" class="btn btn-default" id="btn-cancel" style="float:right">一覧へ戻る</button>
                    </div>
                    
                </div>
              </div>
          </div>
          <script type="text/javascript">
            
            $(document).ready(function(){ 
              

              $('#btn-delete').on('click', function() {
                
                   $( "#dialog-confirm-delete" ).dialog("open");
               
              });
              
               $('#btn-cancel').on('click', function() {
                
                   window.location.href='<?php echo $this->webroot;?>admin/members';
                
              });

              $( "#dialog-confirm-delete" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "削除する": function() {
                   $( "#dialog-reconfirm-delete" ).dialog("open");
                    $( this ).dialog( "close" );
                  },
                  'キャンセル': function() {
                    agree = false;
                    $( this ).dialog( "close" );
                  }
                }
              });
              $( "#dialog-reconfirm-delete" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "削除する": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/members/delete/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                  'キャンセル': function() {
                    agree = false;
                    $( this ).dialog( "close" );
                  }
                }
              });
              

             
             
            });
          </script>
          
          
        
    </div>

  </div>
  <div id="dialog-confirm-delete" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>お知らせを削除しますか？</p>
  </div>

  <div id="dialog-reconfirm-delete" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>お知らせを削除すると2度と復元できません。
お知らせを削除しますか？</p>
  </div>

  </div>

