<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'is_published' => 'nullable|date_format:Y-m-d',
            'tag_id' => 'required|integer|exists:tags,id',
        ];
    }
}
