<?php

namespace App\Transformers;

use App\Models\Topic;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'user'
    ];
    public function transform(Topic $topic)
    {
        return [
            'id'            => $topic->id,
            'title'         => $topic->title,
            'slug'          => $topic->slug,
            'body'          => $topic->body,
            'diffForHuman'  => $topic->created_at->diffForHumans(),
        ];
    }

    public function includeUser(Topic $topic)
    {
        return $this->item($topic->user, new UserTransformer);
    }
}
