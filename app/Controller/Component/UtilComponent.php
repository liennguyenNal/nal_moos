<?php

class UtilComponent extends Object {

    /**
     * Startup - Link the component to the controller.
     *
     * @param controller
     */
    function startup(&$controller) {
        $this->controller = & $controller;
    }
    function initialize(&$controller)
    {
         
     }
    function encryptPassword($password) {
        $salt = Configure::read('Security.salt');
        $encrypt_password = md5($salt . $password);
        return $encrypt_password;
    }

    function getDateElement($date, $element) {
        $return = date($element, strtotime($date));
        return $return;
    }

    function getTimeElement($time, $element) {
        $return = date($element, strtotime($time));
        return $return;
    }

    function getWeekDay($date) {
        $week_day = date('w', strtotime($date));
        return $week_day;
    }

    function checkDate($date, $sep='/') {
        $valid = true;
        $dates = explode($sep, $date);

        $m = $dates[0];
        $d = $dates[1];
        $y = $dates[2];

        if (!is_numeric($d) || !is_numeric($m) || !is_numeric($y)) {
            $valid = false;
        } else {
            $valid = checkdate($dates[0], $dates[1], $dates[2]);
        }
        return $valid;
    }

    function dateFormat($date, $format = 'd-m-Y') {
        return date($format, strtotime($date));
    }

    function checkTime($time) {
        return preg_match('/[\s0]*(\d|1[0-2]):(\d{2})/', $time, $match);
    }

    function sqlDate($date='', $sep='/', $format="d/m/Y") {
        if (!$date) {
            $date_str = date('Y-m-d');
        } else {
           
           $arr = explode($sep, $date);
            if($format == "d/m/Y"){                 
                $date_str = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
            }
            
            else if($format == "m/d/Y"){
                $date_str = $arr[2] . '-' . $arr[0] . '-' . $arr[1];
            }
            else if($format == "Y/d/m"){
                $date_str = $arr[0] . '-' . $arr[2] . '-' . $arr[1];
            }
            else {
                $date_str = $date;
            }
        }
       
        return $date_str;
    }

    function vnDate($date='') {
        if (!$date) {
            $date_str = date('d/m/Y');
        } else {
            $date_str = date('d/m/Y', strtotime($date));
        }

        return $date_str;
    }
    
    function formatVNTime($date){
        $week_day = date('w', strtotime($date));
        $date_str = date('ngày d tháng m năm y H:i:s', strtotime($date));
        return $week_day. " " . $date_str;
    }
    function getFileList($dir, $allow) {
        $list = array();
        $handle = opendir(realpath($dir));

        if ($handle) {
            while (false !== ($file = readdir($handle))) {
                if ($file != '.' && $file != '..') {
                    if ($allow) {
                        $ext = strtolower(end(explode('.', $file)));
                        if (in_array($ext, $allow)) {
                            $list[$file] = $file;
                        }
                    } else {
                        $list[$file] = $file;
                    }
                }
            }
        }

        closedir($handle);

        return $list;
    }

    /**
     *
     * check date not in past
     * @param date (format mm/dd/yy)
     */
    function checkCurrentDate($date, $sep='/') {
        $valid = true;
        $dates = explode($sep, $date);

        $m = $dates[0];
        $d = $dates[1];
        $y = $dates[2];

        if (!is_numeric($d) || !is_numeric($m) || !is_numeric($y)) {
            $valid = false;
        } else {
            $valid = checkdate($dates[0], $dates[1], $dates[2]);
            if ($valid) {

                $exp_date = $y . '-' . $m . '-' . $d;
                $todays_date = date("Y-m-d");
                $today = strtotime($todays_date);
                $expiration_date = strtotime($exp_date);
                if ($expiration_date > $today) {
                    $valid = true;
                } else {
                    $valid = false;
                }
            }
        }
        return $valid;
    }

    function getDayFromDate($date_from) {
        $expstamp = strtotime($date_from);
        // Get how many days left (3600 sec = 1 hour)
        $days = round(( $expstamp - ( time()) ) / ( 3600 * 24 ));

        return $days;
    }

    /**
     * get date from for search
     *
     * @param string $date input date
     * @return string sqldate format
     * @example 2010-12-24 00:00:00
     */
    function getDateFrom($date) {
        return $this->dateFormat($date, 'Y-m-d H:i:s');
    }

    /**
     * get date from for search
     *
     * @param string $date input date
     * @return string sqldate format
     * @example 2010-12-24 23:59:59
     */
    function getDateTo($date) {
        $date_to = $this->dateFormat($date, 'Y-m-d H:i:s');
        $date_to = substr($date_to, 0, 10);
        $date_to = $date_to . ' 23:59:59';
        return $date_to;
    }

    function graduation_year_list() {
        $years = array();
        $start_year = 1970;
        $end_year = date('Y')+ 4;

        for ($i = $start_year; $i <= $end_year; $i++) {
            $years[$i] = $i;
        }
        return $years;
    }

    function createRandomPassword($length) {
        $chars = "1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $i = 0;
        $password = "";
        while ($i <= $length) {
            $password .= $chars{mt_rand(0, strlen($chars))};
            $i++;
        }
        return $password;
    }
    
    function createRandomString($length){
        $chars = "1234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $i = 0;
        $string = "";
        while ($i <= $length) {
            $string .= $chars{mt_rand(0, strlen($chars))};
            $i++;
        }
        //echo $string; die;
        return $string;
    }
     function beforeRedirect($controller, $url, $status=null, $exit=true){
        
    }
    
    function beforeRender($controller){
        
    }


    function shutdown($controller){
        
    }

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