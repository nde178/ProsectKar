<?php

namespace App\Http\Controllers;

use App\Http\Requests\Note\IndexRequest;
use App\Http\Resources\NoteResource;
use App\Http\Resources\TagResource;
use App\Models\Note;
use App\Models\Tag;
use App\Http\Requests\Note\StoreRequest;
use App\Http\Requests\Note\UpdateRequest;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(IndexRequest $request)
    {

        $data = $request->validated();
        $notes=Note::filter($data)->get();
        $notes=NoteResource::collection($notes)->resolve();

        return inertia('Note/Index', compact('notes'));
    }

    public function title ($title)
    {
        $notes=Note::where('title', 'like', '%'.$title.'%')->get();
        $notes=NoteResource::collection($notes)->resolve();
        return json_encode($notes);
        return inertia('Note/Index', compact('notes'));
    }



    public function create()
    {
        $tags = TagResource::collection(Tag::all())->resolve();
        return inertia('Note/Create', compact('tags'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $note = Note::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $data['user_id'],
        ]);
        $note->tags()->attach($data['tag_id']);
        return NoteResource::make($note);
    }
        public function edit(Note $note)
        {
            $tags = TagResource::collection(Tag::all())->resolve();
            return inertia('Note/Edit', compact('note', 'tags'));
        }
        public function update(UpdateRequest $request)
        {
            $data = $request->validated();
            $note = Note::find($data['id']);
            $note->update([
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
            $note->tags()->sync($request->tag_id);
            return NoteResource::make($note);
        }
        public function destroy($note)
        {
            $note = Note::find($note);
            $note->delete();

            return response()->json(['message' => 'Note deleted successfully']);
        }
    }
