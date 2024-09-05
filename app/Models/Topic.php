<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'topic_title',
        'content',
        'trending',
        'published',
        'image',
        'category_id',
        'no_of_views',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
