
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
                        if($item['attachment_type_id'] == $i){
                          $file_name = $item['file_name'];
                          break; 
                        }
                      }
                     
                    ?>
              				<div class="col-lg-10 col-lg-offset-2">
                      
              				   
                         <?php  if($file_name){ ?>
                         
                           <div id="file-<?php echo $i ?>"><a href="<?php echo $this->webroot;?>files/upload/<?php echo $file_name;?>"><?php echo $file_name;?></a></div>
                        
                       
                      <?php } else {?>
                          <p>Not Available</p>
                      <?php } ?>
		                 	</div>
                      
              			</td>


              		</tr>
              		<?php } ?>

              	</tbody>
               
               </table>
	        </div>
          </form>
        </div>
    </div>
</div>