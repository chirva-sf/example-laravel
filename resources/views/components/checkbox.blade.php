@php
    $middle = ceil($genres->count() / 2);
    $leftGenres = $genres->take($middle);
    $righGenres = $genres->slice($middle);
@endphp
<div class="row mb-3">
    <div class="col-md-6">
        @foreach ($leftGenres as $genre)
        <div class="form-check">
            <input type="checkbox" name="genre[]" id="genre-{{ $genre->name_eng }}" value="{{ $genre->name_eng }}" class="form-check-input" {{ in_array($genre->id, $checked) || (old('genre') ? in_array($genre->name_eng, old('genre')) : 0) ? 'checked' : '' }}>
            <label class="form-check-label" for="genre-{{ $genre->name_eng }}">{{ $genre->name_rus }}</label>
        </div>
        @endforeach
    </div>
    <div class="col-md-6">
        @foreach ($righGenres as $genre)
        <div class="form-check">
            <input type="checkbox" name="genre[]" id="genre-{{ $genre->name_eng }}" value="{{ $genre->name_eng }}" class="form-check-input" {{ in_array($genre->id, $checked) || (old('genre') ? in_array($genre->name_eng, old('genre')) : 0) ? 'checked' : '' }}>
            <label class="form-check-label" for="genre-{{ $genre->name_eng }}">{{ $genre->name_rus }}</label>
        </div>
        @endforeach
    </div>
</div>    
