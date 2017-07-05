<?php
/**
 *  * Created by PhpStorm.
 * User: Krishna Rao
 * Date: 5/7/17
 * Time: 2:48 PM
 */


$test_cases = [
    ['q' =>  'emordnilaP', 'a' =>  'FALSE'],
    ['q' =>  '',           'a' =>  'UNDETERMINED'],
    ['q' =>  'Kayak',      'a' =>  'TRUE'],
    ['q' =>  'No lemon, no melon', 'a' =>  'TRUE']
];

function is_a_palindrome($input) {
    if (! $input) {
        return "UNDETERMINED";
    }
    else {
        //strip out non alphanumeric characters
        $filtered = preg_replace('/[^\da-z]/i', '', $input);
        return (strcasecmp($filtered, strrev($filtered)) == 0) ? "TRUE" : "FALSE";
    }
}

foreach ($test_cases as $case) {
    print "Input : '{$case['q']}' : Result : " . is_a_palindrome($case['q']) . "\n";
}
