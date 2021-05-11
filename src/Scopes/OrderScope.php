<?php

namespace Morsapt\Changelog\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Request;

class OrderScope implements Scope
{
    /**
     * Sort records by give fields and direction
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (Request::has('orderBy')) {

            $orderFields = Request::get('orderBy');

            foreach($orderFields as $column => $direction){
                if(in_array($direction,  ['ASC', 'DESC'])) {
                    $builder->orderBy($column, $direction);
                }
            }
        }
    }
}
