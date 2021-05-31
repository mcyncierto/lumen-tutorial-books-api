<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;
    /**
     * Get all books
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return $this->successResponse($books);
    }

    /**
     * Create book
     * 
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:225',
            'description' => 'required|max:225',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1',
        ];
        $this->validate($request, $rules);
        $book = Book::create($request->all());

        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    /**
     * Get one book
     * 
     * @return Illuminate\Http\Response
     */
    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);

        return $this->successResponse($book);
    }

    /**
     * Update book
     * 
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $bookId)
    {
        // (1) Rules
        $rules = [
            'title' => 'max:225',
            'description' => 'max:225',
            'price' => 'min:1',
            'author_id' => 'min:1',
        ];
        // (2) validate
        $this->validate($request, $rules);
        // (3) Find or fail
        $book = Book::findOrFail($bookId);
        // (4) Fill
        $book->fill($request->all());
        // (5) Check if isClean
        if ($book->isClean()) {
            return $this->errorResponse('At least one value must change.', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        // (6) save
        $book->save();

        // (7) response
        return $this->successResponse($book);
        
    }

    /**
     * Delete book
     * 
     * @return Illuminate\Http\Response
     */
    public function destroy($bookId)
    {
        // (1) Find or fail
        $book = Book::findOrFail($bookId);
        // (2) delete
        $book->delete();

        // (3) Response
        return $this->successResponse($book);
    }
}