<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::get();
        return view('index', compact('books'));
    }


    public function create()
    {
        //
    }


    public function store(BookRequest $request)
    {
        $book = new Book($request->all());
        $book->save();
        if(!$request->ajax()){
            return back()->with('success', 'book created');
        }
        return response()->json(['status'=> 'book created', 'book' => $book], 201);
    }


    public function show(Request $request, Book $book)
    {
        if(!$request->ajax()){
            return view();
        }
        return response()->json(['book' => $book], 200);
    }


    public function edit($id)
    {
        //
    }

    public function update(BookRequest $request, Book $book)
    {
        $book -> update($request->all());
        if(!$request->ajax()){
            return back()->with('success', 'User update');
        }
        return response()->json([], 204);
    }


    public function destroy(Request $request, Book $book)
    {
        $book -> delete();
        if(!$request->ajax()){
            return back()->with('succes', 'User delete');
        }
        return response()->json([], 204);
    }
}
