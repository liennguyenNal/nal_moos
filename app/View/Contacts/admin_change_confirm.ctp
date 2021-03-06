
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="page-header" id="banner">

<div class="row">

    <div class="col-lg-12">
    <?php echo $this->element('flash');?>
      
      <div class="bs-component">
      	
      	<?php echo $this->Form->create("Contact", array('action'=>'change_confirm', 'id'=>'form', 'class'=>'form-horizontal')) ?>
            <fieldset>
             
              <legend>問合せ 詳細</legend>
              <div class="form-group">
                <label for="name" class="col-lg-2 control-label"><?php echo __('user.contact.username'); ?></label>
                <div class="col-lg-10">
                  <table>
                    <tr >
                      <td>

                        <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>'姓', 'class'=>'form-control', 'div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>'名', 'class'=>'form-control','div'=>false))?>
                      </td>
                    </tr>
                    <tr>
                      <td>

                        <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>'セイ', 'class'=>'form-control', 'div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>'メイ', 'class'=>'form-control', 'div'=>false))?>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="form-group">
                  <label for="title" class="col-lg-2 control-label"><?php echo __('user.contact.type-company'); ?></label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('type', array("1" => "一般のお客様","2"=> "メディア関係","3"=> "建設会社", "4"=> "その他"), array( 'class'=>'radio','style'=>'display:inline; padding:10px, padding-left:100px;margin:10px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
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
                  <?php echo $contact['Contact']['updated'];?>
                </div>
              </div>            
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label"><?php echo __('admin.contact.status'); ?></span></label>
                <div class="col-lg-10">
                  <?php 
                    $statuses = array(1=>"未対応",2=> "対応中",3=>"対応済");
                  echo $this->Form->select('status', $statuses, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'status' , ));?>
                </div>
              </div>
             <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label"><?php echo __('admin.contact.comment'); ?></span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('comment', array('type'=>'textarea', 'id'=>"comment", 'label'=>false, 'class'=>'form-control', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              <?php echo $this->Form->hidden('id',array('value'=>$contact['Contact']['id']))?>
               <div class="form-group">
                <div class="col-lg-10 ">
                  
                  <div class="col-lg-offset-2" style="padding-left:150px">
                     
                     
                      <button type="button" class="btn btn-danger" id="btn-delete">削除する</button>
                      <button type="submit" class="btn btn-primary" id="btn-change">変更する</button>
                      
                      <button type="button" class="btn btn-default" id="btn-cancel" >一覧へ戻る</button>
                    </div>

                    <div id="dialog-confirm-delete" title="削除">
                      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>問い合わせを削除しますか？</p>
                    </div>

                    <div id="dialog-confirm-delete1" title="Confirm delete this users?">
                      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>A問い合わせを削除すると2度と復元できません。
                  問い合わせを削除しますか？</p>
                    </div>

                    
                    <script type="text/javascript">
                      $( document ).ready(function() {
                        var $curr = $( "#start" );
                        $('#form').find(':input:not(:button):not(:disabled):not(:hidden)').prop('disabled',true);

                         $('#btn-cancel').on('click', function() {
                
                             window.location.href='<?php echo $this->webroot;?>admin/contacts';
                          
                        });
                       
                       });

                      $('#btn-delete').on('click', function() { 
                        
                           $("#dialog-confirm-delete").dialog("open");
                             //event.preventDefault(); 

                        
                      });

                      $("#dialog-confirm-delete").dialog({
                        autoOpen: false,
                        resizable: true,
                        modal: true,
                        buttons: {
                          "削除する": function() {
                            $( "#dialog-confirm-delete1" ).dialog("open");
                            $( this ).dialog( "close" );
                            event.preventDefault();
                          },
                          'キャンセル': function() {
                            agree = false;
                            $( this ).dialog( "close" );
                          }
                        }
                      });
                      $( "#dialog-confirm-delete1" ).dialog({
                        autoOpen: false,
                        resizable: true,
                        modal: true,
                        buttons: {
                          "削除する": function() {
                            
                            $( this ).dialog( "close" );
                             window.location.href="<?php echo $this->webroot;?>admin/contacts/delete/<?php echo $contact['Contact']['id']; ?>";

                          },
                          'キャンセル': function() {
                            agree = false;
                            $( this ).dialog( "close" );
                          }
                        }
                      });
                    </script>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  