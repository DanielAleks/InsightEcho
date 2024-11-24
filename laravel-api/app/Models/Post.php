<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'posts';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    protected $fillable = ['title', 'body', 'setting', 'avg_video_length', 'hook', 'transitions', 'lighting', 'music'];

    // RELATIONSHIPS
    public function Researches(): HasMany {
        return $this->hasMany(Research::class);
    }

    public function Roadblocks(): BelongsToMany {
        return $this->belongsToMany(Roadblock::class);
    }

    public function Tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function Infos(): HasMany {
        return $this->hasMany(Info::class);
    }
    public function Comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
