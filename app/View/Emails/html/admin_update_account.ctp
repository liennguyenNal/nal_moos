<p style=" margin:0px !important">下記の内容にて、「家賃でもらえる家」に審査申し込みがありました。</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">【審査申し込み内容】</p>
<p style=" margin:0px !important">----------------------------------------------------</p>
<p style=" margin:0px !important">登録No：<?php echo $user['User']['id'];?></p>
<p style=" margin:0px !important">会員登録申込日時：<?php echo date("Y/m/d H:i", strtotime($user['User']['created']));?></p>
<p style=" margin:0px !important">審査申込日時：<?php echo date("Y/m/d H:i", strtotime($user['User']['updated_date']));?></p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">▼会員情報概要</p>
<p style=" margin:0px !important">年齢：<?php echo date("Y") - $user['User']['year_of_birth'];?></p>
<p style=" margin:0px !important">性別：<?php if($user['User']['gender'] == "male") echo __("user.register.male"); 
					else echo  __("user.register.female")?>
<p style=" margin:0px !important">婚姻：<?php echo $user['MarriedStatus']['name']?></p>
<p style=" margin:0px !important">職業：<?php echo $user['UserCompany']['Work']['name']?></p>
<p style=" margin:0px !important">勤務年月：<?php echo $user['UserCompany']['year_worked'] ?> 年<?php echo $user['UserCompany']['year_worked'] ?>月</p>
<p style=" margin:0px !important">月収：<?php echo $user['UserCompany']['salary_month'] ?></p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">▼希望エリア1</p>

<?php foreach ($user['ExpectArea'] as $item) {
	
?>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">郵便番号：<?php echo $item['post_num_1'] . $item['post_num_2']?></p>
<p style=" margin:0px !important">都道府県：<?php echo $item['Pref']['name']; ?></p>
<p style=" margin:0px !important">市区町村：<?php echo $item['city'] ?></p>
<p style=" margin:0px !important">エリア：<?php echo $item['address'] ?></p>
<p style=" margin:0px !important"><?php }?>
<p style=" margin:0px !important">----------------------------------------------------</p>
<p style=" margin:0px !important">&nbsp;</p>
<p style=" margin:0px !important">審査申し込み内容の確認を行い、承認・却下・差戻し手続きを管理画面から行ってください。</p>
<p style=" margin:0px !important"><a href="<?php echo Router::url('/', true) ;?>admin/users/view/<?php echo $user['User']['id']?>">管理画面 当該登録Noの申込詳細ページURL</a></p>
