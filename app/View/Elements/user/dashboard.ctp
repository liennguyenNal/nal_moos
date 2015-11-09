<script src="<?php echo $this->webroot;?>js/jquery.fileupload.js"></script>
<?php echo $this->element('flash_success');?>
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
      <span><?php echo substr($user['User']['approved_date'], 0, 10);?></span>
    </p>
  </li>
  <li>
    <p>
      <span><?php echo __('user.my_page.max_payment'); ?> : </span>
      <span><?php echo $user['User']['max_payment'];?>&nbsp;<?php echo __('user.register.yen'); ?></span>
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
        <td style="width:40%"><?php echo __('user.my_page.error_fields'); ?></td>
      </tr>

      <!-- Basic info --> 
      <?php $i = 0; foreach ($validations['User'] as $key => $value) { $i++; ?> 
      <tr>
        <?php if($i == 1){?>
          <td RowSpan="6" class="color-b"><?php echo __('user.my_page.customer'); ?></td>
        <?php }?>
        <?php if($value['key']){?>
        <td><?php echo $value['key']?></td>
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
        <?php }?>
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
        <?php if ($validations['UserAttachment']['error'] == 1) { ?>
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
    <textarea rows="10"  style="width:100%;font-size:14px; margin-top:10px;" >【入居審査お申し込みの注意点】
    １．連帯保証人は、必ずご本人様の同意を得た上でご入力ください。弊社より保証意思確認の電話を差し上げます。
    ２．申込人、連帯保証人の勤務先へ在籍確認の電話を差し上げる場合がございます。
    ３．申込内容が事実と相違することが判明した場合、審査をお断りさせて頂く場合がございます。
    ４．審査の結果、お断りさせて頂く場合がございますので予めご了承ください。なお、その場合の理由や内容については一切開示されません。
    ５．審査にはご本人様の身分証明書をご提示頂きます。場合により追加で各種証明書をご提出頂く場合がございます。
    ６．申込人・配偶者・同居人・連帯保証人が、反社会的組織の構成員、若しくはこれに準ずる場合、審査をお断り致します。
     </textarea>
     <a href="#">「家賃でもらえる家」にかかる個人情報の取扱いに関する条項</a><br/>
     <input type="checkbox" >お申し込みの注意点と個人情報の取扱いに関する条項に同意する<br/>
    <div class="button-tab">
      <button type="button" class="link-tab-1a" id='btn-update-info'><img src="<?php echo $this->webroot; ?>img/front/link-tab-a.png" alt="審査のお申し込み"/></button>
    </div>
    <script type="text/javascript" charset="utf-8" async defer>
      $('#btn-update-info').on('click', function() {
        window.location.href = '<?php echo $this->webroot?>users/update_account_info'
      });
    </script>
    <?php } else { ?>
        <div class="button-tab">
      <button type="button" class="link-tab-1c" disabled="true"><img src="<?php echo $this->webroot; ?>img/front/link-tab-a.png" alt="審査のお申し込み"/></button>
    </div>
    <?php }?>
  </form>
 
</div>
<!-- <div class="button-tab">
  <a href="#" class="link-tab-1a"><img src="img/front/link-tab-a.png" alt="審査のお申し込み"/></a>
  <a href="#" class="link-tab-1b"><img src="img/front/link-tab-a.png" alt="審査のお申し込み"/></a>
</div> -->


