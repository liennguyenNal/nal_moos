<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<div class="page-header" id="banner">
 <div class="col-lg-4">
    <div class="bs-component">
     <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="<?php echo $this->webroot?>admin/customers/">Customers</a></li>
        <li class="active">View Customer </li>
      </ul>
  </div>
</div>

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
                      <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>"姓", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px' ,"placeholder"=>'山田','div'=>false))?>
                   
                      <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>"名", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px; margin:20px', "placeholder"=>'雪','div'=>false))?>
                    </div>
                  </div>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>"セイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px', "placeholder"=>'ヤマダ','div'=>false))?>              
                                       
                      <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>"メイ", 'class'=>'form-control', 'style'=>'display:inline; width:150px; margin:10px',"placeholder"=>'ユキ','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
             <tr>
             <td> <label for="inputEmail">性的<span style="color:red">*</span></label></td>
              <td>
                <div class="form-group">
                
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('genre', array('male'=>"男性",'Female'=> "女性"), array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"male"));
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
                      $years = array_combine(  range(1930, date("Y")), range(1930, date("Y")));
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
                      歳 : <span id="age">0</span>
                    <script type="text/javascript">

                    function calculate_age(){
                      var d = new Date();
                      var n = d.getFullYear();
                      $("#age").html(n - $("#year").val());
                    }
                    </script>
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
                    echo $this->Form->radio('married_status_id', $married_statuses, array( 'class'=>'radio','style'=>'display:inline; padding-left:100px;margin:20px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>1));
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
                  <?php echo $this->Form->input('UserAddress.post_num_1', array('type'=>'text', 'id'=>"post_num_1", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'101','div'=>false))?>
                  <?php echo $this->Form->input('UserAddress.post_num_2', array('type'=>'text', 'id'=>"post_num_2", 'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'0001','div'=>false))?>
                 

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
                  <?php echo $this->Form->input('UserAddress.house_name', array('type'=>'text', 'id'=>"house_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false))?>
                </div>
              </div>
                </td>
              </tr>
              <tr>
                <td><label for="inputEmail">メールアドレス<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">                 
                      <?php echo $this->Form->input('User.email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', "placeholder"=>'sample@gmail.com','div'=>false))?>
                    </div>
                  </div>
                </td>
              </tr>
               
              <tr>
                <td><label for="inputEmail">電話番号<span style="color:red">*</span></label></td>
                <td>
                  <div class="form-group">
                    
                    <div class="col-lg-10">
                      <?php echo $this->Form->input('User.phone', array('type'=>'text', 'id'=>"phone", 'label'=>'携帯電話', 'class'=>'form-control', "placeholder"=>'09001234567','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px', 'required'=>false))?>
                   
                      <?php echo $this->Form->input('User.home_phone', array('type'=>'text', 'id'=>"home_phone", 'label'=>'自宅', 'class'=>'form-control', "placeholder"=>'0398765432','div'=>false, 'style'=>'display:inline; width:150px; margin-left:10px; margin-right:10px'))?>
                    </div>
                  </div>
                  </td>
                </tr>
            </table>
            </fieldset>
            </div>
              

             

            <div class="well bs-component">


              <!-- <hr style="border: 0; height: 1px;background: #333; background-image: linear-gradient(to right, #ccc, #333, #ccc);" /> -->
              <fieldset>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">職業</label>
                  <div class="col-lg-10">
                   
                    <?php 
                    echo $this->Form->select('UserCompany.working_status_id', $works, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'working_status', 'empty'=>'正社貝'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">働続年数</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.year_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 年' , 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
                    <?php echo $this->Form->input('UserCompany.month_worked', array('type'=>'text', 'id'=>"title", 'label'=>' 月', 'class'=>'form-control', 'style'=>'width:150px; display:inline', 'div'=>false))?>
                  </div>
                </div>

               
                    
                 
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">税込月収</label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input('UserCompany.tax_of_month', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>円
                  </div>
                </div>
                

               
              </fieldset>
          
            </div>
            <h4>ご希望エリア　※最大５エリアまで</h4>
            <section id="expect-area">
            <?php foreach ($user['ExpectArea'] as $item) {?>
            <div class="well bs-component" id='expect-area-content' >
              <fieldset>

                  <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">〒<span style="color:red">*</span></label>
                  <div class="col-lg-10" >
                    <?php echo $this->Form->input('ExpectArea.1.post_num_1', array('type'=>'text', 'id'=>"post_num_1",'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' , "placeholder"=>'101','div'=>false, 'value'=>$item["post_num_1"]))?>
                    <?php echo $this->Form->input('ExpectArea.1.post_num_2', array('type'=>'text', 'id'=>"post_num_2",  'label'=>false, 'class'=>'form-control', 'style'=>'width:150px; display:inline' ,"placeholder"=>'0001','div'=>false, 'value'=>$item["post_num_2"]))?>
                    
                   
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">都道府県<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->select('ExpectArea.1.pref_id', $prefs, array('class'=>'form-control', 'style'=>'width:150px;','div'=>false, 'label'=>false, 'id'=>'pref_id', 'value'=>$item["pref_id"] , 'empty'=>'青森県'));
                  ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">市区町村<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                     <?php echo $this->Form->input('ExpectArea.city', array('type'=>'text', 'id'=>"city", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false, 'value'=>$item["city"]))?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">地城<span style="color:red">*</span></label>
                  <div class="col-lg-10">
                    <?php echo $this->Form->input("ExpectArea.address", array('type'=>'text', 'id'=>"address", 'label'=>false, 'class'=>'form-control', "placeholder"=>'','div'=>false, 'value'=>$item["address"]))?>
                  </div>
                </div>
              </fieldset>
              
            </div>
            <?php } ?>
            </section>
            <div >


        </form>
        <script type="text/javascript">
          $( document ).ready(function() {
            $('#form').find(':input:not(:button):not(:disabled)').prop('disabled',true);

          });
        </script>
           
            <div class="form-group">
                <div class="col-lg-10 ">
                  <button type="button" class="btn btn-danger" id="btn-delete" style="float:left"> 削除します</button>
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
                
                   window.location.href='<?php echo $this->webroot;?>admin/customers';
                
              });

              $( "#dialog-confirm-delete" ).dialog({
                autoOpen: false,
                resizable: true,
                modal: true,
                buttons: {
                  "Delete": function() {
                   $( "#dialog-reconfirm-delete" ).dialog("open");
                    $( this ).dialog( "close" );
                  },
                  Cancel: function() {
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
                  "Delete": function() {
                    window.location.href='<?php echo $this->webroot;?>admin/customers/delete/<?php echo $user['User']['id']?>';
                    $( this ).dialog( "close" );
                  },
                  Cancel: function() {
                    agree = false;
                    $( this ).dialog( "close" );
                  }
                }
              });
              

             
             
            });
          </script>
          
          
        
    </div>

  </div>
  <div id="dialog-confirm-delete" title="Delete?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This user will be deleted. Are you sure?</p>
  </div>
  <div id="dialog-reconfirm-delete" title="Delete?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>If you delete user, all related data also deleted . Are you sure?</p>
  </div>

  </div>

