<p><?php echo $user['User']['first_name']; ?>様</p>
<p>「家賃でもらえる家」入居審査へのお申し込みありがとうございます。</p>
<p></p>
<p>運営事務局にてお客様の入居審査を行わせて頂いた結果、登録内容に不備がございましたので差戻しをさせていただきました。</p>
<p></p>
<p>【差戻し理由】</p>
<p>-----------------------------------------------------------------------------------</p>
<?php $arr = array(1=>'添付ファイルの追加', 2=>'入寮区内容の修正', 3=>'保証人の追加'); ?>
<?php foreach ($requireds as $required) {
	echo "<p>" . $arr[$required].  "</p>";
}?>
 <p><?php echo $comment;?></p>
<p>-----------------------------------------------------------------------------------</p>
<p></p>
<p>大変お手数ですが、上記内容についてご対応いただき、再度マイページより審査申し込みを頂きますようお願い申し上げます。</p>
<p></p>
<p>※このメールは「家賃でもらえる家」入居審査にお申し込みいただいた方にお送りしております。</p>
<p>※お心当たりの無い方は、誠にお手数ですが<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム </a>よりご連絡下さい。</p>
<p></p>
<p>=================================</p>
<p>リネシス株式会社　家賃でもらえる家運営事務局</p>
<p></p>
<p>〒108-0074 </p>
<p>東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</p>
<p>お問い合わせ：<a href="<?php echo Router::url('/', true) ;?>">HP問い合わせへのLink</a></p>
<p>=================================</p>