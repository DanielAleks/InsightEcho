<?php

// app/graphql/mutations/category/UpdateCategoryMutation 

namespace App\GraphQL\Mutations\Post;

use App\Models\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdatePostMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updatePost',
        'description' => 'Updates a post'
    ];

    public function type(): Type
    {
        return GraphQL::type('Post');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'title' => [
                'name' => 'title',
                'type' =>  Type::string(),
            ],
            'setting' => [
                'name' => 'setting',
                'type' =>  Type::string(),
            ],
            'avg_video_length' => [
                'name' => 'avg_video_length',
                'type' =>  Type::int(),
            ],
            'hook' => [
                'name' => 'hook',
                'type' =>  Type::string(),
            ],
            'transitions' => [
                'name' => 'transitions',
                'type' =>  Type::int(),
            ],
            'lighting' => [
                'name' => 'lighting',
                'type' =>  Type::string(),
            ],
            'music' => [
                'name' => 'music',
                'type' =>  Type::string(),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $post = Post::findOrFail($args['id']);
        $post->fill($args);
        $post->save();

        return $post;
    }
}