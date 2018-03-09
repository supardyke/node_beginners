<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Timing {


    public function index($timezone){
        // check for timezone
        if (!empty($timezone)) {
            date_default_timezone_set($timezone);
        }
        // set date from php
        $datestring = date("Y-m-d h:i:sa");
        return $datestring; 
    }

    public function current_time_unix($timezone)
    {
        // check for timezone
        if (!empty($timezone)) {
            date_default_timezone_set($timezone);
        }else{            
            $timezone  = 'UTC';
            date_default_timezone_set($timezone);
        }
        $this->load->helper('date');
        $time = now();
        $daylight_saving = TRUE;
        // convert to Unix
        $unix_time = gmt_to_local($time);
        return $unix_time;
        
    }

    public function unix_to_time($timestamp)
    {
        $date = date_create();
        // convert to time stamp
        date_timestamp_set($date,$timestamp);
        //convert to a format
        $normal_time = date_format($date,"Y-m-d H:i:s");
        return $normal_time;
        
    }

    public function time_to_unix($the_time)
    {
        // format time
        $the_time = date("Y-m-d h:i:sa", $the_time);
        $daylight_saving = TRUE;
        //convert to a format
        $unix_time = gmt_to_local($the_time);
        return $unix_time;        
    }

    public function extend_time($data)
    {
        // set the extender
        $endtime = strtotime($data);
        // extend the time
        $endtime = date("Y-m-d h:i:sa", $endtime);
        return $endtime;
        
    }

    public function extend_time_unix($endstamp,$days)
    {
        // convert the number of days
        $extend = $days*24*60*60;
        // extend the time
        $endstamp = $endstamp + $extend;
        return $endstamp;
        
    }
}