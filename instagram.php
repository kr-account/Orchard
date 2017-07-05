<?php
/**
 *  * Created by PhpStorm.
 * User: Krishna Rao
 * Date: 5/7/17
 */

$test_cases = [
    ['q' =>  'uncopyrightable', 'a' =>  'HETEROGRAM'],
    ['q' =>  'Caucasus',        'a' =>  'ISOGRAM'],
    ['q' =>  'authorising',     'a' =>  'NOTAGRAM']
];


function is_instagram($input) {

    if (!$input) return "NOTAGRAM";

    $filtered = strtolower(preg_replace('/[^\da-z]/i', '', $input));
    $alphabets = [];

    foreach (str_split($filtered, 1) as $char) {
        if(array_key_exists($char, $alphabets)) {
            $alphabets[$char]++;
        } else {
            $alphabets[$char] = 1;
        }
    }

    if( array_sum(array_values($alphabets)) == count($alphabets)) {
        return "HETEROGRAM";
    } elseif( count(array_unique(array_values($alphabets))) == 1 ) {
        return "ISOGRAM";
    } else {
        return "NOTAGRAM";
    }

}

foreach ($test_cases as $case) {
    print "Input : '{$case['q']}' : Result : " . is_instagram($case['q']) . "<BR>";
}
