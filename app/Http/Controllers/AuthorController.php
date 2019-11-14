<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{

    public function index()
    {

        $authors = Author::with('books')->get();
        $data = [
            'authors' => $authors
        ];
        return view('authors.index', $data);
    }


    public function create()
    {
        return view('authors.create');
    }


    public function store(Request $request)
    {
        // server validation form from create
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|numeric|between:18,100',
            'address' => 'required|max:255',
            'title'=> 'required|max:255',
            'release'=> 'required|numeric|between:1900,2019'
        ]);

        $data = $request -> all();
        $new_author = new Author();
        $new_author->fill($data);

        $new_book = new Book();
        $new_book->name = $data['title'];
        $new_book->release_date = $data['release'];

        $new_author->sync($new_book);
        $new_author->save();

        return redirect()->route('authors.index');

    }


    public function show($id)

    {
      $authors = Author::find($id);
      $data = [
        'authors' => $authors
      ];
      return view('authors.show', $data);
    }


    public function edit(Author $author)
    {
        //
    }


    public function update(Request $request, Author $author)
    {
        //
    }


    public function destroy(Author $author)
    {
        //
    }
}
