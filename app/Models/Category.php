<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'category_name',
    ];
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    public function no_of_topics()
    {
        return $this->hasMany(Topic::class)->count();
    }
    public function latest_topics()
    {
        return $this->hasMany(Topic::class)->where('published',1)->latest()->take(3);
    }
}
