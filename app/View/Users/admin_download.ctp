<?php



 //$line= $users[0]['User'];
 //var_dump($users); die;
 //$this->CSV->addRow(array_keys($line));
 $i=0;
 foreach ($users as $user)
 {		
      //$line = $user['User'];
      $line['email'] = $user['User']['email'];
      $line['名前'] = $user['User']['first_name'].' '.$user['User']['last_name'];
      $line['年齢'] = date("Y") - $user['User']['year_of_birth'];
      $line['職業'] = $user['UserCompany']['Work']['name'];
      $line['収入'] = $user['UserCompany']['salary_month'];
      $line['都道府県	'] = $user['UserAddress']['Pref']['name'];
      $line['市区町村	'] = $user['UserAddress']['city'];
      $line['申込み状況'] = $user['Status']['name'];
      $line['登録申込日'] = $user['User']['created'];
      $line['審査申込日'] = $user['User']['approved_date'];
      if($i==0){
 			$this->CSV->addRow(array_keys($line));
 		}
       $this->CSV->addRow($line);
       $i++;
 }
 $filename='users';
 echo  $this->CSV->render($filename);
?>