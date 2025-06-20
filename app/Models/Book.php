<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'Title',
        'Type',
        'Price',
        'Publisher_id',
        'Author_id',
        'cover_image'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'Author_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'Publisher_id');
    }

    public function getCoverImageUrlAttribute()
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : null;
    }
}
