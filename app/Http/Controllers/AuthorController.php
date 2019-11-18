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
        // send data author cards to index view
        $authors = Author::with('books')->paginate(5);
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
        // create new author
        $data = $request -> all();
        $new_author = new Author();
        $new_author->fill($data);

        $new_author->save();

        // create new book
        $new_book = new Book();
        $new_book->name = $data['title'];
        $new_book->release_date = $data['release'];
        // relation between autor_id and author.id
        $new_book->author_id = $new_author->id;

        $new_book->save();

        return redirect()->route('authors.index');

    }


    public function show($id)

    {
        // select author with unique id to show his books
       $author_book = Author::with('books')->get()->find($id);
    
       $data = [
           'author_book' => $author_book
       ];

       return view ('authors.show', $data);
    }


    public function edit(Author $author)
    {
        //
    }


    public function update(Request $request, Author $author)
    {
        //
    }


    public function destroy($id)
    {
        // delete books with foreign key
        $delete_book = Book::with('authors')->where('author_id','=',$id)->delete();
        // delete author selected
        $delete_autor = Author::find($id)->delete();
        
        return redirect()->route('authors.index');
    }
}
