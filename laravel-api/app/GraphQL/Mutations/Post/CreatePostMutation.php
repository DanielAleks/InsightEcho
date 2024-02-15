<?php

// app/graphql/mutations/category/CreateCategoryMutation 

namespace App\GraphQL\Mutations\Post;

use App\Models\Post;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreatePostMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createPost',
        'description' => 'Creates a Dan Aleks Post'
    ];

    public function type(): Type
    {
        return GraphQL::type('Post');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
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
        $category = new Post();
        $category->fill($args);
        $category->save();

        return $category;
    }
}