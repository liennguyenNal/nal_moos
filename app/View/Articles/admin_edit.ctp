

<div class="page-header">
    <div class="row">
      <div class="col-lg-4">
        <div class="bs-component">
           <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              
              <li><a href="<?php echo $this->webroot; ?>admin/articles/">News</a></li>
              <li class="active">Edit</li>
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
        <?php echo $this->element('admin/flash');?>
        <legend>Edit</legend>
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("Article", array('action'=>'edit_confirm', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')) ?>
            <fieldset>
              
              
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Title<span></span></label>
                <div class="col-lg-10">
                 <!--  <textarea class="form-control" rows="5" id="textArea"></textarea> -->
                  <?php echo $this->Form->input('title', array('type'=>'textbox', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Title','div'=>false))?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Content</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Content', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Image</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('small_image_file', array('type'=>'file', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Small Image','div'=>false))?>
                  <?php if( $article['Article']['large_image']){ ?>
                  <button type="button" class="btn btn-default" ><a target="_blank" href="<?php echo $this->webroot; ?>images/upload/news/big/<?php echo $article['Article']['large_image']; ?>"><?php echo $article['Article']['large_image']; ?></a></button>
                  <?php } ?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Created Date</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('created', array('type'=>'text', 'id'=>"created_date", 'label'=>false, 'class'=>'form-control','div'=>false))?>
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  
                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                  
                  <div class="checkbox">
                    <label>
                      <?php $options = array(
                      '0' => 'Unpublished',
                      '1' => 'Published'
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
                  <button id="btn-cancel" type="reset" class="btn btn-default">キャンセル</button>
                  <button type="submit" class="btn btn-primary">送信</button>
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