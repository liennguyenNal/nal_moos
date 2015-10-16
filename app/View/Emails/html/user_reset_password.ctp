<?php echo $user['User']['first_name']." ".$user['User']['last_name']; ?>様</br>
パスワード変更のご依頼ありがとうございます。</br>
</br>
※パスワード変更はまだ完了しておりません。</br>
</br>
下記URLのリンクをクリックし、パスワードの再設定をお願いいたします。</br>
</br>
<a href="<?php echo Router::url('/', true).'users/reset_link/?token='.$hash.'&email='.$user['User']['email']; ?>"><?php echo Router::url('/', true).'users/reset_link/?token='.$hash.'&email='.$user['User']['email']; ?></a></br>
※ドメインなどは例</br>
</br>
パスワード再設定後、ログイン画面よりご登録いただきましたメールアドレスをユーザーIDとしてご入力いただき、再設定したパスワードでログインすることができます。</br>
</br>
※このメールにお心当たりの無い方は、誠にお手数ですが<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a>よりご連絡下さい。</br>
</br>
=========================================</br>
リネシス株式会社</br>
家賃でもらえる家運営事務局</br>
</br>
〒108-0074 </br>
東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</br>
<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a></br>
=========================================</br>