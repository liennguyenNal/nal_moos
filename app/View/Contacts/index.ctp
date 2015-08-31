

<div class="page-header">
    <div class="row">
      <div class="col-lg-4">
        <div class="bs-component">
           <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              
              <li class="active">Contact</li>
              
            </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="well bs-component">
        <?php echo $this->element('flash');?>
         <!--  <form class="form-horizontal"> -->
          <?php echo $this->Form->create("Contact", array('action'=>'index', 'class'=>'form-horizontal')) ?>
            <fieldset>
              <legend>Contact Us</legend>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Your Email','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Name<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('name', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Your Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Title<span style="color:red">*<span></label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php echo $this->Form->input('title', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Title','div'=>false))?>
                </div>
              </div>
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Content<span style="color:red">*<span></span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Content', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>