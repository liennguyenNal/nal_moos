<?php echo $contact['Contact']['first_name']. " " . $contact['Contact']['last_name']; ?>様</br>
「家賃でもらえる家」へのお問い合わせありがとうございます。</br>
</br>
下記の内容にて、ホームページよりお問い合わせいただきました。</br>
</br>
【お問い合わせ内容】</br>
----------------------------------------------------</br>
問い合わせ番号： <?php echo $contact['Contact']['id']; ?></br>
問い合わせ日時：<?php echo date_format(date_create($contact['Contact']['created']), "Y/m/d H:i"); ?></br>
お名前：<?php echo $contact['Contact']['first_name']." ".$contact['Contact']['last_name']; ?></br>
会社名：<?php echo $contact['Contact']['company']; ?></br>
電話番号：<?php echo $contact['Contact']['phone']; ?></br>
メールアドレス：<?php echo $contact['Contact']['email']; ?></br>
<?php $types = array('1'=> __('user.contact.customer'), '2'=> __('user.contact.marketing'), '3' => __('user.contact.constructure'), '4' => __('global.other'));  ?>
問い合わせ分類：<?php echo $types[$contact['Contact']['type']]; ?></br>
問い合わせ内容：</br>
<?php echo nl2br($contact['Contact']['content']); ?></br>
----------------------------------------------------</br>
※このメールにお心当たりの無い方は、誠にお手数ですが<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a>よりご連絡下さい。</br>
</br>
内容を確認後、担当者から折り返しご連絡させていただきますので、暫くお待ち下さい。</br>
</br>
=========================================</br>
リネシス株式会社</br>
家賃でもらえる家運営事務局</br>
</br>
〒108-0074 </br>
東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</br>
<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a></br>
=========================================</br>