<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    // Affiche la liste des livres (partie admin)
    public function index()
    {
        $books = Book::with(['author', 'category'])->paginate(10);
        return view('admin.books.index', ['books' => $books]);
    }

    // Affiche la liste des livres (partie adhérent/public)
    public function catalog()
    {
        $books = Book::with(['author', 'category'])->paginate(12);
        return view('catalog.index', ['books' => $books]);
    }
}