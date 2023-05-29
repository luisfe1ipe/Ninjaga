<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Studio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function projects(): hasMany
    {
        return $this->hasMany(Project::class);
    }
}
