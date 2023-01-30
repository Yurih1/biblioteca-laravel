<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Book;
use App\Models\Libraryuser;
use App\Models\User_book;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $books = Book::query()->orderBy('genre')->get();

        return view('books.create')->with('books', $books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $bookName = $request->nome;
        $author = $request->autor;
        $genre =  $request->genero;

        $book = new Book();

        $book->id = Str::uuid();
        $book->name = $bookName;
        $book->author = $author;
        $book->genre = $genre;
        $book->situation = "DISPONÍVEL";

        $book->save();

        return redirect('/books/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $book = Book::find($id);
        $users = Libraryuser::query()->orderBy('name')->get();

        $url =  $request->url();

        if (strpos($url, '/books/edit/') !== false)
        {
            return view('books.show-edit')->with('book', $book);
        }

        else
        {   
            $dateNow = date("Y-m-d");
            return view('books.show')
                ->with('book', $book)
                ->with('users', $users)
                ->with('date', $dateNow);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $book = Book::find($id);
        
        $bookName = $request->nome;
        $author = $request->autor;
        $genre =  $request->genero;

        $book->name = $bookName;
        $book->author = $author;
        $book->genre = $genre;

        $book->save();

        return redirect('/books/create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // 1- save new book status

        $book = Book::find($id);
        
        $bookSituation = $request->situacao;
        $devolutionDate = $request->datemin;

        $book->situation = $bookSituation;
    
        $book->save();

        // 2- relates reserved book with user

        $userBook = new User_book();

        $userId = $request->usuarios;

        $userBook->id = Str::uuid();
        $userBook->user_id = $userId;
        $userBook->book_id = $id;

        $userBook->save();

        // 3 - add info in user

        $user = Libraryuser::find($userId);

        $user->devolution_date = $devolutionDate;

        $user->save();

        return redirect('/books/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect('/books/create');
    }
}
