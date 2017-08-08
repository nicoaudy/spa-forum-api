<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\CreatePostRequest;
use App\Models\Topic;

class PostController extends Controller
{
    public function store(CreatePostRequest $request, Topic $topic)
    {
    	$post = $topic->posts()->create([
    		'body'		=> $request->json('body'),
    		'user_id'	=> $request->user()->id
    	]);
    }
}
