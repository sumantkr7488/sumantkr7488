<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class FilterScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if ($companyId = request()->query('company_id')) {
            $builder->where('company_id', $companyId);
        }
        if ($search = request()->query('search')) {
            $builder->where('first_name', 'LIKE', "%{$search}%");
        }
    }
}