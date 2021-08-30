<?php

namespace App\Managers;

use App\Coin;
use App\Account;
use App\Enums\TransactionTypes;
use App\Farm;
use App\Http\Requests\EventFarmRequest;
use App\Transaction;
use Carbon\Carbon;

class FarmManager
{
    protected $recorded_coins;
    protected $recorded_usd_v;
    protected $resulted_coins;
    protected $resulted_usd_v;

    protected $new_transactions = [];

    /**
     * 
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Take a farm and a payload that represents any necessary data for a system-wide pulse
     *  that will distribute gains to the various share holders of that farm
     * 
     * @return array $new_transactions
     */
    public function eventFarm( Farm $farm, EventFarmRequest $request )
    {
        // TODO make sure that this is enforcing the structure of the request for whitelisting..
        // TODO wrap this entire thing in a try/catch with protection

        $accounts = $farm->accounts()->get()->filter( function( Account $account ){

            return !is_god( $account->user );
        });

        $coin_amount = $request->coin_amount;
        $farm_usd_value = $request->farm_usd_value;
        $coin = Coin::find( $request->coin_id );

        $coin_usd_value = $request->coin_usd_value;
        $coin->update([ 'usd_value' => $coin_usd_value ]); // update the coins value

        $farm_recorded_apr = $request->farm_recorded_apr;
        $farm->update([ 'current_apr' => $farm_recorded_apr ]); // update the farms current apr

        // dd( $accounts->count(), $coin_amount, $coin_usd_value, $farm_usd_value, $coin->name );

        $this->recorded_coins = $coin_amount;
        $this->recorded_usd_v = $coin_amount * $coin->usd_value;
        $this->resulted_coins = $coin_amount;
        $this->resulted_usd_v = $coin_amount * $coin->usd_value;

        $accounts = $accounts->each( function( $account ) use ( $farm_usd_value, $coin_amount, $coin, $farm_recorded_apr ){
            // calculate how much percentage of the total each account gets - omit god for later calculations

            $percentage = divide( $account->usd_value_override, $farm_usd_value, 10 );
            $yield_coin = multiply( multiply( $coin_amount, $percentage ), 0.9 ); // TODO change this to reflect the individual-specific percentages promised.. also to make room for affiliates
            $yield_usd  = $yield_coin * $coin->usd_value;

            $this->resulted_coins -= $yield_coin;
            $this->resulted_usd_v -= $yield_usd;

            // create a transaction for each disbursement
            $trans = Transaction::create([
                // TODO move this to a manager class of some sorts.. maybe

                'user_id'        => $account->user_id,
                'coin_id'        => 2,
                'farm_id'        => $account->farm_id,
                'type'           => TransactionTypes::GENERATE(),
                'coin_amount'    => $yield_coin,
                'usd_value'      => $yield_usd,
                'recorded_apr'   => $farm_recorded_apr,
                'effective_date' => Carbon::now(),
            ]);

            array_push( $this->new_transactions, $trans );

            // disburse the generated coins to the receiving account // TODO move this to separate function
            $deposit_account = Account::firstOrNew([ 'user_id' => $account->user_id, 'coin_id' => 2, 'farm_id' => null ]); // TODO move to model query scope
            $deposit_account->coin_amount += $yield_coin;
            $deposit_account->usd_value_override = ( $deposit_account->coin_amount * $coin->usd_value );
            $deposit_account->save();
        });

        // give god his dues // TODO move this to separate function
        $god = Account::firstOrNew([ 'user_id' => 1, 'coin_id' => 2, 'farm_id' => null ]);
        $god->coin_amount += $this->resulted_coins;
        $god->usd_value_override = ( $god->coin_amount * $coin->usd_value );
        $god->save();

        return $this->new_transactions;
    }
}