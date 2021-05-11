<?php

namespace Morsapt\Changelog\Scopes;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PerPageScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     * Limit requested number of items from Model
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {

        // make a 500 limit
        if (Request::has('perPage') && Request::get('perPage') > 0) {

            $perPage = (int)parseInRequest::get('perPage', 20);
            if ($perPage > 500) {
                $perPage = 500;
            } elseif ($perPage <= 0) {
                $perPage = 10;
            }

            $builder->take($perPage);
        }

    }
}
