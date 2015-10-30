
<p style=" margin:0px !important"><?php echo $contact['Contact']['first_name']. " " . $contact['Contact']['last_name']; ?>様</p>
<p style=" margin:0px !important">「家賃でもらえる家」へのお問い合わせありがとうございます。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">下記の内容にて、ホームページよりお問い合わせいただきました。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">【お問い合わせ内容】</p>
<p style=" margin:0px !important">----------------------------------------------------</p>
<p style=" margin:0px !important">問い合わせ番号： <?php echo $contact['Contact']['id']; ?></p>
<p style=" margin:0px !important">問い合わせ日時：<?php echo date_format(date_create($contact['Contact']['created']), "Y/m/d H:i"); ?></p>
<p style=" margin:0px !important">お名前：<?php echo $contact['Contact']['first_name']." ".$contact['Contact']['last_name']; ?></p>
<p style=" margin:0px !important">会社名：<?php echo $contact['Contact']['company']; ?></p>
<p style=" margin:0px !important">電話番号：<?php echo $contact['Contact']['phone']; ?></p>
<p style=" margin:0px !important">メールアドレス：<?php echo $contact['Contact']['email']; ?></p>
<?php $types = array('1'=> __('user.contact.customer'), '2'=> __('user.contact.marketing'), '3' => __('user.contact.constructure'), '4' => __('global.other'));  ?>
<p style=" margin:0px !important">問い合わせ分類：<?php echo $types[$contact['Contact']['type']]; ?></p>
<p style=" margin:0px !important">問い合わせ内容：</p>
<p style=" margin:0px !important"><?php echo nl2br($contact['Contact']['content']); ?></p>
<p style=" margin:0px !important">----------------------------------------------------</p>
<p style=" margin:0px !important">※このメールにお心当たりの無い方は、誠にお手数ですが<a href="<?php echo str_replace("https:", "http:" ,Router::url('/', true) ) ;?>contact">お問い合わせフォーム</a>よりご連絡下さい。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">内容を確認後、担当者から折り返しご連絡させていただきますので、暫くお待ち下さい。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">=========================================</p>
<p style=" margin:0px !important">リネシス株式会社</p>
<p style=" margin:0px !important">家賃でもらえる家運営事務局</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">〒108-0074 </p>
<p style=" margin:0px !important">東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</p>
<p style=" margin:0px !important"><a href="<?php echo str_replace("https:", "http:" ,Router::url('/', true) ) ;?>contact">お問い合わせフォーム</a></p>
<p style=" margin:0px !important">=========================================</p>
