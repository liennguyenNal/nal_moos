<?php echo $user['User']['first_name']. " " .$user['User']['last_name']; ?>様</br>
「家賃でもらえる家」入居審査へのお申し込みありがとうございます。</br>
</br>
運営事務局にてお客様の入居審査を行わせて頂いた結果、ご登録内容に不備がございましたので差戻しをさせていただきました。</br>
</br>
【差戻し理由】</br>
-----------------------------------------------------------------------------------</br>
<?php $arr = array(1=>'添付ファイルの追加', 2=>'入力内容の修正', 3=>'保証人の追加'); ?> 
<?php foreach ($requireds as $required) {
	echo "" . $arr[$required].  "</br>";
}?>
</br>
 <?php echo nl2br($comment);?></br>
-----------------------------------------------------------------------------------</br>
</br>
大変お手数ですが、上記内容についてご対応いただき、再度マイページより審査申し込みを頂きますようお願い申し上げます。</br>
</br>
※このメールは「家賃でもらえる家」入居審査にお申し込みいただいた方にお送りしております。</br>
※お心当たりの無い方は、誠にお手数ですが<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム </a>よりご連絡下さい。</br>
</br>
=========================================</br>
リネシス株式会社</br>
家賃でもらえる家運営事務局</br>
</br>
〒108-0074 </br>
東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</br>
<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a></br>
=========================================</br>