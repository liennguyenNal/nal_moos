<p style=" margin:0px !important"><?php echo $user['User']['first_name']. " " .$user['User']['last_name']; ?>様</p>
<p style=" margin:0px !important">「家賃でもらえる家」入居審査へのお申し込みありがとうございます。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">運営事務局にてお客様の入居審査を行わせて頂いた結果、ご登録内容に不備がございましたので差戻しをさせていただきました。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">【差戻し理由】</p>
<p style=" margin:0px !important">-----------------------------------------------------------------------------------</p>
<p style=" margin:0px !important"><?php $arr = array(1=>'添付ファイルの追加', 2=>'入力内容の修正', 3=>'保証人の追加'); ?> 
<?php foreach ($requireds as $required) {
	echo "<p style='margin:0px !important'>" . $arr[$required].  "</p>";
}?>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important"><?php echo nl2br($comment);?></p>
<p style=" margin:0px !important">-----------------------------------------------------------------------------------</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">大変お手数ですが、上記内容についてご対応いただき、再度マイページより審査申し込みを頂きますようお願い申し上げます。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">※このメールは「家賃でもらえる家」入居審査にお申し込みいただいた方にお送りしております。</p>
<p style=" margin:0px !important">※お心当たりの無い方は、誠にお手数ですが<a href="<?php echo str_replace("https:", "http:" ,Router::url('/', true) ) ;?>contact">お問い合わせフォーム </a>よりご連絡下さい。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">=========================================</p>
<p style=" margin:0px !important">リネシス株式会社</p>
<p style=" margin:0px !important">家賃でもらえる家運営事務局</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">〒108-0074 </p>
<p style=" margin:0px !important">東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</p>
<p style=" margin:0px !important"><a href="<?php echo str_replace("https:", "http:" ,Router::url('/', true) ) ;?>contact">お問い合わせフォーム</a></p>
<p style=" margin:0px !important">=========================================</p>