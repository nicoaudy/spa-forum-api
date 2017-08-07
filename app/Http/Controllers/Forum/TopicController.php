<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\CreateTopicRequest;
use App\Models\Section;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request, Section $section)
    {
        //
    }

    public function show(Topic $topic)
    {
        //
    }

    public function store(CreateTopicRequest $request)
    {
        $topic = $request->user()->topics()->create([
            'title'         => $request->json('title'),
            'slug'          => str_slug($request->json('title')),
            'body'          => $request->json('body'),
            'section_id'    => $request->json('section_id'),
        ]);
    }
}
