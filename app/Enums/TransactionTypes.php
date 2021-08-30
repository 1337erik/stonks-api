<?php

namespace App\Enums;

/**
 * TransactionTypes Enum
 *
 * @method static TransactionTypes COMPOUND()
 * @method static TransactionTypes INVESTMENT()
 * @method static TransactionTypes UNINVESTMENT()
 * @method static TransactionTypes WITHDRAW()
 * @method static TransactionTypes GENERATE()
 */
class TransactionTypes extends BaseEnum
{
    private const COMPOUND     = 'compound';
    private const INVESTMENT   = 'investment';
    private const UNINVESTMENT = 'uninvestment';
    private const WITHDRAW     = 'withdraw';
    private const GENERATE     = 'generate';

    /**
     * Get all status options.
     *
     * @return array
     */
    public static function all()
    {
        return [

            self::COMPOUND()->getValue(),
            self::INVESTMENT()->getValue(),
            self::UNINVESTMENT()->getValue(),
            self::WITHDRAW()->getValue(),
            self::GENERATE()->getValue()
        ];
    }

    public static function random()
    {
        return self::all()[ mt_rand( 0, count( self::all() ) - 1 ) ];
    }

    // REFERENCE MATERIAL BELOW

    // /**
    //  * These statuses are considered cancelled statuses for a schedule
    //  *
    //  * @return array
    //  */
    // public static function consideredCancelled()
    // {
    //     return [
    //         self::CAREGIVER_CANCELED()->getValue(),
    //         self::CLIENT_CANCELED()->getValue(),
    //         self::OPEN_SHIFT()->getValue(),
    //         self::HOSPITAL_HOLD()->getValue(),
    //         self::CAREGIVER_NOSHOW()->getValue()
    //     ];
    // }

    // /**
    //  * These statuses are considered not canceled, useful for throwing in as a "whereIn" clause for reporting purposes
    //  *
    //  * @return array
    //  */
    // public static function notConsideredCancelled()
    // {
    //     return array_diff(self::all(), self::consideredCancelled());
    // }
}
