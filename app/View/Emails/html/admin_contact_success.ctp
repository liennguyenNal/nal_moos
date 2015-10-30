<p style=" margin:0px !important">下記の内容にて、「家賃でもらえる家」ホームページよりお問い合わせがありました。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">【お問い合わせ内容】</p>
<p style=" margin:0px !important">----------------------------------------------------</p>
<p style=" margin:0px !important">問い合わせ番号：<?php echo $contact['Contact']['id']; ?></p>
<p style=" margin:0px !important">問い合わせ日時：<?php echo date_format(date_create($contact['Contact']['created']), "Y/m/d H:i"); ?></p>
<p style=" margin:0px !important">お名前：<?php echo $contact['Contact']['first_name']." ".$contact['Contact']['last_name']; ?></p>
<p style=" margin:0px !important">会社名：<?php echo $contact['Contact']['company']; ?></p>
<p style=" margin:0px !important">電話番号：<?php echo $contact['Contact']['phone']; ?></p>
<p style=" margin:0px !important">メールアドレス：<?php echo $contact['Contact']['email']; ?></p>
<?php $types = array('1'=> __('user.contact.customer'), '2'=> __('user.contact.marketing'), '3' => __('user.contact.constructure'), '4' => __('global.other'));  ?>
<p style=" margin:0px !important">問い合わせ分類：<?php echo $types[$contact['Contact']['type']]; ?></p>
<p style=" margin:0px !important">問い合わせ内容：</p>
<p style=" margin:0px !important"><?php echo $contact['Contact']['content']; ?></p>
<p style=" margin:0px !important">----------------------------------------------------</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">問い合わせに対する回答・対応を行ってください。</p>
<p style=" margin:0px !important"><a href="<?php echo str_replace("http:", "https:" ,Router::url('/', true) ) ;?>admin/contacts/">管理画面 問い合わせ一覧ページURL </a></p>