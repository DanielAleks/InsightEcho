<?php

namespace App\GraphQL\Types;

use App\Models\Research;
use GraphQL\Type\Definition\Type;
// use GraphQL;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Research',
        'description' => 'Collection of Daniel Aleksandrovs Posts',
        'model' => Research::class
    ];

    public function fields(): array
    {
            return [
                'id' => [
                    'type' => Type::int(),
                    'description' => 'title of post'
                ],
                'title' => [
                    'type' => Type::string(),
                    'description' => 'setting of post'
                ],
                // 'targetMarket' => [
                //     'type' => Type::array(Type::string()),
                //     'description' => 'avg_video_length of post'
                // ],
                // 'avatar' => [
                //     'type' => Type::array(Type::string()),
                //     'description' => 'hook of post'
                // ],
                // 'currentState' => [
                //     'type' => Type::array(Type::string()),
                //     'description' => 'avg_video_length of post'
                // ],
                // 'dreamState' => [
                //     'type' => Type::array(Type::string()),
                //     'description' => 'hook of post'
                // ],
                // 'solution' => [
                //     'type' => Type::array(Type::string()),
                //     'description' => 'avg_video_length of post'
                // ],
                // 'avatar' => [
                //     'type' => Type::array(Type::string()),
                //     'description' => 'hook of post'
                // ],
        ];
    }
}