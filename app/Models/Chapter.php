<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'images',
        'project_id',
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getImagesAttribute($images)
    {
        $images = json_decode($images, true);

        $formattedImages = [];
        foreach ($images as $img) {
            $formattedImages[] = asset("storage/$img");
        }

        return $formattedImages;
    }
}
