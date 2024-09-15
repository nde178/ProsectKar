<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = TagResource::collection(Tag::all())->resolve();

        return response()->json($tags);
    }
}
