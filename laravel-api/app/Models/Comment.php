<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "isPositive"];

    public function Post(): HasOne {
        return $this->hasOne(Post::class);
    }
    public function Roadblock(): HasOne {
        return $this->hasOne(RoadBlock::class);
    }
}
