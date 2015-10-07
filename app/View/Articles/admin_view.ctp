<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="page-header">
    

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
        <?php echo $this->element('admin/flash');?>
         <!--  <form class="form-horizontal"> -->
          
            <legend>お知らせ 詳細</legend>
            <?php echo $this->Form->create("Article", array('action'=>'edit', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')) ?>
            <fieldset>
              
              
              
             
              <div class="form-group">
                <label  class="col-lg-2 control-label"><?php echo __('admin.articles.title'); ?><span></span></label>
                <div class="col-lg-10">
                 <!--  <textarea class="form-control" rows="5" id="textArea"></textarea> -->
                  <?php echo $this->Form->input('title', array('type'=>'textbox', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Title','div'=>false, 'disabled'))?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">内容</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Content', 'rows'=>10,'div'=>false, 'disabled'))?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">添付ファイル</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php if( $article['Article']['large_image']){ ?>
                  <button type="button" class="btn btn-default" ><a target="_blank" href="<?php echo $this->webroot; ?>images/upload/news/big/<?php echo $article['Article']['large_image']; ?>"><?php echo $article['Article']['large_image']; ?></a></button>
                  <?php } ?>
                  
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">公開日（表示順序）</label>
                <div class="col-lg-10">
                  <?php 
                    $date_form_1= explode('-',$article['Article']['created']);
                    $from_year_register= $date_form_1[0];
                    $from_month_register= $date_form_1[1];
                    $from_day_register= $date_form_1[2];
                    
                    $years = array_combine(range( date("Y"), 1930), range(date("Y"), 1930));
                    echo $this->Form->select('from_year_register', $years, array('id'=>'from-year-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_year_register, 'disabled'));
                  ?>
                 
                  <?php 
                    $months = array_combine(range(1, 12), range(1, 12));
                    echo $this->Form->select('from_month_register', $months, array('id'=>'from-month-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_month_register, 'disabled'));
                  ?>
                  <?php 
                      $dates = array_combine(range(1, 31), range(1, 31));
                      echo $this->Form->select('from_day_register', $dates, array('id'=>'from-day-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_day_register, 'disabled'));
                    ?>
                  
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  
                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">公開状況</label>
                <div class="col-lg-10">
                  
                  <div class="checkbox">
                    <label>
                      <?php $options = array(
                      '0' => '非公開',
                      '1' => '公開'
                  );

                  $attributes = array(
                      'legend' => false,
                      'value' => $article['Article']['is_published'],
                      'disabled'
                  );

                  echo $this->Form->radio('type', $options, $attributes); ?>
                    </label>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="button" class="btn btn-danger" id="btn-delete">削除する</button>
                  <button type="button" class="btn btn-primary" id="btn-change">変更する</button>
                  
                  <button type="button" class="btn btn-default" id="btn-cancel" >一覧へ戻る</button>
                </div>
              </div>
            </fieldset>
            </form>
          
        </div>
      </div>
      
    </div>
<div id="dialog-confirm-delete" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>お知らせを削除しますか？</p>
  </div>

  <div id="dialog-confirm-delete1" title="削除">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>お知らせを削除すると2度と復元できません。
お知らせを削除しますか？</p>
  </div>

    <script type="text/javascript">
                      $( document ).ready(function() {
                        
                        

                         $('#btn-cancel').on('click', function() {
                
                             window.location.href='<?php echo $this->webroot;?>admin/articles';
                          
                        });
                         $('#btn-change').on('click', function() {
                
                             window.location.href="<?php echo $this->webroot; ?>admin/articles/edit/<?php echo $article['Article']['id'];  ?>";
                          
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
                             window.location.href="<?php echo $this->webroot;?>admin/articles/delete/<?php echo $article['Article']['id']; ?>";

                          },
                          'キャンセル': function() {
                            agree = false;
                            $( this ).dialog( "close" );
                          }
                        }
                      });
                    </script>
  </div>