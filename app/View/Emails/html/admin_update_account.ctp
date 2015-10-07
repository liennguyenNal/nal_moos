<p>"下記の内容にて、「家賃でもらえる家」に審査申し込みがありました。</p>
<p></p>
<p>【審査申し込み内容】</p>
<p>----------------------------------------------------</p>
<p>登録No：<?php echo $user['User']['id'];?></p>
<p>会員登録申込日時：<?php echo date("Y/m/d H:i", strtotime($user['User']['created']));?></p>
<p>審査申込日時：<?php echo date("Y/m/d H:i", strtotime($user['User']['updated_date']));?></p>
<p></p>
<p>▼会員情報概要</p>
<p>年齢：<?php echo date("Y") - $user['User']['year_of_birth'];?></p>
<p>性別：<?php echo $user['User']['gender']?></p>
<p>婚姻：<?php echo $user['MarriedStatus']['name']?></p>
<p>職業：<?php echo $user['UserCompany']['Work']['name']?></p>
<p>勤務年月：<?php echo $user['UserCompany']['year_worked'] ?> 年<?php echo $user['UserCompany']['year_worked'] ?>月</p>
<p>月収：<?php echo $user['UserCompany']['salary_month'] ?></p>
<p></p>
<p>▼希望エリア1</p>

<?php foreach ($user['ExpectArea'] as $item) {
	
?>
<p></p>
<p>郵便番号：<?php echo $item['post_num_1'] . $item['post_num_2']?></p>
<p>都道府県：<?php echo $item['Pref']['name']; ?></p>
<p>市区町村：<?php echo $item['city'] ?></p>
<p>エリア：<?php echo $item['address'] ?></p>
<?php }?>
<p>----------------------------------------------------</p>
<p></p>
<p>審査申し込み内容の確認を行い、承認・却下・差戻し手続きを管理画面から行ってください。</p>
<p><a href="http://<?php echo Router::url('/', true) ;?>users/view/<?php echo $user['User']['id']?>">管理画面 当該登録Noの申込詳細ページURL</a></p>
