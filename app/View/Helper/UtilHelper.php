<?php
class UtilHelper extends AppHelper {
	
   function calculateAge($birthYear, $birthMonth, $birthDay)
    {
      $age = "";
      if($birthYear && $birthMonth && $birthDay){
        $age = date('Y') - $birthYear; 

        if (date('m')< $birthMonth - 1)
        {
          $age--;
        }

        if ($birthMonth - 1 == date('m') && date('d') < $birthDay)
        {
          $age--;
        }
      }
        return $age;
    }
    
}
?>