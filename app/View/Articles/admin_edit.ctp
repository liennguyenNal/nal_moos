

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
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("Article", array('action'=>'edit', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')) ?>
            <fieldset>
              <legend>Create News</legend>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('title', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Title of News','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Image</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('small_image_file', array('type'=>'file', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Small Image','div'=>false))?>
                </div>
              </div>
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Short Decription<span></span></label>
                <div class="col-lg-10">
                 <!--  <textarea class="form-control" rows="5" id="textArea"></textarea> -->
                  <?php echo $this->Form->input('short_content', array('type'=>'textarea', 'id'=>"short_description", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Short Content', 'rows'=>5,'div'=>false))?>
                  <span class="help-block">(less than 500 characters)</span>
                </div>
              </div>
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Content</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Content', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Author</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('author', array('type'=>'text', 'id'=>"author", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Author','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label"></label>
                <div class="col-lg-10">
                  
                  <div class="checkbox">
                    <label>
                      <?php echo $this->Form->input('is_published', array('type'=>'checkbox', 'id'=>"is_published", 'label'=>false,'div'=>false))?> Published
                    </label>
                  </div>
                </div>
              </div>
              <?php echo $this->Form->hidden('id');?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">キャンセル</button>
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>