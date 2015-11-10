<script src="<?php echo $this->webroot;?>js/jquery.fileupload.js"></script>
<?php echo $this->element('flash_success');?>
<div class="title-tab">
  <h3 class="float-left">会員マイページトップ</h3>
  <div class="button-tab">
  <a id="button_first_login" href="#" class="link-tab-1a"><img src="<?php echo $this->webroot;?>img/front/procedure.png" alt="お手続きの流れ"/></a>
 </div>
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
    <?php echo $this->Form->create('User', array('action'=>'/update_account_info', 'id' => '_all_info', 'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'after', 'error'=>false)))); ?>
    
    <div class="block-note-style">
                <p>【入居審査お申し込みの注意点】</p>
                <ul>
                  <li>連帯保証人は、必ずご本人様の同意を得た上でご入力ください。弊社より保証意思確認の電話を差し上げます。</li>
                  <li>申込人、連帯保証人の勤務先へ在籍確認の電話を差し上げる場合がございます。</li>
                  <li>申込内容が事実と相違することが判明した場合、審査をお断りさせて頂く場合がございます。</li>
                  <li>審査の結果、お断りさせて頂く場合がございますので予めご了承ください。なお、その場合の理由や内容については一切開示されません。</li>
                  <li>審査にはご本人様の身分証明書をご提示頂きます。場合により追加で各種証明書をご提出頂く場合がございます。</li>
                  <li>申込人・配偶者・同居人・連帯保証人が、反社会的組織の構成員、若しくはこれに準ずる場合、審査をお断り致します。</li>
                </ul>
                <a href="#">「家賃でもらえる家」にかかる個人情報の取扱いに関する条項</a>
                <div class="block-button">
                  <div class="block-input-check">
                    <div class="block">
                    <?php
                          echo $this->Form->input('User.all_info_checkbox',array('type'=>'checkbox','options'=>array(1),'div'=>false, 'id'=>'all_info_checkbox','label'=>false, 'data-placement' => 'right'));
                        ?>
                    <label for="all_info_checkbox">注意点の内容に同意する　→　お申し込みの注意点と個人情報の取扱いに関する条項に同意する</label>
                  </div>
                </div>
              </div>
    </div>
    <div class="button-tab">
      <button type="submit" class="link-tab-1a" id='btn-update-info'><img src="<?php echo $this->webroot; ?>img/front/link-tab-a.png" alt="審査のお申し込み"/></button>
    </div>
    </form>
    
    <!-- SCRIPT VALIDATION -->
<script>
$('#btn-update-info').on('click', function() {
  $('#_all_info').validate();
});

$("#_all_info").validate({
      rules: {
        
        'data[User][all_info_checkbox]': {required: true}
        
      },
      messages: {
        
        'data[User][all_info_checkbox]': {required: "eo biet"}
        
      },
      invalidHandler: function(event, validator) {
        
      }
    });
    
</script>
<!-- END SCRIPT VALIDATION -->
    <?php } else { ?>
        <div class="button-tab">
      <button type="button" class="link-tab-1b" disabled="true"><img src="<?php echo $this->webroot; ?>img/front/link-tab-a.png" alt="審査のお申し込み"/></button>
    </div>
    <?php }?>
  
 
</div>
<!-- Dialog for first login-->
<div id="first_login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Dialog content-->
    <div class="modal-content">
      <div class="modal-header modal-header-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">&nbsp;</h4> 
      </div>
      <div class="modal-body">

      <p>【お手続きの流れ】</p>
      <ul>
          <li>家賃でもらえる家の建築開始までには、入居審査・各種お手続きが必要となります。</li>
          <li>まずは、下記手順に従って入居審査のお申し込みをお願い致します。</li>

          <li>1.「申込人」タブから順に「配偶者/同居人」「連帯保証人」「添付書類」タブへと、必要情報のご入力と保存をお願いします。各画面では必ず「保存ボタン」を押して登録を完了させてください。</li>

          <li>2.ご入力必須の項目は、マイページトップの「登録状況」が"未完了"となっている項目の右側に「未記入項目」に入力必須の項目名が表示されます。こちらでご確認いただくとともに、必須項目のご入力をお願いたします。</li>

          <li>3.全ての必須項目をご入力いただくと、マイページトップの下にある「審査のお申し込み」ボタンがオレンジ色になり、審査のお申し込みをいただくことが可能となります。</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default center-block button-style" data-dismiss="modal">閉じる</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
$( "#button_first_login" ).click(function() {
  $('#first_login').modal('show');
});
    
    
</script>

<?php if($user['User']['first_login']== 0){ ?>
<script type="text/javascript">
$( document ).ready(function() { 
    $('#first_login').modal('show');
    $.ajax({
      type:'POST',
      url: "<?php echo $this->webroot?>users/first_login_update",
      data: "id=<?php echo $user['User']['id']; ?>",
      success: function(result){
        //alert(result);
        //$('#home').html(result);
      }
    });
    });
</script>
<?php } ?>


