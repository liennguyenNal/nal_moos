<?php

$i=0;
foreach($users as $user){

  //if($i==0){
    foreach($user as $key=>$value){
      foreach($value as $key1=>$value1){
        if(is_array($value1)){
          foreach($value1 as $key2=>$value2){
            $result[$i][$key.'_'.$key1.'_'.$key2]= $value2;
          }
        }
        else{
          $result[$i][$key.'_'.$key1]= $value1;
        }
        
      }

    }
    //var_dump($result); die;
    if($i==0){
    $this->CSV->addRow(array_keys($result[0]));
    $this->CSV->addRow($result[0]);
    }
    else{
      $this->CSV->addRow($result[$i]);
    }
  $i++;
}

 $filename='users';
 echo  $this->CSV->render($filename);
?>