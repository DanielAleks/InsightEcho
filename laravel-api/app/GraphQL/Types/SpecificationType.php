<?php

namespace App\GraphQL\Types;

use App\Models\Info;
use GraphQL\Type\Definition\Type;
// use GraphQL;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Info',
        'description' => 'Collection of Daniel Aleksandrovs Posts',
        'model' => Info::class
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
            // 'suppliers' => [
            //     'type' => Type::array(),
            //     'description' => 'avg_video_length of post'
            // ],
            // 'sellingPrice' => [
            //     'type' => Type::array(),
            //     'description' => 'hook of post'
            // ],
            'costs' => [
                'type' => Type::int(),
                'description' => 'transitions of post'
            ],
            'links' => [
                'type' => Type::string(),
                'description' => 'lighting of post'
            ],
        ];
    }
}