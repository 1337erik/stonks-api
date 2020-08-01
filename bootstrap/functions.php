<?php

////////////////////////////////////
//// Float Safe Math Functions
////////////////////////////////////

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

function add($operand1, $operand2, $decimals=2): float
{
    return round(
        bcadd($operand1, $operand2, ceil($decimals*2)),
        $decimals
    );
}

function subtract($operand1, $operand2, $decimals=2): float
{
    return round(
        bcsub($operand1, $operand2, ceil($decimals*2)),
        $decimals
    );
}

function divide($operand1, $operand2, $decimals=2): float
{
    return round(
        bcdiv($operand1, $operand2, ceil($decimals*2)),
        $decimals
    );
}

function multiply($operand1, $operand2, $decimals=2): float
{
    return round(
        bcmul($operand1, $operand2, ceil($decimals*2)),
        $decimals
    );
}

/**
 * 4 represents fourths ( i.e 0.25 ), 8 represents eights ( i.e 0.125 ), and so..
 * 
 * floor or ceil for rounding up/down obviously
 */
function round_to_fraction( $number, $fraction = 4, $direction = 'floor' ){

    switch( $direction ){

        case 'floor':

            return divide( floor( multiply( $number, $fraction ) ), $fraction, $fraction );
        case 'ceil':

            return divide( ceil( multiply( $number, $fraction ) ), $fraction, $fraction );
        default:

            return null;
    }
}

/**
 * Handy utility function to map the typical pagination controls that are on every table we use ( ideally )
 * 
 * @param Illuminate\Http\Request $request
 * @return array
 */
function mapPagination( Request $request )
{
    $perPage   = $request->input( 'perPage', 25 );
    $page      = $request->input( 'page', 1 );
    $sortOrder = $request->input( 'desc', false ) == 'true' ? 'desc' : 'asc';
    $offset    = ( $page - 1 ) * $perPage;
    return [ $perPage, $sortOrder, $offset ];
}

/**
 * Happy String Helper, use this to stop the evil "" -> “” thing.. aka non ascii characters
 * 
 * returns the exact string without characters outside of ascii
 * @param string $string
 * @return string
 */
function onlyAscii( $string )
{
    return preg_replace( '/[\x00-\x1F\x80-\xFF]/', '', $string );
}

/**
 * Happy String Helper #2, use this to remove both ' and " characters, which caused problems in claim transmissions
 * 
 * returns the exact string without ' or " anywhere :O
 * @param string $string
 * @return string
 */
function stripQuotes( $string )
{
    return str_replace( "'", '', str_replace( '"', '', $string ) );
}

/**
 * easy helper to use all existing and future sanitizers
 * 
 * @param string $string
 * @return string
 */
function fullSanitize( $string )
{
    return onlyAscii( stripQuotes( $string ) );
}

/**
 * Displays up to 4 decimal places, with a minimum of 2 decimal places, trimming unnecessary zeroes
 *
 * @param mixed $number
 * @param int $minimumDecimals
 * @param int $maximumDecimals
 * @return string
 */
function rate_format($number, int $minimumDecimals = 2, int $maximumDecimals = 4): string
{
    $formatted = number_format($number, $maximumDecimals, '.', ',');
    $minimumLength = strpos($formatted, '.') + $minimumDecimals + 1;
    $extra = rtrim(substr($formatted, $minimumLength), "0");
    return substr($formatted, 0, $minimumLength) . $extra;
}

////////////////////////////////////
//// Date Functions
////////////////////////////////////

function filter_date($input, $to_format='Y-m-d') {
    if (!$input) return null;
    $carbon = new \Carbon\Carbon($input);
    return $carbon->format($to_format);
}

function filter_dates(...$dates) {
    return array_map(function($date) {
        return filter_date($date);
    }, $dates);
}

/**
 * Handle input of date and time, output to ISO
 *
 * @param $date
 * @param $time
 * @param string $timezone
 * @param null|string $output_timezone  Leave null to keep the same timezone as $timezone
 * @param string $output_date_format
 * @return string
 */
function api_date_and_time($date, $time, $timezone='UTC', $output_timezone = null, $output_date_format=DATE_ISO8601) {
    $datetime = new \Carbon\Carbon($date . ' ' . $time, $timezone);
    if ($output_timezone) $datetime->setTimezone(new DateTimeZone($output_timezone));
    return $datetime->format($output_date_format);
}

function todays_date($format = 'Y-m-d', $to_timezone = 'America/New_York') {
    return local_date('now', $format, $to_timezone);
}

function local_date($input, $to_format='m/d/Y', $to_timezone = 'America/New_York', $from_timezone='UTC') {
    $carbon = new \Carbon\Carbon($input, $from_timezone);
    $carbon->timezone($to_timezone);
    return $carbon->format($to_format);
}

function utc_date($input, $to_format='Y-m-d H:i:s', $from_timezone='America/New_York') {
    $carbon = new \Carbon\Carbon($input, $from_timezone);
    $carbon->timezone('UTC');
    return $carbon->format($to_format);
}

////////////////////////////////////
//// Date Functions
////////////////////////////////////

/**
 * Determines whether or not the authenticated user contains the "God" role in the system
 * 
 * @return bool
 */
function is_god(){

    $user = Auth::user();

    return $user->email === 'erikpwhite@gmail.com' && $user->hasRole( Role::GOD );
}