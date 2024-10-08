<?php

namespace App\Models;

use App\Http\Filters\NoteFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'not_tag');
    }

    public function scopeFilter(Builder $builder, array $data): Builder
    {
        return (new NoteFilter)->apply($builder, $data);
    }
}
