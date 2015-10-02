
<script src="<?php echo $this->webroot;?>js/jquery.fileupload.js"></script>
<div class="page-header">
    <?php echo $this->element('flash');?>
     <div class="row">
        <div class="col-lg-12">

           <table class="table table-striped table-hover ">
              <tr>
                <td colspan="3">
                 <label><?php echo __('user.my_page.status'); ?> :</label>
                 <?php print_r($user['Status']['name']); ?>
                </td>
              </tr>
              <tr>
                <td>
                  <label><?php echo __('user.my_page.register_date'); ?>: </label>
                  <?php echo substr($user['User']['created'], 0, 10);?>

                </td>
                <td>
                   <label><?php echo __('user.my_page.update_date'); ?>: </label>
                    <?php echo substr($user['User']['updated_date'], 0, 10);?>
                </td>
                <td>
                   <label><?php echo __('user.my_page.approve_date'); ?> :</label>
                   <?php echo $user['User']['approved_date'];?>
                </td>
              </tr>
              <tr>
                <td>
                  <label><?php echo __('user.my_page.max_payment'); ?> :</label>
                   <?php echo $user['User']['max_payment'];?>
                
                </td>
                <td colspan="2">
                    <label> <?php echo __('user.my_page.payment_date'); ?> :</label>
                    <?php echo substr($user['User']['payment_date'], 0, 10);?>
                </td>
              </tr>
           </table>
        </div>
      </div>
    <div class="row">
      	<div class="col-lg-12">
        	<?php echo $this->Form->create("User", array('action'=>'update_my_page','id'=>'UserUpdateForm' ,'class'=>'form-horizontal', 'inputDefaults' => array(
        	'format' => array('before', 'label', 'between', 'input', 'after',  'error'  ) ) ) ) ?>
	        <div class="well bs-component">

              <table class="table table-striped table-hover ">
                <thead>
                  <th><?php echo __('user.my_page.object'); ?></th>
                  <th><?php echo __('user.my_page.infomation'); ?></th>
                  <th><?php echo __('user.my_page.status'); ?></th>
                  <th><?php echo __('user.my_page.error_fields'); ?></th>
                </thead>
              	<tbody>
                  
                          <?php $i = 0; foreach ($validations['User'] as $key => $value) { $i++; ?>
                         
                          <tr>
                          <td><?php if($i == 1) __('user.my_page.partner'); ?></td>
                            <td>
                             <?php echo $value['key']?>
                            </td>
                             <td>
                                <?php if($value['error'] == 1) echo __('user.my_page.status.un_completed'); else echo __('user.my_page.status.completed')?>
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
                          <td><?php if($i == 1) echo __('user.my_page.partner'); ?></td>
                            <td>
                             <?php echo $value['key']?>
                            </td>
                             <td>
                                  <?php if($value['error'] == 1) echo __('user.my_page.status.un_completed'); else echo __('user.my_page.status.completed')?>
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
                          <td><?php if($i == 1) echo __('user.my_page.guarantor'); ?></td>
                            <td>
                             <?php echo $value['key']?>
                            </td>
                             <td>
                                  <?php if($value['error'] == 1) echo __('user.my_page.status.un_completed'); else echo __('user.my_page.status.completed')?>
                            </td>

                             <td>
                              <?php foreach ($value['fields'] as $value) {
                                echo $value . ", ";
                              }?>
                            </td>
                          </tr>
                          <?php } ?>

                          <?php if($user['User']['need_more_guarantor']){?>
                           <?php $i = 0; foreach ($validations['OtherGuarantor'] as $key => $value) { $i++; ?>
                         
                          <tr>
                          <td><?php if($i == 1) echo __('user.my_page.guarantor') . " 2"; ?></td>
                            <td>
                             <?php echo $value['key']?>
                            </td>
                             <td>
                                  <?php if($value['error'] == 1) echo __('user.my_page.status.un_completed'); else echo __('user.my_page.status.completed')?>
                            </td>

                             <td>
                              <?php foreach ($value['fields'] as $value) {
                                echo $value . ", ";
                              }?>
                            </td>
                          </tr>
                          <?php } ?>
                          <?php }?>
                          <tr>
                            <td><?php echo __('user.my_page.attachment')?></td>
                            <td>
                              <?php echo $validations['UserAttachment']['key'];?>
                            </td>
                            <td>
                                <?php if($validations['UserAttachment']['error'] == 1) echo __('user.my_page.status.un_completed'); else echo __('user.my_page.status.completed')?>
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