
<script src="<?php echo $this->webroot;?>js/jquery.fileupload.js"></script>
<div class="page-header">
    <?php echo $this->element('flash');?>

    <div class="row">
      	<div class="col-lg-12">
        	<?php echo $this->Form->create("User", array('action'=>'edit','id'=>'UserAttachForm' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        	'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
	        <div class="well bs-component">

              <table class="table table-striped table-hover ">
              	<thead>
              		<th>Type</th>
              		<th>Description</th>
              		<th>File</th>

              	</thead>
              	<tbody>
              		<?php  foreach ($attachment_types as $type) { 
              			$i = $type['AttachmentType']['id'];
              			?>
              		<tr>
              			<td>
              				<?php echo $type['AttachmentType']['name']?>
              				<?php if($type['AttachmentType']['is_required']){?> 
              				<span style="color:red">*</span>
              				<?php } ?>
              			</td>
              			<td>
              				<?php echo nl2br($type['AttachmentType']['description']);?>
              			</td>
              			<td>
                    <?php 
                    
                    
                    $file_name = "";
                      foreach($user['UserAttachment'] as $item){
                        //print_r($item);
                        if($item['attachment_type_id'] == $i){
                          $file_name = $item['file_name'];
                          break; 
                        }
                      }
                     
                    ?>
              				<div class="col-lg-10 col-lg-offset-2">
                      
              				   
                         <?php  if(!$file_name){ ?>
                         <div id="file-<?php echo $i ?>"></div>
			                     <input id="fileupload-<?php echo $i ?>" type="file" name="data[Attachment][file][<?php echo $i ?>]" />
                           <?php } else { ?>  
                           <div id="file-<?php echo $i ?>"><?php echo $file_name;?><a onclick='delete_file(<?php echo $i ?>);' href='javascript:void(0)'> X </a></div>
                        
                        <input id="fileupload-<?php echo $i ?>" type="file" name="data[Attachment][file][<?php echo $i ?>]" style='display:none'/>
                      <?php } ?>
		                 	</div>
                      
              			</td>


              		</tr>
              		<?php } ?>

              	</tbody>
                <?php if($user['User']['status_id']!= 2) {?>
                <script type="text/javascript" charset="utf-8">

                $('#UserAttachForm').find(':input').hide();
                $('#UserAttachForm').find('a').hide();
                </script>
              <?php }?>
              	<script type="text/javascript">
              		$(function () {
					    'use strict';
					    // Change this to the location of your server-side upload handler:
					    var url = "<?php echo $this->webroot;?>attachments/upload/";
               var reload_url = "<?php echo $this->webroot?>users/reload_dashboard";
					    <?php foreach($attachment_types as $type){
						$i = $type['AttachmentType']['id'];
					   

					    echo "$('#fileupload-$i').fileupload({
					        url: url + '$i',
					        dataType: 'json',
					        done: function (e, data) {
					        	if(data.result.error == '0'){
					        		$('<p/>').html(data.result.filename + '<a onclick=\'delete_file($i);\' href=\'#\'> X </a>').appendTo('#file-$i');
					        		$('#fileupload-$i').hide();
                      $.ajax({
                             url: reload_url,
                              success: function(result){
                                $('#home').html(result);
                              }
                          });
					        	}
					        	else {
					        		alert(data.result.error_msg);
					        	}

					          

					        	}
					    	});";
					 	} ?>

					});
					function delete_file(id){
				 		$.ajax({url: "<?php echo $this->webroot;?>attachments/remove_file/" + id, success: function(result){
				 			$("#file-"+id).html("");
						  $('#fileupload-'+id).show();
              $.ajax({
                 url: '<?php echo $this->webroot?>users/reload_dashboard',
                  success: function(result){
                    $('#home').html(result);
                  }
              });
						}});
				 	}
              	</script>
               </table>
	        </div>
          </form>
        </div>
    </div>
</div>