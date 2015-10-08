<p><?php echo $user['User']['first_name']; ?>様</p>
<p>パスワード変更のご依頼ありがとうございます。</p>

<p>※パスワード変更はまだ完了しておりません。</p>

<p>下記URLのリンクをクリックし、パスワードの再設定をお願いいたします。</p>

<p><a href="<?php echo Router::url('/', true); ?>users/change_password/<?php echo $user['User']['email']; ?>/<?php echo $user['User']['access_token']; ?>"><?php echo $_SERVER['HTTP_HOST'] . $this->webroot; ?>users/change_password/<?php echo $user['User']['email']; ?>/<?php echo $user['User']['access_token']; ?></a></p>
<p>※ドメインなどは例</p>

<p>パスワード再設定後、ログイン画面よりご登録いただきましたメールアドレスをユーザーIDとしてご入力いただき、再設定したパスワードでログインすることができます。</p>

<p>※このメールにお心当たりの無い方は、誠にお手数ですが<a href="http://<?php echo Router::url('/', true) ?>">お問い合わせフォーム</a>よりご連絡下さい。</p>

<p>=================================</p>
<p>リネシス株式会社　家賃でもらえる家運営事務局</p>

<p>〒108-0074 </p>
<p>東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</p>
<p>お問い合わせ：<a href="http://<?php echo Router::url('/', true) ?>">HP問い合わせへのLink</a></p>
<p>=================================</p>

