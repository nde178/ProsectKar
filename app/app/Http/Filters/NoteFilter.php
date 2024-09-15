<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class NoteFilter extends AbstractFilter
{
    protected array $keys = [
        'title',
        'content',
        'tag_title',
    ];

    protected function title(Builder $builder, string $value)
    {
        $builder->where('title', 'like', "%$value%");

    }

    protected function body(Builder $builder, string $value)
    {
        $builder->where('content', 'like', "%$value%");
    }

    protected function tag_title(Builder $builder, string $value)
    {
        $builder->whereRelation('tag', 'title', 'like', "%$value%");
    }
}
