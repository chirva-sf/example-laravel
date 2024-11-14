<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author', 'publication', 'pages', 'price'];

    // Установление связи с жанрами (многие-ко-многим)
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'books_genres');
    }
}
