<p style=" margin:0px !important">下記の内容にて、「家賃でもらえる家」に会員登録がありました。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">【会員登録内容】</p>
<p style=" margin:0px !important">----------------------------------------------------</p>
<p style=" margin:0px !important">登録No：<?php echo $user['User']['id']; ?></p>
<p style=" margin:0px !important">会員登録申込日時：<?php echo date_format(date_create($user['User']['created']), "Y/m/d H:i"); ?></p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">▼会員情報概要</p>
<p style=" margin:0px !important">年齢：<?php echo $user['User']['age_of_birth']; ?></p>
<p style=" margin:0px !important">性別：<?php if($user['User']['gender'] == "male") echo __("user.register.male"); 
					else echo  __("user.register.female")?>
<p style=" margin:0px !important">&nbsp;</p> 
<p style=" margin:0px !important">婚姻：<?php echo $user['User']['married_status_id']; ?></p>
<p style=" margin:0px !important">職業：<?php echo $user['UserCompany']['Work']['name']; ?></p>
<p style=" margin:0px !important">勤務年月：<?php echo $user['UserCompany']['year_worked']; ?>年 <?php echo $user['UserCompany']['month_worked']; ?>月</p>
<p style=" margin:0px !important">月収：<?php echo $user['UserCompany']['salary_year']; ?></p>
<?php $item = $user['ExpectArea'][0];?>
<p style=" margin:0px !important">▼希望エリア1</p>
<p style=" margin:0px !important">郵便番号：<?php echo $item['post_num_1']."-".$item['post_num_2']; ?></p>
<p style=" margin:0px !important">都道府県：<?php echo $item['Pref']['name']; ?></p>
<p style=" margin:0px !important">市区町村：<?php echo $item['city']; ?></p> 
<p style=" margin:0px !important">エリア：<?php echo $item['address']; ?></p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">----------------------------------------------------</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">登録内容の確認を行い、承認・却下手続きを管理画面から行ってください。</p>
<p style=" margin:0px !important"><a href="<?php echo Router::url('/', true) ;?>admin/users/view/<?php echo $user['User']['id']?>">管理画面 当該登録Noの申込詳細ページURL</a></p>