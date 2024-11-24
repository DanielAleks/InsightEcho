<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ["title", "subtitle", "color", "isActive"];

    // RELATIONSHIPS
    // are these 3, all belongsToMany relationships???
    public function Posts():BelongsToMany {
        return $this->belongsToMany(Post::class);
    }
    public function Researches():HasMany {
        return $this->hasMany(Research::class);
    }
    public function RoadBlocks():BelongsToMany {
        return $this->belongsToMany(RoadBlock::class);
    }
}
