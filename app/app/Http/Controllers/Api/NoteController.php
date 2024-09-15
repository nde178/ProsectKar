<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Note\IndexRequest;
use App\Http\Requests\Api\Note\StoreRequest;
use App\Http\Resources\Api\NoteResource;
use App\Models\Note;
use App\Service\Api\Note\NoteService;

class NoteController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $notes = Note::filter($data)->get();

        return NoteResource::collection($notes)->resolve();
    }

    public function show(Note $note)
    {
        return NoteResource::make($note);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        return NoteResource::make((new NoteService)->create($data));
    }

    public function update(Note $note, StoreRequest $request)
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
