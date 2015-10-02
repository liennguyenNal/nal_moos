 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <div class="col-lg-4">
    <div class="bs-component">
		 <ul class="breadcrumb">
		    <li><a href="<?php echo $this->webroot;?>">Home</a></li>
		     <li><a href="<?php echo $this->webroot;?>admin/contacts">Contacts</a></li>
		    <li class="active">View</li>
		  </ul>
	</div>
</div>

<div class="row">

    <div class="col-lg-12">
      

      <div class="bs-component">
        
      	
      	<?php echo $this->Form->create("Contact", array('action'=>'index', 'id'=>'form', 'class'=>'form-horizontal')) ?>
            <fieldset>
             
              <legend>お問い合わせフオ一ム <?php if($contact['Contact']['status']==1){echo 'No Processing';}if($contact['Contact']['status']==2){echo 'Processing';} if($contact['Contact']['status']==3){echo 'Completed';} ?></legend>
              <div class="form-group">
                <label for="name" class="col-lg-2 control-label">お名前</label>
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
                  <label for="title" class="col-lg-2 control-label">問合せ分類</label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('type', array("1" => "一殷のお客様","2"=> "メディア関係","3"=> "建設会社", "4"=> "その他"), array( 'class'=>'radio','style'=>'display:inline; padding:10px, padding-left:100px;margin:10px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
                  ?>  
                  </div>
                </div>
              <div class="form-group">
                <label for="title" class="col-lg-2 control-label">会社名(法人の場合)</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('company', array('type'=>'text', 'id'=>"comapny_name", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">電話番号</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">メールアドレス</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', 'div'=>false))?>
                </div>
              </div>            
              
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">お問い合わせ内容</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              
              
            </fieldset>
          </form>
          <script type="text/javascript">
          $( document ).ready(function() {
            var $curr = $( "#start" );
            $('#form').find(':input:not(:button):not(:disabled)').prop('disabled',true);

          });
        </script>
        <div class="bs-component">
            <?php echo $this->Form->create("Contact", array('action'=>'view', 'id'=>'form1', 'class'=>'form-horizontal')) ?>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">問合せ日時</label>
                <div class="col-lg-10">
                  <?php echo $contact['Contact']['created'];?>
                </div>
              </div>            
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">対応伏況</span></label>
                <div class="col-lg-10">
                  <?php 
                  $statuses = array(1=>"No Processing",2=> "Processing",3=>"Completed");

                    //$statuses = array("2"=>"解決します", "3"=>"拒絶します");
                  echo $this->Form->select('status', $statuses, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'status' , ));?>
                </div>
              </div>
             <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">対応内容</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('comment', array('type'=>'textarea', 'id'=>"comment", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Comment', 'rows'=>10,'div'=>false, 'enabled'))?>
                  
                </div>
              </div>
              <?php echo $this->Form->hidden('id',array('value'=>$contact['Contact']['id']))?>
               <div class="form-group">
                <div class="col-lg-10 ">
                  
                  <div class="col-lg-offset-2" style="padding-left:150px">
                     

                      <button type="submit" class="btn btn-primary" id="btn-change">Edit Contact</button>
                      
                      <button type="button" class="btn btn-default" id="btn-cancel" >一覧へ戻る</button>
                    </div>
                    <script type="text/javascript">
                      $(document).ready(function(){ 
                         $('#btn-cancel').on('click', function() {
                
                             window.location.href='<?php echo $this->webroot;?>admin/contacts/change_confirm/<?php echo $contact['Contact']['id']; ?>';
                          
                        });

                        //  $('#btn-delete').on('click', function() {
                        //    $( "#dialog-confirm-delete" ).dialog("open");
                             
                          
                        // });

                         $( "#dialog-confirm-delete" ).dialog({
                          autoOpen: false,
                          resizable: true,
                          modal: true,
                          buttons: {
                            "Delete": function() {
                              window.location.href="<?php echo $this->webroot;?>admin/contacts/delete/<?php echo $contact['Contact']['id']?>";
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
          </div>
        </div>
      
      </div>
    </div>

  </div>
<div id="dialog-confirm-delete" title="Delete?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This contact will be deleted. Are you sure?</p>
  </div>
  