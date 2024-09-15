<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class TagFilter extends AbstractFilter
{
    protected array $keys = [
        'title',
    ];

    protected function title(Builder $builder, string $value)
    {
        $builder->where('title', 'like', "%$value%");
    }
}
