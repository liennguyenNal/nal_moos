
<script src="<?php echo $this->webroot;?>js/jquery.fileupload.js"></script>
<div class="page-header">
    <?php echo $this->element('flash');?>

    <div class="row">
      	<div class="col-lg-12">
        	<?php echo $this->Form->create("User", array('action'=>'update_my_page','id'=>'UserUpdateForm' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        	'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
	        <div class="well bs-component">

              <table class="table table-striped table-hover ">
                <thead>
                  <th>Object</th>
                  <th>Information</th>
                  <th>Status</th>
                  <th>Fields Error</th>
                </thead>
              	<tbody>
                  
                          <?php $i = 0; foreach ($validations['User'] as $key => $value) { $i++; ?>
                         
                          <tr>
                          <td><?php if($i == 1) echo "Customer Info"; ?></td>
                            <td>
                             <?php echo $value['key']?>
                            </td>
                             <td>
                                <?php if($value['error'] == 1) echo "Un-completed"; else echo "Completed"?>
                            </td>

                             <td>
                              <?php foreach ($value['fields'] as $value) {
                                echo $value . ", ";
                              }?>
                            </td>
                          </tr>
                          <?php } ?>
                          <?php $i = 0; foreach ($validations['UserPartner'] as $key => $value) { $i++; ?>
                         
                          <tr>
                          <td><?php if($i == 1) echo "Partner/Relation"; ?></td>
                            <td>
                             <?php echo $value['key']?>
                            </td>
                             <td>
                                <?php if($value['error'] == 1) echo "Un-completed"; else echo "Completed" ?>
                            </td>

                             <td>
                              <?php foreach ($value['fields'] as $value) {
                                echo $value . ", ";
                              }?>
                            </td>
                          </tr>
                          <?php } ?>
                          <?php $i = 0; foreach ($validations['UserGuarantor'] as $key => $value) { $i++; ?>
                         
                          <tr>
                          <td><?php if($i == 1) echo "Guarantor"; ?></td>
                            <td>
                             <?php echo $value['key']?>
                            </td>
                             <td>
                                <?php if($value['error'] == 1) echo "Un-completed"; else echo "Completed"?>
                            </td>

                             <td>
                              <?php foreach ($value['fields'] as $value) {
                                echo $value . ", ";
                              }?>
                            </td>
                          </tr>
                          <?php } ?>

                          <tr>
                            <td>Attachment</td>
                            <td>
                              <?php echo $validations['UserAttachment']['key'];?>
                            </td>
                            <td>
                              <?php if($validations['UserAttachment']['error']) echo "Un-completed"; else echo "Completed" ?>
                            </td>
                            <td><?php if($validations['UserAttachment']['error']) echo $validations['UserAttachment']['error_msg'] ; ?></td>
                          </tr>

                        
                </tbody>
               </table>
               <?php if($user['User']['status_id'] == 2   && !$validations['error']) {?>
                 <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    
                    <button type="button" class="btn btn-primary" id='btn-update-info'> Send</button>
                  </div>
                </div>
                <script type="text/javascript" charset="utf-8" async defer>
                      $('#btn-update-info').on('click', function() {
                        //alert(1111);
                        window.location.href = '<?php echo $this->webroot?>users/update_account_info'
                      });

                </script>
                <?php }?>
	        </div>
          </form>
        </div>
    </div>
</div>