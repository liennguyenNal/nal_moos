<?php echo $user['User']['first_name']. " " .$user['User']['last_name']; ?>様</br>
「家賃でもらえる家」への無料会員登録ありがとうございます。</br>
</br>
※会員登録はまだ完了しておりません。</br>
</br>
運営事務局にて、お客様の登録内容に不備が無いことを確認致しました。</br>
下記URLのリンクをクリックし、パスワードの設定をお願いいたします。</br>
</br>
<a href="<?php echo Router::url('/', true); ?>users/create_password/<?php echo $user['User']['email']; ?>/<?php echo $user['User']['access_token']; ?>"><?php echo Router::url('/', true); ?>users/create_password/<?php echo $user['User']['email']; ?>/<?php echo $user['User']['access_token']; ?></a></br>
</br>
</br>
パスワード設定後、ログイン画面よりご登録いただきましたメールアドレスをユーザーIDとしてご入力いただき、設定したパスワードでログインすることができます。</br>
</br>
※このメールは「家賃でもらえる家」無料会員登録にお申し込みいただいた方にお送りしております。</br>
※お心当たりの無い方は、誠にお手数ですが<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a>よりご連絡下さい。</br>
</br>
=========================================</br>
リネシス株式会社</br>
家賃でもらえる家運営事務局</br>
</br>
〒108-0074 </br>
東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</br>
<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a></br>
=========================================</br>