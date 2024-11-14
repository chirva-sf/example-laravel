@extends('layouts.default')

@section('title', 'Пример Laravel работы с формами')

@section('content')

    <form name="add-new-book" id="add-new-book" method="POST" action="{{ route('store-form') }}" class="p-4 mb-4 border rounded shadow-sm bg-light">
    @csrf
    @if (isset($book))
    @method('PUT')
    <input type="hidden" name="id" value="{{ $book->id }}">
    @endif
    <div class="form-section mb-3 required">
        <label for="title" class="form-label">Заголовок</label> 
        <input type="text" id="title" name="title" value="{{ old('title', $book->title ?? '') }}" class="form-control @error('title') is-invalid @enderror" required>
        
    </div>
    <div class="form-section mb-3 required"> 
        <label for="author" class="form-label">Автор</label>
        <input type="text" id="author" name="author" value="{{ old('author', $book->author ?? '') }}" class="form-control @error('author') is-invalid @enderror" required>
    </div>
    <div class="form-section mb-3">
        <label for="genre" class="form-label">Жанры:</label>
        <x-genre-checkbox :checked="$bookGenres ?? []" />
    </div>
    <div class="row mb-3">
        <div class="form-section col-md-6 required">
            <label for="publication" class="form-label">Год издания</label>
            <input type="number" id="publication" name="publication" value="{{ old('publication', $book->publication ?? '') }}" min="1800" max="2024" class="form-control @error('publication') is-invalid @enderror" required>
        </div>
        <div class="form-section col-md-6 required">
            <label for="pages" class="form-label">Объем (стр.)</label>
            <input type="number" id="pages" name="pages" value="{{ old('pages', $book->pages ?? '') }}" min="1" max="100000" class="form-control @error('pages') is-invalid @enderror" required>
        </div>
    </div>    
    <div class="form-section mb-3 required"> 
        <label for="price" class="form-label">Цена (руб.)</label>
        <input type="number" id="price" name="price" value="{{ old('price', $book->price ?? '') }}" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" required>
    </div>
    @include('layouts.errors')
    @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{ route('index') }}" class="btn btn-success">Новая книга</a>
    </form>

    @include('books')

@endsection
