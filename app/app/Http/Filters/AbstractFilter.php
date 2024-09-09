<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

class AbstractFilter
{
    protected array $keys = [];
    public function apply(Builder $builder ,array $data): Builder
    {

        foreach ($this->keys as $key) {
            if (isset($data[$key])) {
                $method=Str::camel($key);
                $this->$method($builder, $data[$key]);
            }
        }

        return $builder;
    }
}
