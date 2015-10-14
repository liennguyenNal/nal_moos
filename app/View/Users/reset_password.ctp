<div id="wrapper">		
	<header id="head-container">
		<div class="container-fluid">
			<h1 id="logo" class="float-none">
				<a href="<?php echo $this->webroot;?>"></a>
			</h1>
		</div>
	</header>
			
	<section id="content-container">
		<div class="welcome-sup-page">
			<div class="container-fluid">
				<h2>ようこそゲスト様</h2>
			</div>
		</div>
		<div class="title-sup-page">
			<div class="container-fluid">
				<h3>パスワード変更</h3>
			</div>
		</div>
		<div class="from-login">
			<div class="container-fluid">
				<div class="from-ldpage">
					<div class="content">
						<div class="container-fluid">
						<?php echo $this->element('flash'); ?>
						<div class="block-warning" id="error-section" style="display:none">
		                    <?php echo __('global.errors'); ?>
		                </div>
							<div class="content-from">
								<form id="form_reset" action="reset_password" method="POST" >
									<div class="content-from-block">
										<p class="note fix-font">ご登録いただいているメールアドレスを入力し送信ボタンを押すと、</br>パスワード設定画面へのリンクを記載したメールがメールアドレス宛に送信されます。</p>
										<div class="content-from-how">
											<table class="from">
												<tbody>
													<tr>
														<td class="label-text"><label>登録メールアドレス</label><span>必須</span></td>
														<td>
															<div class="block-input">
																<div><input class="w198" id="reset_email" type="text" name="email" data-placement="right">
       															<span class="alert_reset"></span></div>
																
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<p class="note note-fix">※会員登録されていないメールアドレスを入力した場合、メールは送信されません。</br>※受信拒否設定を行っている方は、MOOSからのメールが受信できる様、設定ください。</br>※メールが受信・発見できない場合、迷惑メールボックスに振り分けられていないかご確認ください。</p>
										<div class="block-note">
											<div class="block-button">
												<button type="submit"><img src="<?php echo $this->webroot;?>img/front/text-from-a.png" alt="送信する"/></button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

  <script>
    $("#form_reset").validate({
      rules: {
        'email': {
          required: true,
          email: true
        }
      },
      messages: {
        'email': {
          required: "<?php echo __('global.errors.reset_password.email'); ?>"
        }
      },
      invalidHandler: function(event, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          $("#error-section").show();
        } else {
          $("#error-section").hide();
      } 
  	}
    });
    jQuery.extend(jQuery.validator.messages, {
      email: "<?php echo __('global.errors.email'); ?>"
    });
  </script>