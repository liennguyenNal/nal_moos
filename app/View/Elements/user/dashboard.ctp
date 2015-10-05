<script src="<?php echo $this->webroot;?>js/jquery.fileupload.js"></script>
<?php echo $this->element('flash');?>
<div class="title-tab">
  <h3>会員マイページトップ</h3>
</div>
<ul class="list-table-style">
  <li>
    <p><span><?php echo __('user.my_page.status'); ?> : </span><span class="red"><?php print_r($user['Status']['name']); ?></span></p>
  </li>
  <li>
    <p>
      <span><?php echo __('user.my_page.register_date'); ?> : </span>
      <span><?php echo substr($user['User']['created'], 0, 10);?></span>
    </p>
    <p>
      <span><?php echo __('user.my_page.update_date'); ?> : </span>
      <span><?php echo substr($user['User']['updated_date'], 0, 10);?></span>
    </p>
    <p>
      <span><?php echo __('user.my_page.approve_date'); ?> : </span>
      <span><?php echo $user['User']['approved_date'];?></span>
    </p>
  </li>
  <li>
    <p>
      <span><?php echo __('user.my_page.max_payment'); ?> : </span>
      <span><?php echo $user['User']['max_payment'];?></span>
    </p>
    <p>
      <span><?php echo __('user.my_page.payment_date'); ?> : </span>
      <span><?php echo substr($user['User']['payment_date'], 0, 10);?></span>
    </p>
  </li>
</ul>
<div class="table-style">
  <?php 
        echo $this->Form->create("User", array('action'=>'update_my_page','id'=>'UserUpdateForm' ,'class'=>'form-horizontal', 'inputDefaults' => array(
          'format' => array('before', 'label', 'between', 'input', 'after',  'error' )))) 
  ?>
    <table>
      <tr>
        <td class="color-a"><?php echo __('user.my_page.object'); ?></td>
        <td><?php echo __('user.my_page.infomation'); ?></td> 
        <td class="color-a"><?php echo __('user.my_page.status'); ?></td>
        <td><?php echo __('user.my_page.error_fields'); ?></td>
      </tr>

      <!-- Basic info --> 
      <tr>
        <td RowSpan="7" class="color-b"><?php echo __('user.my_page.customer'); ?></td>
        <?php $i = 0; foreach ($validations['User'] as $key => $value) { $i++; ?> 
        <td><?php echo $value['key']?></td>
        <td class="color-b">
          <?php if($value['error'] == 1) echo __('user.my_page.status.un_completed'); else echo __('user.my_page.status.completed')?>
        </td>
        <td>
          <?php foreach ($value['fields'] as $value) {
            echo $value . ", ";
          }?>
        </td>
      </tr>
      <?php } ?>
      <!-- End basic info -->

      <!-- Partner -->
      <tr>
        <td RowSpan="4" class="color-b"><?php echo __('user.my_page.partner'); ?></td>
        <?php $i = 0; foreach ($validations['UserPartner'] as $key => $value) { $i++; ?>
        <td>
          <?php echo $value['key']?>
        </td>
        <?php if ($value['error'] == 1) { ?>
        <td class="color-b">
          <span><?php echo __('user.my_page.status.un_completed'); ?></span>
        </td>
        <?php } else { ?>
        <td class="color-b">
          <?php echo __('user.my_page.status.completed'); ?>
        </td>
        <?php } ?>
        <td>
          <?php foreach ($value['fields'] as $value) {
            echo $value . ", ";
          }?>
        </td>
      </tr>
      <?php } ?>
      <!-- End partner -->

      <!-- Guarantor 1 -->
      <tr>
        <td RowSpan="4" class="color-b"><?php echo __('user.my_page.guarantor'); ?></td>
        <?php $i = 0; foreach ($validations['UserGuarantor'] as $key => $value) { $i++; ?>
        <td>
         <?php echo $value['key']?>
        </td>
        <?php if ($value['error'] == 1) { ?>
        <td class="color-b">
          <span><?php echo __('user.my_page.status.un_completed'); ?></span>
        </td>
        <?php } else { ?>
        <td class="color-b">
          <?php echo __('user.my_page.status.completed'); ?>
        </td>
        <?php } ?>
        <td>
          <?php foreach ($value['fields'] as $value) {
            echo $value . ", ";
          }?>
        </td>
      </tr>
      <?php } ?>
      <!-- End guarantor 1 -->

      <!-- Guarantor 2 -->
      <?php if($user['User']['need_more_guarantor']){?>
      <tr>
        <td RowSpan="4" class="color-b"><?php echo __('user.my_page.guarantor') . " 2"; ?></td>
      <?php $i = 0; foreach ($validations['OtherGuarantor'] as $key => $value) { $i++; ?>
        <td>
         <?php echo $value['key']?>
        </td>
        <?php if ($value['error'] == 1) { ?>
        <td class="color-b">
          <span><?php echo __('user.my_page.status.un_completed'); ?></span>
        </td>
        <?php } else { ?>
        <td class="color-b">
          <?php echo __('user.my_page.status.completed'); ?>
        </td>
        <?php } ?>
        <td>
          <?php foreach ($value['fields'] as $value) {
            echo $value . ", ";
          }?>
        </td>
      </tr>
      <?php } ?>
      <?php }?>

      <!-- Attachment -->
      <tr>
        <td class="color-b"><?php echo __('user.my_page.attachment')?></td>
        <td>
          <?php echo $validations['UserAttachment']['key'];?>
        </td>
        <?php if ($value['error'] == 1) { ?>
        <td class="color-b">
          <span><?php echo __('user.my_page.status.un_completed'); ?></span>
        </td>
        <?php } else { ?>
        <td class="color-b">
          <?php echo __('user.my_page.status.completed'); ?>
        </td>
        <?php } ?>
        <td>
          <?php if($validations['UserAttachment']['error']) echo $validations['UserAttachment']['error_msg'] ; ?>
        </td>
      </tr>
      <!-- End attachment -->
    </table>

    <?php if($user['User']['status_id'] == 2   && !$validations['error']) { ?>
    <div class="button-tab">
      <button type="button" class="link-tab-1a" id='btn-update-info'><img src="<?php echo $this->webroot; ?>img/front/link-tab-a.png" alt="審査のお申し込み"/></button>
    </div>
    <script type="text/javascript" charset="utf-8" async defer>
      $('#btn-update-info').on('click', function() {
        window.location.href = '<?php echo $this->webroot?>users/update_account_info'
      });
    </script>
    <?php } ?>
  </form>
</div>
<!-- <div class="button-tab">
  <a href="#" class="link-tab-1a"><img src="img/front/link-tab-a.png" alt="審査のお申し込み"/></a>
  <a href="#" class="link-tab-1b"><img src="img/front/link-tab-a.png" alt="審査のお申し込み"/></a>
</div> -->


