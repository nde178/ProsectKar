<?php

namespace App\Service\Note;

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

    public function filter_title($title)
    {
        $notes = Note::where('title', 'like', '%'.$title.'%')->get();

        return $notes;

    }
}
