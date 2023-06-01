<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'synopsis',
        'released_year',
        'banner',
        'visible',
        'author_id',
        'studio_id',
        'type_id',
        'status_id',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapters::class);
    }

    public function genres():BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'genre_project');
    }

    public function getBannerAttribute($banner)
    {
        if ($banner) return asset("storage/$banner");
        else return null;
    }
}
