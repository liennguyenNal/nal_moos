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
				<h3>パスワード設定</h3>
			</div>
		</div>
		<div class="from-login">
			<div class="container-fluid">
				<div class="from-ldpage">
					<div class="content">
						<div class="container-fluid">
							<div class="content-from">
								<form class="form_reset1" action="<?php echo Router::url('/', true); ?>users/reset_link_after" method="POST">
									<div class="content-from-block">
										<div class="content-from-how">
											<table class="from">
												<tbody>
													<tr>
														<td class="label-text"><label>パスワード</label><span>必須</span></td>
														<td>
															<div class="block-input fix-padding">
																<div class="div-style">
																	<input class="w198" type="password" id="password" name="password" />
																	<span class="style">※半角英数字、8文字以上</span>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td class="label-text"><label>パスワード（確認）</label><span>必須</span></td>
														<td>
															<div class="block-input fix-padding">
																<div class="div-style">
																	<input class="w198" type="password" id="confpass"name="confpass" />
																	<span class="style">※半角英数字、8文字以上</span>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div><span class="alert_reset"></span></div>
										<p class="note note-fix">※パスワードは、半角英数（a-z）、数字（0-9）、及びピリオド（.）、アンダースコア（_）、ダッシュ（-）を使用することができます。</br>アルファベットと数字を混在させてください。先頭の文字はアルファベットまたは数字にしてください。ピリオドを連続して使用することはできません。</p>
										<div class="block-note">
											<div class="block-button">

											    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
											    
											    
												<button id="button" type="button"><img src="<?php echo $this->webroot;?>img/front/text-from-a.png" alt="送信する"/></button>
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

<script type="text/javascript">
	 $(document).ready(function() { //jQuery('#form_reset1').submit();
    	$('#button').click(function(event){ //alert('aa');
    
	        data = $('#password').val();
	        var len = data.length;
	        
	        if(len < 8) {
	            $('.alert_reset').html("Password cannot be less than 8 characters");
	            // Prevent form submission
	            //event.preventDefault();
	        }
	        else{
		        if($('#password').val() != $('#confpass').val()) {
		            $('.alert_reset').html("Passwords don't match");
		            // Prevent form submission
		            //event.preventDefault();
		        }
		        else{
		        	$.ajax({url: "<?php echo Router::url('/', true); ?>"+"users/ajax_reset_link/", type: 'POST', cache: false, data: 'token='+'<?php echo $_GET['token']; ?>',  success: function(result){ 
			        	
			        	if(result== 'not'){
			        		$('.alert_reset').html("Your link is not correct");
			        		 
			        	}
			        	else{
			        		$('.alert_reset').html("");
			        		$('.form_reset1').submit();
			        	}
			        	
				    }});
			        //alert('sss');
			        
		    	}
	   	 	}
         
    });
});
</script>
