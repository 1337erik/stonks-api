<?php

namespace App;

use App\Contracts\PaginatedModel;
use App\Http\Resources\TransactionCollectionResource;
use App\Http\Resources\TransactionResource;
use App\Traits\PaginationTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Transaction extends Model implements PaginatedModel
{
    use PaginationTrait;

    protected $guarded =[];
    protected $casts = [

        'effective_date' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function farm()
    {
        return $this->belongsTo( Farm::class );
    }

    public function coin()
    {
        return $this->belongsTo( Coin::class );
    }

    ////////////////////////////////// Pagination Controls //////////////////////////////////
    protected $sortable_fields = [

        'id'             => 'transactions.id',
        'user_id'        => 'transactions.user_id',
        'type'           => 'transactions.type',
        'amount'         => 'transactions.amount',
        'effective_date' => 'transactions.effective_date',
        'username'       => 'users.username',
        'created_at'     => 'transactions.created_at',
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
        return $builder->leftJoin( 'users', 'users.id', 'transactions.user_id')
            ->select( 'transactions.*' );
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
        return $builder->forUser( auth()->user() );
    }

    public static function getCollectionResource( $collection )
    {
        return new TransactionCollectionResource( $collection );
    }

    public static function getResource( $record )
    {
        return new TransactionResource( $record );
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
        return $builder->where( 'user_id', $user->id );
    }

    //////////////////////////////////////////////////////////////////////////////////////////

}