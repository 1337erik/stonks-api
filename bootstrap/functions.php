<?php

use Carbon\Carbon;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

////////////////////////////////////
//// Float Safe Math Functions
////////////////////////////////////

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

/**
 * Check if an administrator is logged in or impersonating another user
 *
 * @return bool
 */
function is_admin() {

    if( Auth::check() ){ // && $impersonator = Auth::user()->impersonator() ) {

        // return $impersonator->role_type === 'admin';
        return Auth::user()->role_type === 'admin';
    }
    return is_admin_now();
}

/**
 * Check if an administrator is logged in and NOT impersonating another user
 *
 * @return bool
 */
function is_admin_now() {
    return Auth::check() && Auth::user()->role_type === 'admin';
}

/**
 * Check if the logged in user is an office user
 *
 * @return bool
 */
function is_office_user() {
    return Auth::check() && Auth::user()->role_type === 'office_user';
}

/**
 * Check if the logged in user is a caregiver
 *
 * @return bool
 */
function is_caregiver() {
    return Auth::check() && Auth::user()->role_type === 'caregiver';
}

/**
 * Check if the logged in user is a client
 *
 * @return bool
 */
function is_client() {
    return Auth::check() && Auth::user()->role_type === 'client';
}

if (! function_exists('snake_to_title_case')) {
    /**
     * Convert snake_case to Title Case.
     *
     * @param string $str
     * @return string
     */
    function snake_to_title_case(string $str): string
    {
        return Str::title(preg_replace('/_/', ' ', $str));
    }
}

if (! function_exists('download_file')) {
    /**
     * Download file from the given URL and save it to the local storage disk.
     * Usage: download_file('http://path', \Storage::disk('public'), 'path\file.txt')
     *
     * @param string $url
     * @param FilesystemAdapter $disk
     * @param string $filename
     * @return bool
     */
    function download_file(string $url, FilesystemAdapter $disk, string $filename): bool
    {
        try {
            $process = curl_init($url);
            curl_setopt($process, CURLOPT_HEADER, 1);
            curl_setopt($process, CURLOPT_TIMEOUT, 60);
            curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($process, CURLOPT_FOLLOWLOCATION, true);

            if (! ($result = curl_exec($process))) {
                return false;
            }

            $responseCode = curl_getinfo($process, CURLINFO_HTTP_CODE);
            $header_size = curl_getinfo($process, CURLINFO_HEADER_SIZE);
            curl_close($process);

            if ($responseCode != "200") {
                return false;
            }

            $contents = substr($result, $header_size);
            $disk->put($filename, $contents);
            return true;

        } catch (\Exception $ex) {
            app('sentry')->captureException($ex);
            return false;
        }
    }
}

if (! function_exists('dump_csv')) {
    function dump_csv(string $filename, \Illuminate\Support\Collection $data, array $headers = null): bool
    {
        if (! count($data)) {
            return false;
        }

        $fp = fopen($filename, 'w');

        if ($headers) {
            fputcsv($fp, $headers);
        } else {
            fputcsv($fp, array_keys($data->first()));
        }

        $data->each(function ($row) use ($fp) {
            fputcsv($fp, $row);
        });

        fclose($fp);

        return true;
    }
}

if (! function_exists('standard_filename')) {
    function standard_filename(string $subject, string $documentName, string $extension, bool $addDate = true) : string
    {
        $date = ' ' . Carbon::now()->format('Y-m-d');

        if (! $addDate) {
            $date = '';
        }

        return strtolower(Str::slug("{$subject} {$documentName}{$date}")) . ".{$extension}";
    }
}

if (! function_exists('valid_ssn')) {
    /**
     * Check for valid SSN format.
     *
     * @param null|string $ssn
     * @return bool
     */
    function valid_ssn(?string $ssn): bool
    {
        return preg_match('/^(?!666|000\d{2})\d{3}[- ]{0,1}(?!00)\d{2}[- ]{0,1}(?!0{4})\d{4}$/', $ssn);
    }
}

if (! function_exists('queue')) {
    /**
     * Dispatch a job to the queue with retries in case the
     * queue connection temporarily goes down.
     *
     * @param mixed $job
     * @throws Exception
     */
    function queue($job): void
    {
        retry(20, function () use ($job) {
           dispatch($job);
        }, 200);
    }
}
