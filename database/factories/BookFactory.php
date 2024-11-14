<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    // Метод для создания новых экземпляров модели Book
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'publication' => $this->faker->year(),
            'pages' => $this->faker->numberBetween(5, 3000),
            'price' => $this->faker->randomFloat(2, 50.00, 1000.00),
        ];
    }

    public function configure()
    {
        // Для каждой книги добавляем случайные жанры
        return $this->afterCreating(function (Book $book) {
            if (Genre::count()) {
                $genres = Genre::inRandomOrder()->limit(rand(1, 3))->pluck('id')->toArray();
                $book->genres()->attach($genres);
            }
        });
    }
}
