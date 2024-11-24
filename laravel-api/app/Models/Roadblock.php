<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roadblock extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "level"];

    // RELATIONSHIPS
    public function Post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }
    public function Tag(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
        
    }
    public function Comments(): HasMany {
    return $this->hasMany(Comment::class);
    }
}
