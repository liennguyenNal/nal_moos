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
      	
      	<?php echo $this->Form->create("Contact", array('action'=>'change_confirm', 'id'=>'form', 'class'=>'form-horizontal')) ?>
            <fieldset>
              <legend>Confirm Save Change Contact </legend>
              <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Name</label>
                <div class="col-lg-10">
                  <table>
                    <tr >
                      <td>

                        <?php echo $this->Form->input('first_name', array('type'=>'text', 'id'=>"first_name", 'label'=>'First name', 'class'=>'form-control', "placeholder"=>'First Name','div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name', array('type'=>'text', 'id'=>"last_name", 'label'=>'Last name', 'class'=>'form-control', "placeholder"=>'Last Name','div'=>false))?>
                      </td>
                    </tr>
                    <tr>
                      <td>

                        <?php echo $this->Form->input('first_name_kana', array('type'=>'text', 'id'=>"first_name_kana", 'label'=>'First name kana', 'class'=>'form-control', "placeholder"=>'First Name kana','div'=>false))?>
                      </td>
                       <td style="padding-left:20px">

                        <?php echo $this->Form->input('last_name_kana', array('type'=>'text', 'id'=>"last_name_kana", 'label'=>'Last name kana', 'class'=>'form-control', "placeholder"=>'Last Name Kana','div'=>false))?>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="form-group">
                  <label for="title" class="col-lg-2 control-label">Contact Type</label>
                  <div class="col-lg-10">
                    <?php 
                    echo $this->Form->radio('type', array("1" => "Normal","2"=> "Media","3"=> "Construction Company", "4"=> "Other"), array( 'class'=>'radio','style'=>'display:inline; padding:10px, padding-left:100px;margin:10px', 'label'=>false, 'div'=>false, 'legend'=>false, 'default'=>"1"));
                  ?>  
                  </div>
                </div>
              <div class="form-group">
                <label for="title" class="col-lg-2 control-label">Company Name</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('company', array('type'=>'text', 'id'=>"comapny_name", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Company Name','div'=>false))?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Phone</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('phone', array('type'=>'text', 'id'=>"title", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Your Name','div'=>false))?>
                </div>
              </div>
              
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('email', array('type'=>'text', 'id'=>"email", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Your Email','div'=>false))?>
                </div>
              </div>            
              
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Content</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('content', array('type'=>'textarea', 'id'=>"content", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Content', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              
              
            </fieldset>
          
          
        <div class="bs-component">
            
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Date Send</label>
                <div class="col-lg-10">
                  <?php echo $contact['Contact']['created'];?>
                </div>
              </div>            
              
             
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Process</span></label>
                <div class="col-lg-10">
                  <?php 
                    $statuses = array("2"=>"Resolved", "3"=>"Rejected");
                  echo $this->Form->select('status', $statuses, array('class'=>'form-control', 'style'=>'width:100px; display:inline','div'=>false, 'label'=>false, 'id'=>'status' , ));?>
                </div>
              </div>
             <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Comment</span></label>
                <div class="col-lg-10">
                  <?php echo $this->Form->input('comment', array('type'=>'textarea', 'id'=>"comment", 'label'=>false, 'class'=>'form-control', "placeholder"=>'Comment', 'rows'=>10,'div'=>false))?>
                  
                </div>
              </div>
              <?php echo $this->Form->hidden('id',array('value'=>$contact['Contact']['id']))?>
               <div class="form-group">
                <div class="col-lg-10 ">
                  
                  <div class="col-lg-offset-2" style="padding-left:150px">
                     
                     

                      <button type="submit" class="btn btn-primary" id="btn-change">Confirm</button>
                      
                      <button type="button" class="btn btn-default" id="btn-cancel" >Cancel</button>
                    </div>
                    <script type="text/javascript">
                      $( document ).ready(function() {
                        var $curr = $( "#start" );
                        $('#form').find(':input:not(:button):not(:disabled):not(:hidden)').prop('disabled',true);

                         $('#btn-cancel').on('click', function() {
                
                             window.location.href='<?php echo $this->webroot;?>admin/contacts';
                          
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
  