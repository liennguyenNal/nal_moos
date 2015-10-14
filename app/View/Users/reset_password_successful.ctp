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
				<h3>パスワード設定完了</h3>
			</div>
		</div>
		<div class="from-login">
			<div class="container-fluid">
				<div class="from-ldpage">
					<div class="content">
						<div class="container-fluid">
							<div class="content-from">
								<form action="">
									<div class="content-from-block">
										<p class="note fix-font">※パスワード設定が完了致しました。</p>
										<div class="block-note">
											<div class="block-button">
												<a href="<?php echo Router::url('/', true); ?>users/login"><button type="button" class="style"><img src="<?php echo $this->webroot;?>img/front/text-from-b.png" alt="ログイン画面へ"/></button></a>
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