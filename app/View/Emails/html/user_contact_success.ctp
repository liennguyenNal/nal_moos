<p><?php echo $contact['Contact']['first_name'].$contact['Contact']['last_name']; ?>様</p>
<p>「家賃でもらえる家」へのお問い合わせありがとうございます。</p>

<p>下記の内容にて、ホームページよりお問い合わせいただきました。</p>

<p>【お問い合わせ内容】</p>
<p>----------------------------------------------------</p>
<p>問い合わせ番号： <?php echo $contact['Contact']['id']; ?></p>
<p>問い合わせ日時：<?php echo date_format(date_create($contact['Contact']['created']), "Y/m/d H:i"); ?></p>
<p>お名前：<?php echo $contact['Contact']['first_name']." ".$contact['Contact']['last_name']; ?></p>
<p>会社名：<?php echo $contact['Contact']['company']; ?></p>
<p>電話番号：<?php echo $contact['Contact']['phone']; ?></p>
<p>メールアドレス：<?php echo $contact['Contact']['email']; ?></p>
<?php $types = array('1'=> __('user.contact.customer'), '2'=> __('user.contact.marketing'), '3' => __('user.contact.constructure'), '4' => __('global.other'));  ?>
<p>問い合わせ分類：<?php echo $types[$contact['Contact']['type']]; ?></p>
<p>問い合わせ内容：</p>
<p><?php echo $contact['Contact']['content']; ?></p>
<p>----------------------------------------------------</p>
<p>※このメールにお心当たりの無い方は、誠にお手数ですが<a href="http://<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a>よりご連絡下さい。</p>

<p>内容を確認後、担当者から折り返しご連絡させていただきますので、暫くお待ち下さい。</p>

<p>=================================</p>
<p>リネシス株式会社　家賃でもらえる家運営事務局</p>

<p>〒108-0074 </p>
<p>東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</p>
<p>お問い合わせ：<a href="http://<?php echo Router::url('/', true) ?>">HP問い合わせへのLink</a></p>
<p>=================================</p>

