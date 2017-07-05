<?php
/**
 *  * Created by PhpStorm.
 * User: Krishna Rao
 * Date: 5/7/17
 * Time: 4:42 PM
 */
date_default_timezone_set('Australia/Sydney');

$test_cases = [
    ['q' =>  '12:00:00', 'a' =>  '0 degrees'],
    ['q' =>  '12:15:00', 'a' =>  '82.5 degrees'],
    ['q' =>  '11:40',    'a' =>  '110 degrees']
];

function degrees_between_clock_hands($input_time = null) {

    if(!$input_time) {
        $input_time = date('h:i:s');
    }

    $matches = [];
    if(preg_match('/^(\d{2}):(\d{2})/', $input_time, $matches)) {
        // Removing the leading zero .. not that it will make a difference. There are other ways too.
        $hour = intval($matches[1]);
        $minutes = intval($matches[2]);

        if($hour == 12) $hour = 0;

        // Hour hand moves 30 degrees per hour plus 1/2 a degree per minute
        $hour_degrees = ( $hour * 30 ) + ($minutes * 0.5);

        //Minute hand moves 6 degrees an hour ..
        $minute_degrees = $minutes * 6;

        $difference =  sprintf("%.1f degrees", abs($hour_degrees - $minute_degrees));
        return str_replace('.0', '', $difference);


    } else {
         return "Bad Input format";
    }
}

foreach ($test_cases as $case) {
    print "Input : '{$case['q']}' : Result : " . degrees_between_clock_hands($case['q']) . "<BR>\n";
}



