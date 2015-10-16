"下記の内容にて、「家賃でもらえる家」に審査申し込みがありました。</br>
</br>
【審査申し込み内容】</br>
----------------------------------------------------</br>
登録No：<?php echo $user['User']['id'];?></br>
会員登録申込日時：<?php echo date("Y/m/d H:i", strtotime($user['User']['created']));?></br>
審査申込日時：<?php echo date("Y/m/d H:i", strtotime($user['User']['updated_date']));?></br>
</br>
▼会員情報概要</br>
年齢：<?php echo date("Y") - $user['User']['year_of_birth'];?></br>
性別：<?php if($user['User']['gender'] == "male") echo __("user.register.male"); 
					else echo  __("user.register.female")?>
婚姻：<?php echo $user['MarriedStatus']['name']?></br>
職業：<?php echo $user['UserCompany']['Work']['name']?></br>
勤務年月：<?php echo $user['UserCompany']['year_worked'] ?> 年<?php echo $user['UserCompany']['year_worked'] ?>月</br>
月収：<?php echo $user['UserCompany']['salary_month'] ?></br>
</br>
▼希望エリア1</br>

<?php foreach ($user['ExpectArea'] as $item) {
	
?>
</br>
郵便番号：<?php echo $item['post_num_1'] . $item['post_num_2']?></br>
都道府県：<?php echo $item['Pref']['name']; ?></br>
市区町村：<?php echo $item['city'] ?></br>
エリア：<?php echo $item['address'] ?></br>
<?php }?>
----------------------------------------------------</br>
</br>
審査申し込み内容の確認を行い、承認・却下・差戻し手続きを管理画面から行ってください。</br>
<a href="<?php echo Router::url('/', true) ;?>admin/users/view/<?php echo $user['User']['id']?>">管理画面 当該登録Noの申込詳細ページURL</a></br>
