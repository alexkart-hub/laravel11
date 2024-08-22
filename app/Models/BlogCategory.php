<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'category_id')
            ->where('is_published', 1)
            ->orderBy('created_at', 'desc');
    }
}
