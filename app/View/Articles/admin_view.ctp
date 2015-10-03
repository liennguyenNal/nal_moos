<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
          
            <legend>View</legend>
            <?php echo $this->Form->create("Article", array('action'=>'edit', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')) ?>
            <fieldset>
              
              
              
             
              <div class="form-group">
                <label  class="col-lg-2 control-label">Title<span></span></label>
                <div class="col-lg-10">
                 <!--  <textarea class="form-control" rows="5" id="textArea"></textarea> -->
                  <?php echo $this->Form->input('title', array('type'=>'textbox', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Title','div'=>false, 'disabled'))?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Content</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Content', 'rows'=>10,'div'=>false, 'disabled'))?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Image</label>
                <div class="col-lg-10">
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  <?php if( $article['Article']['large_image']){ ?>
                  <button type="button" class="btn btn-default" ><a target="_blank" href="<?php echo $this->webroot; ?>images/upload/news/big/<?php echo $article['Article']['large_image']; ?>"><?php echo $article['Article']['large_image']; ?></a></button>
                  <?php } ?>
                  
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Created Date</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('created', array('type'=>'text', 'id'=>"created", 'label'=>false, 'class'=>'form-control','div'=>false, 'disabled'))?>
                  <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Title of News"> -->
                  
                  
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Status</label>
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
                      'disabled'
                  );

                  echo $this->Form->radio('type', $options, $attributes); ?>
                    </label>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="button" class="btn btn-danger" id="btn-delete">Delete</button>
                  <button type="button" class="btn btn-primary" id="btn-change">Edit</button>
                  
                  <button type="button" class="btn btn-default" id="btn-cancel" >Back to List</button>
                </div>
              </div>
            </fieldset>
            </form>
          
        </div>
      </div>
      
    </div>
    <div id="dialog-confirm-delete" title="Delete this users?">
      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>All selected user will be deleted. Are you sure?</p>
    </div>

    <div id="dialog-confirm-delete1" title="Confirm delete this users?">
      <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure?</p>
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
                          "Delete": function() {
                            $( "#dialog-confirm-delete1" ).dialog("open");
                            $( this ).dialog( "close" );
                            event.preventDefault();
                          },
                          Cancel: function() {
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
                          "Delete": function() {
                            
                            $( this ).dialog( "close" );
                             window.location.href="<?php echo $this->webroot;?>admin/articles/delete/<?php echo $article['Article']['id']; ?>";

                          },
                          Cancel: function() {
                            agree = false;
                            $( this ).dialog( "close" );
                          }
                        }
                      });
                    </script>
  </div>