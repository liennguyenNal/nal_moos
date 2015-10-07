
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="page-header" id="banner">

<div class="row">

    <div class="col-lg-12">
      
      <div class="bs-component">
      	
      	<?php echo $this->Form->create("Contact", array('action'=>'edit_confirm', 'id'=>'form', 'class'=>'form-horizontal')) ?>
            <fieldset>
             
              <legend>問合せ 変更確認</legend>
              <div class="form-group">
                <label for="name" class="col-lg-2 control-label"><?php echo __('user.contact.username'); ?></label>
                <div class="col-lg-10">
                  <table>
                    <tr >
                      <td>

                        <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>'姓', 'class'=>'form-control', "placeholder"=>'山田','div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>'名', 'class'=>'form-control', "placeholder"=>'雪','div'=>false))?>
                      </td>
                    </tr>
                    <tr>
                      <td>

                        <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>'セイ', 'class'=>'form-control', "placeholder"=>'ヤマダ','div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>'メイ', 'class'=>'form-control', "placeholder"=>'ユキ','div'=>false))?>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="form-group">
                  <label for="title" class="col-lg-2 control-label"><?php echo __('user.contact.type-company'); ?></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('type', array("1" => "一殷のお客様","2"=> "メディア関係","3"=> "建設会社", "4"=> "その他"), array( 'class'=>'radio','style'=>'display:inline; padding:10px, padding-left:100px;margin:10px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
                  ?>  
                  </div>
                </div>
              <div class="form-group">
                <label for="title" class="col-lg-2 control-label"><?php echo __('user.contact.company-name'); ?></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('company', array('type'=>'text', 'id'=>"comapny_name", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label"><?php echo __('user.contact.company-phone'); ?></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label"><?php echo __('user.register.email'); ?></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>            
              
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label"><?php echo __('user.contact.content'); ?></span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              
              
            </fieldset>
          
          
        <div class="bs-component">
            
             <div class="form-group">
                <label for="email" class="col-lg-2 control-label"><?php echo __('admin.contact.created_date'); ?></label>
                <div class="col-lg-10">
                  <?php echo $contact['Contact']['created'];?>
                </div>
              </div>   
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">更新日時</label>
                <div class="col-lg-10">
                  <?php echo date("Y-m-d H:i:s");?>
                </div>
              </div>          
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label"><?php echo __('admin.contact.status'); ?></span></label>
                <div class="col-lg-10">
                  <?php 
                    $statuses = array(1=>"未対応",2=> "対応中",3=>"対応済");

                    //$statuses = array("2"=>"解決します", "3"=>"拒絶します");
                  echo $this->Form->select('status', $statuses, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'status' , ));?>
                </div>
              </div>
             <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label"><?php echo __('admin.contact.comment'); ?></span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('comment', array('type'=>'textarea', 'id'=>"comment", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Comment', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              <?php echo $this->Form->hidden('id',array('value'=>$contact['Contact']['id']))?>
               <div class="form-group">
                <div class="col-lg-10 ">
                  
                  <div class="col-lg-offset-2" style="padding-left:150px">
                     
                     
                      <button type="submit" class="btn btn-primary" id="btn-change">保存する</button>
                      
                      <button type="button" class="btn btn-default" id="btn-cancel" >戻る</button>
                    </div>
                    <script type="text/javascript">
                      $( document ).ready(function() {
                        var $curr = $( "#start" );
                        $('#form').find(':input:not(:button):not(:disabled):not(:hidden)').prop('disabled',true);

                         $('#btn-cancel').on('click', function() {
                
                             window.location.href='<?php echo $this->webroot;?>admin/contacts/change_confirm/<?php echo $contact['Contact']['id']; ?>';
                          
                        });
                       
                       });
                    </script>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  