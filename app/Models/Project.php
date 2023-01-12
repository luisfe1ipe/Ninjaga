<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'synopsis',
        'released',
        'banner',
        'status',
        'type',
        'author_id',
        'studio_id'
    ];

    public function genres(){
        return $this->belongsToMany(Genre::class, 'genre_project');
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }
}
