<?php
 $line= $users[0]['User'];
 //var_dump($users); die;
 $this->CSV->addRow(array_keys($line));
 foreach ($users as $user)
 {
      $line = $user['User'];
       $this->CSV->addRow($line);
 }
 $filename='users';
 echo  $this->CSV->render($filename);
?>