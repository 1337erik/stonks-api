<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

trait PaginationTrait
{
    /**
     * Define in model to create model-specific sortable fields,
     *  add the table name like tableName.columnName so this works with DB::table() queries and when eloquent is used for sorting through relationships
     */
    public function sortableFields()
    {
        return $this->sortable_fields ?? [
            'id'         => 'id',
            'created_at' => 'created_at'
        ];
    }

    /**
     * Override the model property for model-specific controls
     */
    public function defaultSortBy()
    {
        return $this->default_sort_by ?? 'created_at';
    }

    /**
     * Override the model property for model-specific controls
     */
    public function defaultSortDesc()
    {
        return $this->default_sort_desc ?? true;
    }

    /**
     * Override the model property for model-specific controls
     */
    public function defaultPerPage()
    {
        return $this->default_per_page ?? 25;
    }

    /**
     * TODO implement
     * Could potentially be moved to a separate trait handling exports - lumped in here since the pagination js mixin handles the export function as well considering it uses the same filters/sorting
     */
    public static function export(Request $request)
    {
        dd('todo, implement generalized exporting here');
    }

    /**
     * Add a query scope "ordered()" to centralize the control of sorting order of model results in queries.
     * Uses the unified utility in functions.php so that Eloquent Model:: queries and DB::table queries can share logic.
     *
     * **REMEMBER** you cannot server-side sort through eloquent relationships, you must join the table to sort through relationships.
     *
     * **FURTHERMORE** any common field-name across joins will overwrite ( especially the 'id' field ).
     *  So make sure to manually select the correct id
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param string|null $order_by
     * @param string|null $direction
     *
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeWithOrder(Builder $builder, string $sortBy = null, string $sortDesc = null)
    {
        $sortBy = $sortBy ?? $this->defaultSortBy();
        $sortDesc = $sortDesc ?? $this->defaultSortDesc();
        list($sortCol, $sortDir) = mapSort( $builder->getModel(), $sortBy, $sortDesc );

        return $builder->orderBy($sortCol, $sortDir);
    }

    /**
     * Handy utility function to map the typical pagination controls that are on every table we use ( ideally )
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeForPage(Builder $builder, $perPage = null, $page = 1)
    {
        $perPage = $perPage ?? $this->defaultPerPage();
        $offset = ($page - 1) * $perPage;

        return $builder->take($perPage)->skip($offset);
    }

    /**
     * Override this in the model
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeWithFilters(Builder $builder, Request $request)
    {
        return $builder;
    }

    /**
     * Override this in the model
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeWithJoins(Builder $builder, Request $request)
    {
        return $builder;
    }

    /**
     * Base Aggregates function, since any paginated table always uses "total" this is useful as a foundation that can be expanded upon on a per-use basis
     *  **NOTE** will gather aggregate data on pre-paginated, post-filtered results
     *
     * ovverride the static function "additionalAggregates" within your model to send additional data to the table for display upon page load with the relevant filters applied
     *  return as [ 'key' => $value ], see X835ImportRecord for example
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return array
     */
    public static function getAggregates(Builder $builder)
    {
        $aggregates = [ 'total' => $builder->count() ];

        if (method_exists(self::class, 'additionalAggregates')) {
            $aggregates = array_merge($aggregates, self::additionalAggregates($builder));
        }

        return $aggregates;
    }

    /**
     * Abstract method for handling pagination & sorting for all models,
     *  define filters & joins scopes within the model for model-specific overrides
     *  as well as the model resources
     */
    public static function getPaginated( Request $request )
    {
        $records = ( new self )->withJoins( $request )->withFilters( $request );

        $aggregates = self::getAggregates( $records );

        $results = $records->withOrder( $request->input( 'sort' ), $request->input( 'desc' ) )
            ->forPage( $request->input( 'perPage' ), $request->input( 'page' ) )
            ->get();

        $resultResource = self::getCollectionResource( $results );

        return [ $aggregates, $resultResource ];
    }
}