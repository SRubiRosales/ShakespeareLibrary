<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $primaryKey = 'book_id';
    protected $fillable = [
        'name', 
        'author',
        'publish_date',
        'category_id',
        'available',
    ];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'LIKE', "%$name%");
        }
    }

    public function scopeAuthor($query, $author)
    {
        if ($author) {
            return $query->where('author', 'LIKE', "%$author%");
        }
    }

    public function scopePublishDate($query, $publish_date)
    {
        if ($publish_date) {
            return $query->where('publish_date', 'LIKE', "%$publish_date%");
        }
    }

    public function scopeAvailable($query, $available)
    {
        if ($available) {
            return $query->where('available', '=', "$available");
        }
    }
}
