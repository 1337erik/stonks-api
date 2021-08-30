<?php

use App\Enums\TransactionTypes;
use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $initial_transactions = [

            // investments..
            [
                'user_id'        => 1,
                'type'           => TransactionTypes::INVESTMENT(),
                'effective_date' => Carbon::parse( '5/20/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 18500,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 2,
                'type'           => TransactionTypes::INVESTMENT(),
                'effective_date' => Carbon::parse( '7/06/2021' ),
                'coin_amount'    => 10000,
                'coin_id'        => 1,
                'farm_id'        => 1,
                'usd_value'      => 10000,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 3,
                'type'           => TransactionTypes::INVESTMENT(),
                'effective_date' => Carbon::parse( '7/16/2021' ),
                'coin_amount'    => 1000,
                'coin_id'        => 1,
                'farm_id'        => 1,
                'usd_value'      => 1000,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 4,
                'type'           => TransactionTypes::INVESTMENT(),
                'effective_date' => Carbon::parse( '8/6/2021' ),
                'coin_amount'    => 2000,
                'coin_id'        => 1,
                'farm_id'        => 1,
                'usd_value'      => 2000,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 5,
                'type'           => TransactionTypes::INVESTMENT(),
                'effective_date' => Carbon::parse( '8/20/2021' ),
                'coin_amount'    => 40,
                'coin_id'        => 1,
                'farm_id'        => 1,
                'usd_value'      => 40,
                'recorded_apr'   => null,
            ],

            // Withdrawals..
            [
                'user_id'        => 1,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '6/23/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 2391,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 1,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '7/4/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 1278,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 1,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '7/23/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 3200,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 1,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '8/6/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 1291.79,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 1,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '8/13/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 842,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 1,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '8/20/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 2500,
                'recorded_apr'   => null,
            ],

            [
                'user_id'        => 2,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '7/9/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 338,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 2,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '7/16/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 778,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 2,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '7/23/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 571.79,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 2,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '7/30/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 713,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 2,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '8/6/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 732,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 2,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '8/13/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 518,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 2,
                'type'           => TransactionTypes::WITHDRAW(),
                'effective_date' => Carbon::parse( '8/20/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 570,
                'recorded_apr'   => null,
            ],

            // Compounds..
            [
                'user_id'        => 1,
                'type'           => TransactionTypes::COMPOUND(),
                'effective_date' => Carbon::parse( '8/20/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 7845.719,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 3,
                'type'           => TransactionTypes::COMPOUND(),
                'effective_date' => Carbon::parse( '7/23/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 48.1537,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 3,
                'type'           => TransactionTypes::COMPOUND(),
                'effective_date' => Carbon::parse( '7/30/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 67.9,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 3,
                'type'           => TransactionTypes::COMPOUND(),
                'effective_date' => Carbon::parse( '8/6/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 63,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 3,
                'type'           => TransactionTypes::COMPOUND(),
                'effective_date' => Carbon::parse( '8/13/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 48,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 3,
                'type'           => TransactionTypes::COMPOUND(),
                'effective_date' => Carbon::parse( '8/20/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 58,
                'recorded_apr'   => null,
            ],

            [
                'user_id'        => 4,
                'type'           => TransactionTypes::COMPOUND(),
                'effective_date' => Carbon::parse( '8/13/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 81,
                'recorded_apr'   => null,
            ],
            [
                'user_id'        => 4,
                'type'           => TransactionTypes::COMPOUND(),
                'effective_date' => Carbon::parse( '8/20/2021' ),
                'coin_amount'    => null,
                'coin_id'        => 2,
                'farm_id'        => 1,
                'usd_value'      => 97,
                'recorded_apr'   => null,
            ],
        ];

        foreach( $initial_transactions as $trans ){

            if( in_array( $trans[ 'type' ], [ TransactionTypes::COMPOUND(), TransactionTypes::WITHDRAW() ] ) ){

                Transaction::create( array_merge( $trans, [

                    'type'    => TransactionTypes::GENERATE(),
                    'farm_id' => 1,
                    'coin_id' => 2,
                    'effective_date' => Carbon::parse( $trans[ 'effective_date' ] )->subDays( 1 )
                ]));
            }

            Transaction::create( $trans );
        }
    }
}
