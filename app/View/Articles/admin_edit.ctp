

<div class="page-header">
    

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
        <?php //echo $this->element('admin/flash');?>
        <legend><?php if($article['Article']['id']) echo 'お知らせ 変更'; else echo 'お知らせ 新規作成'; ?></legend>
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("Article", array('action'=>'edit_confirm', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')) ?>
            <fieldset>
              
              
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label"><?php echo __('admin.articles.title'); ?><span></span></label>
                <div class="col-lg-10">
                 <!--  <textarea class="form-control" rows="5" id="textArea"></textarea> -->
                  <?php echo $this->Form->input('title', array('type'=>'textbox', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">内容</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">添付ファイル</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('small_image_file', array('type'=>'file', 'id'=>"title", 'label'=>false, 'class'=>'form-control','div'=>false))?>
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
                    echo $this->Form->select('from_year_register', $years, array('id'=>'from-year-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_year_register));
                  ?>
                 
                  <?php 
                    $months = array_combine(range(1, 12), range(1, 12));
                    echo $this->Form->select('from_month_register', $months, array('id'=>'from-month-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_month_register));
                  ?>
                  <?php 
                      $dates = array_combine(range(1, 31), range(1, 31));
                      echo $this->Form->select('from_day_register', $dates, array('id'=>'from-day-register', 'data-placement' => 'right', 'empty'=>"-----",  'value'=>$from_day_register));
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
                      'default' => '0',
                      'div'=>false
                      
                  );

                  echo $this->Form->radio('is_published', $options, $attributes); ?>
                    </label>
                  </div>
                </div>
              </div>
              <?php echo $this->Form->hidden('id');?>
              <input type="hidden" name="view" value="1">
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">確認する</button>
                  <button id="btn-cancel" type="reset" class="btn btn-default">キャンセル</button>
                  
                  
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
    

    $(function() {
      $('#btn-cancel').on('click', function() {
                
                             window.location.href="<?php echo $this->webroot;?>admin/articles/view/<?php echo $article['Article']['id'];  ?>";
                          
                        });
        $( "#created_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
      });
    
    </script>
  </div>