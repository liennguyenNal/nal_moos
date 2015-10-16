下記の内容にて、「家賃でもらえる家」ホームページよりお問い合わせがありました。</br>
</br>
【お問い合わせ内容】</br>
----------------------------------------------------</br>
問い合わせ番号：<?php echo $contact['Contact']['id']; ?></br>
問い合わせ日時：<?php echo date_format(date_create($contact['Contact']['created']), "Y/m/d H:i"); ?></br>
お名前：<?php echo $contact['Contact']['first_name']." ".$contact['Contact']['last_name']; ?></br>
会社名：<?php echo $contact['Contact']['company']; ?></br>
電話番号：<?php echo $contact['Contact']['phone']; ?></br>
メールアドレス：<?php echo $contact['Contact']['email']; ?></br>
<?php $types = array('1'=> __('user.contact.customer'), '2'=> __('user.contact.marketing'), '3' => __('user.contact.constructure'), '4' => __('global.other'));  ?>
問い合わせ分類：<?php echo $types[$contact['Contact']['type']]; ?></br>
問い合わせ内容：</br>
<?php echo $contact['Contact']['content']; ?></br>
----------------------------------------------------</br>
</br>
問い合わせに対する回答・対応を行ってください。</br>
<a href="<?php echo Router::url('/', true) ?>admin/contacts/">管理画面 問い合わせ一覧ページURL </a></br>