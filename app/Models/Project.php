<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'formated_title',
        'synopsis',
        'released',
        'banner',
        'status',
        'type',
        'author_id',
        'studio_id'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_project');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }

    public function completed()
    {
        return $this->hasOne(Completed::class);
    }

    public function read()
    {
        return $this->hasOne(Read::class);
    }

    public function stop()
    {
        return $this->hasOne(Stop::class);
    }
}
