<?php

namespace App\Service\Api\Note;

use App\Models\Note;

class NoteService
{
    public function create($data)
    {

        $user = auth()->user()->id;
        $note = Note::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $user,
        ]);
        $note->tags()->attach($data['tag_id']);

        return $note;
    }

    public function update($data, $note)
    {
        $note->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
        $note->tags()->sync($data['tag_id']);

        return $note;
    }
}
