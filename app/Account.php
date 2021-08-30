<?php

namespace App;

use App\Http\Resources\AccountCollectionResource;
use App\Http\Resources\AccountResource;
use App\Traits\PaginationTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Account extends Model
{
    use PaginationTrait;

    protected $guarded = [];

    protected $casts = [

        'usd_value_override' => 'double',
        'coin_amount' => 'double'
    ];

    public function farm()
    {
        return $this->hasOne( Farm::class, 'id', 'farm_id' );
    }

    public function coin()
    {
        return $this->belongsTo( Coin::class );
    }

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function uplink()
    {
        return $this->belongsTo( User::class, 'uplink_id', 'id' );
    }

    public static function getCollectionResource( $collection )
    {
        return new AccountCollectionResource( $collection );
    }

    public static function getResource( $record )
    {
        return new AccountResource( $record );
    }
    ////////////////////////////////// Pagination Controls //////////////////////////////////
    protected $sortable_fields = [

        'id'             => 'accounts.id',
        'created_at'     => 'accounts.created_at',
    ];

    /**
     * model-specific joins
     *  the select is imortant for certain cases where column names will override eachother ( especially ids )
     *  the last one in the select gets taken, so if: tableA.*, tableB.* then the id returned will be that of tableB
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeWithJoins(Builder $builder)
    {
        return $builder->leftJoin( 'users', 'users.id', 'accounts.user_id')
            ->select( 'accounts.*' );
    }

    /**
     * model-specific filters
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeWithFilters(Builder $builder, Request $request)
    {
        return $builder->forUser( auth()->user() ); // TODO adjust so that user id is dynamic for viewing downlinks
    }

    //////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////// Query Scopes /////////////////////////////////////////

    /**
     * scope for user
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param User $user
     * 
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeForUser( Builder $builder, User $user )
    {
        // TODO move this to common base model of sorts
        return $builder->where( 'user_id', $user->id );
    }

    //////////////////////////////////////////////////////////////////////////////////////////
}
