<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'FName',
        'LName',
        'Country',
        'City',
        'Address',
    ];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }
}
