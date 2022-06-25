<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function loginErrorMessage($error = NULL, $error_message = NULL)
{
    if ($error) {
        return '<small class="text-danger"><i class="fas fa-exclamation-circle"></i> ' . $error_message . '</small>';
    }
}

function loginError($error = NULL, $error_message = NULL)
{
    if ($error) {
        return '<label class="text-danger" style="font-size: 13px"><i class="fa-solid fa-triangle-exclamation me-1"></i>' . $error_message . '</label>';
    }
}
function apptime($time)
{
    switch ($time) {
        case 830:
            $timeapp = "8:30 AM";
            break;
        case 930:
            $timeapp = "9:30 AM";
            break;
        case 1030:
            $timeapp = "10:30 AM";
            break;
        case 1130:
            $timeapp = "11:30 AM";
            break;
        case 130:
            $timeapp = "1:30 PM";
            break;
        case 230:
            $timeapp = "2:30 PM";
            break;
        case 330:
            $timeapp = "3:30 PM";
            break;
        case 430:
            $timeapp = "4:30 PM";
            break;
        default:
            $timeapp = "wrong time";
    }

    return $timeapp;
}
function apptime2($time)
{
    switch ($time) {
        case 800:
            $timeapp = "8:00 AM";
            break;
        case 900:
            $timeapp = "9:00 AM";
            break;
        case 1000:
            $timeapp = "10:00 AM";
            break;
        case 1100:
            $timeapp = "11:00 AM";
            break;
        case 100:
            $timeapp = "1:00 PM";
            break;
        case 200:
            $timeapp = "2:00 PM";
            break;
        case 300:
            $timeapp = "3:00 PM";
            break;
        case 400:
            $timeapp = "4:00 PM";
            break;
        default:
            $timeapp = "wrong time";
    }

    return $timeapp;
}

function get_time_ago($time)
{
    $time_difference = time() - $time;

    if ($time_difference < 1) {
        return 'just now';
    }
    $condition = array(
        12 * 30 * 24 * 60 * 60 =>  'year',
        30 * 24 * 60 * 60       =>  'month',
        24 * 60 * 60            =>  'day',
        60 * 60                 =>  'hour',
        60                      =>  'minute',
        1                       =>  'second'
    );

    foreach ($condition as $secs => $str) {
        $d = $time_difference / $secs;

        if ($d >= 1) {
            $t = round($d);
            return  $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
        }
    }
}

function random_username($string)
{
    $pattern = " ";
    $firstPart = strstr(strtolower($string), $pattern, true);
    $secondPart = substr(strstr(strtolower($string), $pattern, false), 0, 3);
    $nrRand = rand(0, 100);

    $username = trim($firstPart) . trim($secondPart) . trim($nrRand);
    return $username;
}

function arraymaker($value)
{
    $arr = $value;
    $arrayval = explode(',', $arr);

    return $arrayval;
}
