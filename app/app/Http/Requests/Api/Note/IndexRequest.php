<?php

namespace App\Http\Requests\Api\Note;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'content' => 'nullable|string',
        ];
    }
}
