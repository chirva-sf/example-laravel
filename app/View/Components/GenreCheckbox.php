<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Genre;

class GenreCheckbox extends Component
{
    public $genres;
    public $checked;

    // Конструктор принимает массив id жанров, которые должны быть отмечены
    public function __construct($checked = [])
    {
        $this->genres = Genre::all();
        $this->checked = $checked;
    }

    // Метод отображения компонента
    public function render(): View|Closure|string
    {
        return view('components.checkbox');
    }
}
