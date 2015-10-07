<p><?php echo $user['User']['first_name'].$user['User']['last_name']; ?>様</p>
<p>「家賃でもらえる家」への無料会員登録ありがとうございます。</p>

<p>※会員登録はまだ完了しておりません。</p>

<p>運営事務局にて、お客様の登録内容に不備が無いことを確認致しました。</p>
<p>下記URLのリンクをクリックし、パスワードの設定をお願いいたします。</p>

<p><a href="<?php echo Router::url('/', true); ?>users/create_password/<?php echo $user['User']['email']; ?>/<?php echo $user['User']['access_token']; ?>"><?php echo $_SERVER['HTTP_HOST'] . $this->webroot; ?>users/create_password/<?php echo $user['User']['email']; ?>/<?php echo $user['User']['access_token']; ?></a></p>
<p>※ドメインなどは例</p>

<p>パスワード設定後、ログイン画面よりご登録いただきましたメールアドレスをユーザーIDとしてご入力いただき、設定したパスワードでログインすることができます。</p>

<p>※このメールは「家賃でもらえる家」無料会員登録にお申し込みいただいた方にお送りしております。</p>
<p>※お心当たりの無い方は、誠にお手数ですが<a href="http://<?php echo Router::url('/', true) ?>contact">お問い合わせフォーム</a>よりご連絡下さい。</p>

<p>=================================</p>
<p>リネシス株式会社　家賃でもらえる家運営事務局</p>

<p>〒108-0074 </p>
<p>東京都港区高輪２丁目１４－１７　グレイス高輪ビル８階</p>
<p>お問い合わせ：<a href="http://<?php echo Router::url('/', true) ?>">HP問い合わせへのLink</a></p>
<p>=================================</p>