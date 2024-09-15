<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'id' => 'required|integer',
            'user_id' => 'required|integer',
            'tag_id' => 'required|integer',

        ];
    }
}
