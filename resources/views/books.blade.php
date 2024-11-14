<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Автор</th>
            <th scope="col">Год</th>
            <th scope="col">Цена</th>
            <th scope="col">Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <th scope="row" class="text-center">{{ $book->id }}</th>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->publication }}</td>
            <td nowrap>{{ number_format($book->price, 2, '.', ' ') }} ₽</td>
            <td class="actions">
                <a href="{{ route('index', $book->id) }}" data-toggle="tooltip" title="Редактировать" class="btn btn-primary edit-user"><i class="fa fa-pencil"></i></a>
                {{-- Удаление через http-метод DELETE --}}
                <form action="{{ route('delete', $book->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить книгу?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-toggle="tooltip" title="Удалить" class="btn btn-danger delete-user"><i class="fa fa-trash-o"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
