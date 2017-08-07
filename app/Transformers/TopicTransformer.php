<?php

namespace App\Transformers;

use App\Models\Section;
use App\Models\Topic;
use App\Transformers\SectionTransformer;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'user', 'section'
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

    public function includeSection(Topic $topic)
    {
        return $this->item($topic->section, new SectionTransformer);
    }
}
