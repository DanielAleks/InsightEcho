<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Uuid;

class Research extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'productresearch';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid4()->toString();
        });
    }

    // maybe delete the roadBlocks field or use for something else
    protected $fillable = ['title', 'targetMarket', 'avatar', 'currentState', 'dreamState', 'roadBlocks', 'solution', 'product'];

    // RELATIONSHIPS
    public function Post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }
    public function Tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }
    public function RoadBlocks(): BelongsToMany {
        return $this->belongsToMany(RoadBlock::class);
    }
}
