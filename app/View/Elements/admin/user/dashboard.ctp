
<script src="<?php echo $this->webroot;?>js/jquery.fileupload.js"></script>
<div class="page-header">
    <?php echo $this->element('flash');?>
    <div class="row">
        <div class="col-lg-12">

           <table class="table table-striped table-hover ">
              <tr>
                <td colspan="3">
                <label><?php echo __('user.my_page.status'); ?>  </label>
                <?php echo $user['Status']['name'];?>
                </td>
              </tr>
              <tr>
                <td>
                  <label><?php echo __('user.my_page.register_date'); ?> </label>
                  <?php echo substr($user['User']['created'], 0, 10);?>

                </td>
                <td>
                   <label><?php echo __('user.my_page.update_date'); ?> </label>
                    <?php echo substr($user['User']['updated_date'], 0, 10);?>
                </td>
                <td>
                   <?php echo __('user.my_page.approve_date'); ?> 
                   <?php echo $user['User']['approved_date'];?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php echo __('user.my_page.max_payment'); ?> 
                   <?php echo $user['User']['max_payment'];?>
                   <button type="button" class="btn btn-success" id="btn-set-max-payment"><?php echo __('admin.user.view.set_max_payment_button')?></button>
                </td>
                <td colspan="2">
                     <?php echo __('user.my_page.payment_date'); ?> 
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
                          <td><?php if($i == 1) echo __('user.my_page.customer'); ?></td>
                            <td>
                             <?php echo $value['key']?>
                            </td>
                             <td>
                                <?php if($value['error'] == 1) echo __("user.my_page.status.completed"); else echo __("user.my_page.status.un_completed")?>
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
                                <?php if($value['error'] == 1) echo __("user.my_page.status.completed"); else echo __("user.my_page.status.un_completed")?>
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
                                <?php if($value['error'] == 1) echo __("user.my_page.status.completed"); else echo __("user.my_page.status.un_completed")?>
                            </td>

                             <td>
                              <?php foreach ($value['fields'] as $value) {
                                echo $value . ", ";
                              }?>
                            </td>
                          </tr>
                          <?php } ?>

                          <tr>
                            <td>添付書類</td>
                            <td>
                              <?php echo $validations['UserAttachment']['key'];?>
                            </td>
                            <td>
                              <?php if($validations['UserAttachment']['error'])  echo __("user.my_page.status.completed"); else echo __("user.my_page.status.un_completed")?>
                            </td>
                            <td><?php if($validations['UserAttachment']['error']) echo $validations['UserAttachment']['error_msg'] ; ?></td>
                          </tr>

                        
                </tbody>
               </table>
               
	        </div>
          </form>
        </div>
    </div>
</div>