<?php

namespace App\Http\Requests;

use App\Rules\Trim;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // Правила валидации полей формы
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:255', Rule::unique('books', 'title')->ignore($this->input('id'))],
            'author' => ['required', 'string', 'min:1', 'max:100'],
            'publication' => 'required|integer|min:1800|max:2024',
            'pages' => 'required|integer|min:1|max:100000',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'title.string' => 'Поле "Заголовок" должно быть строкой.',
            'title.min' => 'Поле "Заголовок" не может быть пустым.',
            'title.max' => 'Поле "Заголовок" не может превышать 255 символов.',
            'title.unique' => 'Книга с таким названием уже существует.',
    
            'author.required' => 'Поле "Автор" обязательно для заполнения.',
            'author.string' => 'Поле "Автор" должно быть строкой.',
            'author.min' => 'Поле "Автор" не может быть пустым.',
            'author.max' => 'Имя автора не может превышать 100 символов.',
    
            'publication.required' => 'Поле "Год издания" обязательно для заполнения.',
            'publication.integer' => 'Поле "Год издания" должно быть целым числом.',
            'publication.min' => 'Год издания не может быть меньше 1800.',
            'publication.max' => 'Год издания не может быть больше 2024.',
    
            'pages.required' => 'Поле "Объем (стр.)" обязательно для заполнения.',
            'pages.integer' => 'Поле "Объем (стр.)" должно быть целым числом.',
            'pages.min' => 'Количество страниц должно быть не менее 1.',
            'pages.max' => 'Количество страниц не может превышать 100000.',
    
            'price.required' => 'Поле "Цена (руб.)" обязательно для заполнения.',
            'price.numeric' => 'Поле "Цена (руб.)" должно быть числом.',
            'price.min' => 'Цена не может быть отрицательной.',
            'price.regex' => 'Цена должна быть положительным целым числом или дробным с двумя знаками после запятой.'
        ];
    }
}
