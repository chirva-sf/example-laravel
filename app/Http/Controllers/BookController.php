<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookStoreRequest;
use App\Models\Genre;

class BookController extends Controller
{
    // Отображение формы создания/редактирования книги и списка всех книг
    public function index($id = null)
    {
        $books = Book::all()->sortByDesc('id');
        $data = compact('books');
        if ($id) {
            $book = Book::find($id);
            if ($book) {
                $bookGenres = $book->genres->pluck('id')->toArray();
                $data += compact('book', 'bookGenres');
            }
        }
        return view('form', $data);
    }

    // Сохранение/обновление книги и жанров
    public function store(BookStoreRequest $request)
    {
        if ($request->id) {
            $book = Book::find($request->id);
            $book->update($request->validated());
            $book->genres()->detach();
        } else {
            $book = new Book($request->validated());
            $book->save();
        }
        if ($request->genre) {
            foreach ($request->genre as $name_eng) {
                $genre = Genre::where('name_eng', $name_eng)->first();
                $book->genres()->attach($genre->id);
            }
        }
        return redirect('/index')->with('status', 'Книга успешно сохранена');
    }

    // Удаление книги
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('/index')->with('status', 'Книга успешно удалена');
    }
}
