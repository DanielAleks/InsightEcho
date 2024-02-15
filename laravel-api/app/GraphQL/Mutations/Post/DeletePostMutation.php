<?php

// app/graphql/mutations/category/DeleteCategoryMutation 

namespace App\GraphQL\Mutations\Post;

use App\Models\Post;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeletePostMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deletePost',
        'description' => 'deletes a post'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $post = Post::findOrFail($args['id']);

        return  $post->delete() ? true : false;
    }
}