<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['name_eng', 'name_rus'];

    // Установление связи с книгами (многие-ко-многим)
    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_genres');
    }
}
