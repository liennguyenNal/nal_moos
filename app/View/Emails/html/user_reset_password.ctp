<p style=" margin:0px !important"><?php echo $user['User']['first_name']." ".$user['User']['last_name']; ?>様</p>
<p style=" margin:0px !important">パスワード変更のご依頼ありがとうございます。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">※パスワード変更はまだ完了しておりません。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">下記URLのリンクをクリックし、パスワードの再設定をお願いいたします。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important"><a href="<?php echo Router::url('/', true).'users/reset_link/?token='.$user['User']['access_token'].'&email='.$user['User']['email']; ?>"><?php echo Router::url('/', true).'users/reset_link/?token='.$user['User']['access_token'].'&email='.$user['User']['email']; ?></a></p>
<p style=" margin:0px !important">※ドメインなどは例</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">パスワード再設定後、ログイン画面よりご登録いただきましたメールアドレスをユーザーIDとしてご入力いただき、再設定したパスワードでログインすることができます。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">※このメールにお心当たりの無い方は、誠にお手数ですが<a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a>よりご連絡下さい。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">=========================================</p>
<p style=" margin:0px !important">リネシス株式会社</p>
<p style=" margin:0px !important">家賃でもらえる家運営事務局</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">〒108-0074 </p>
<p style=" margin:0px !important">東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</p>
<p style=" margin:0px !important"><a href="<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a></p>
<p style=" margin:0px !important">=========================================</p>
