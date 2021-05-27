<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

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
        // TO DO
        return 'Hello World';
    }

    /**
     * Create book
     * 
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TO DO
    }

    /**
     * Get one book
     * 
     * @return Illuminate\Http\Response
     */
    public function show($authorId)
    {
        // TO DO
    }

    /**
     * Update book
     * 
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $authorId)
    {
        // TO DO
    }

    /**
     * Delete book
     * 
     * @return Illuminate\Http\Response
     */
    public function destroy($authorId)
    {
        // TO DO
    }
}