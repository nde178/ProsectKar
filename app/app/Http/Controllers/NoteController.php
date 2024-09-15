<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\IndexRequest;
use App\Http\Requests\Note\StoreRequest;
use App\Http\Requests\Note\UpdateRequest;
use App\Http\Resources\NoteResource;
use App\Http\Resources\TagResource;
use App\Models\Note;
use App\Models\Tag;
use App\Service\Note\NoteService;

class NoteController extends Controller
{
    public function index(IndexRequest $request)
    {

        $data = $request->validated();
        $notes = Note::filter($data)->get();
        $notes = NoteResource::collection($notes)->resolve();

        return inertia('Note/Index', compact('notes'));
    }

    public function create(Note $note)
    {
        $tags = Tag::all();

        return inertia('Note/Create', compact('note', 'tags'));

    }

    public function title($title)
    {
        $notes = NoteResource::collection((new NoteService)->filter_title($title))->resolve();

        return json_encode($notes);

        return inertia('Note/Index', compact('notes'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        return NoteResource::make((new NoteService)->create($data));
    }

    public function edit(Note $note)
    {
        $tags = TagResource::collection(Tag::all())->resolve();

        return inertia('Note/Edit', compact('note', 'tags'));
    }

    public function update(Note $note, UpdateRequest $request)
    {
        $data = $request->validated();

        return NoteResource::make(new NoteService)->update($data, $note);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json(['message' => 'Note deleted successfully']);
    }
}
