<?php

use Illuminate\Support\Facades\DB;

// get photo
if (!function_exists('get_photo')) {

    function get_photo($filename, $path, $type = '') {
        // set the path base on type
        if ($type != '') {
            $path .= $type . "/";
        }
        if (!empty($filename)) {
            if (!file_exists($path . $filename)) {
                return base_url($path . 'nophoto.jpg');
            } else {
                return base_url($path . $filename);
            }
        } else {
            return base_url($path . 'nophoto.jpg');
        }
    }

}

// function show the sub string text
if (!function_exists('showText')) {

    function showText($str = '', $length = 30) {
        $string = strip_tags($str);
        if (strlen($string) > ($length + 3)) {
            return mb_substr($string, 0, $length) . '...';
        } else {
            return $string;
        }
    }

}

// return human readable date time
if (!function_exists('longDateHuman')) {

    function longDateHuman($dateTime, $format = 'datetime') {
        if ($dateTime != '0000-00-00 00:00:00' && $dateTime != '0000-00-00') {
            $intTime = (!ctype_digit($dateTime)) ? strtotime($dateTime) : $dateTime;
            if ($intTime) {
                switch ($format) {
                    case 'datetime':
                        return date('jS M, Y \a\t h:i:s a', $intTime);
                    case 'date':
                        return date('jS F, Y', $intTime);
                    case 'short':
                        return date('dS F', $intTime);
                    case 'MY':
                        return date('F Y', $intTime);
                    case 'Y':
                        return date('Y', $intTime);
                    case 'M':
                        return date('F', $intTime);
                    case 'inv':
                        return date('M d, Y', $intTime);
                    case 'full':
                        return date('j F Y, h:i a', $intTime);
                    case 'for_site_date':
                        return date('j M, y', $intTime);
                    case 'for_list_datetime':
                        return date('j M y', $intTime) . '<br/>' . date('h:i a', $intTime);
                    case 'for_site_time':
                        return date('h:i a', $intTime);
                    case 'for_site_datetime':
                        return date('j M y, h:i a', $intTime);
                    case 'for_invoice_datetime_2':
                        return date('j M Y, h:ia', $intTime);
                    case 'for_inv_sub':
                        return date('j F Y', $intTime);
                    case 'ticket_list':
                        return date('d/m/y h:i a', $intTime);
                    default:
                        break;
                }
            }
        }
        return "---";
    }

}

if (!function_exists('getDateText')) {

    function getDateText($start_date, $end_date) {
        $string = "Today";

        $today_date = date("d/m/Y");
        if( $start_date == $today_date && $end_date ==  $today_date){
            $string = "Today";
        }else{
            $string = $start_date." - ".$end_date;
        }

        return $string;
    }

}

// get settings value
if (!function_exists('getSettingsValues')) {
    function getSettingsValues() {
        $data = [];
        $info = DB::table('settings')->get();

        if( !empty( $info ) ){
            foreach ($info as $key => $item) {
                $data[$item->key] = $item->value;
            }
        }
        return (object) $data;
    }

}

// get settings value
if (!function_exists('getSettingsValue')) {

    function getSettingsValue($setting_key, $default_value="") {

        $info = DB::table('settings')->where('key',$setting_key)->first();
        if (!empty($info)) {
            return $info->value;
        } else {
            return $default_value;
        }
    }

}

// get settings value
if (!function_exists('updateSettingsValue')) {

    function updateSettingsValue($setting_key, $value) {

        $data = array('key'=>$setting_key, 'value'=>$value);

        $info = DB::table('settings')->where('key',$setting_key)->first();
        if (!empty($info)) {
            DB::table('settings')->where('key',$setting_key)->update($data);
        } else {
            DB::table('settings')->insert($data);
        }

        return true;
    }

}

if (!function_exists('getElapsedTimeString')) {

    function getElapsedTimeString($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full)
            $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

}

if (!function_exists('getHMS')) {

    function getHMS($seconds) {
        $durations['hours'] = date('H', mktime(0, 0, $seconds));
        $durations['minutes'] = date('i', mktime(0, 0, $seconds));
        $durations['seconds'] = date('s', mktime(0, 0, $seconds));
        return $durations;
    }

}


/* user profile mini section end */

if (!function_exists('customerMiniProfile')) {

    function customerMiniProfile($id) {
        $CI = &get_instance();
        $customerInfo = "";
        $customer_detail_link = site_url('customer/view/' . $id);
        $img = customer_image_path();

        if ($result = $CI->global_model->get_row('customers', array("id" => $id))) {
            $img = customer_image_path($result->image);

            $user_id = $result->user_id ? $result->user_id : "";
            if( $result->user_id ){
                $user_id = " (".$result->user_id.")";
            }
            
            $customerInfo = '<div class="athor_images">';
            $customerInfo .= '<a href="' . $customer_detail_link . '" data-toggle="modal" data-target="#lg_view_model"><img src="' . $img . '" alt="" title="" style="height: 55px;width: 55px;"> </a>';
            $customerInfo .= '</div>';
            $customerInfo .= '<div class="athor_details">';
            $customerInfo .= '<a href="' . $customer_detail_link . '" data-toggle="modal" data-target="#lg_view_model">' . $result->name .$user_id.' </a>';            
            $customerInfo .= '<p>' . $result->phone . '</p>';
            $customerInfo .= '<p>' . $result->address . '</p>';
            $customerInfo .= '</div>';
        }
        return $customerInfo;
    }

}

if (!function_exists('amountShowStyle')) {

    function amountShowStyle($amount) {
        return 'TK. ' . $amount;
    }

}

// function show the sub string text
if (!function_exists('showSubStrText')) {

    function showSubStrText($str = '', $length = 0) {
        $string = strip_tags($str);
        if (strlen($string) > ($length + 3)) {
            return mb_substr($string, 0, $length) . '...';
        } else {
            return $string;
        }
    }

}


if (!function_exists('showAmountFormat')) {

    function showAmountFormat($amount, $number = '') {
        if ($number) {
//            return '৳.' . number_format($amount);
            return '৳.' . $amount;
        } else {
            if (is_int($amount)) {
                return '৳.' . number_format($amount);
            }
            return '৳.' . $amount;
        }
    }

}

if (!function_exists('number_format_short')) {

    function number_format_short($n, $precision = 1) {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }

        // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ($precision > 0) {
            $dotzero = '.' . str_repeat('0', $precision);
            $n_format = str_replace($dotzero, '', $n_format);
        }

        return $n_format . $suffix;
    }

}

if (!function_exists('getTblField')) {
    function getTblField($table, $id, $field) {
        $CI = &get_instance();
        $data = $CI->global_model->get_row($table, array('id' => $id));
        if( $data ){
            return $data->$field;
        }
        return "";
    }
}

if (!function_exists('generateCustomerId')) {

    function generateCustomerId($id) {
        return 'R-' . date('md').'C'.$id;
    }

}

if( !function_exists('getData') ){

	function getData($fields="*", $table, $where=false, $orderBy=false,$limit=false,$count=false){
       $results = DB::table($table)->get();
       return $results;
    }
	
}

if( !function_exists('getSettingsValues') ){

    function getSettingsValues($fields="*", $table, $where=false, $orderBy=false,$limit=false,$count=false){
       $results = DB::table($table)->get();
       return $results;
    }
    
}

