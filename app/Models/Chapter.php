<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_chapter',
        'img',
        'project_id'
    ];

    protected $casts = [
        'img' => 'array'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
