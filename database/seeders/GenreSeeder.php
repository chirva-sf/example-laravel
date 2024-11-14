<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Список жанров для создания
        $genres = [
            'fantasy' => 'Фэнтези', 
            'sci-fi' => 'Фантастика', 
            'mystery' => 'Мистика', 
            'drama' => 'Драма',
            'textbook' => 'Учебная литература',
            'programming' => 'Программирование',
            'databases' => 'Базы данных',
            'internet' => 'Интернет',
        ];

        foreach ($genres as $name_eng => $name_rus) {
            Genre::create(['name_eng' => $name_eng, 'name_rus' => $name_rus]);
        }
    }
}
