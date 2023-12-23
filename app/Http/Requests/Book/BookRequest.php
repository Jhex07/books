<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'title' => ['required', 'string'],
            'stock' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'numeric'],
            'author_id' => ['required', 'numeric'],
        ];

        if ($this->method() == 'POST'){
            array_push($rules['title'], 'unique:books,title');
            array_push($rules['stock'], 'required');
            array_push($rules['description'], 'required');
            array_push($rules['category_id'], 'required');
            array_push($rules['author_id'], 'required');
        }else {
            array_push($rules['title'], 'unique:books,title,' .$this->book->id);
            array_push($rules['stock'], 'required');
            array_push($rules['description'], 'required');
            array_push($rules['category_id'], 'required');
            array_push($rules['author_id'], 'required');
        }

        return $rules;
    }
}
