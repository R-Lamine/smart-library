<?php

namespace App\Http\Controllers;

use App\Models\Book;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

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


    // Formulaire création
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();

        return view('admin.books.create', compact('authors', 'categories'));
    }

    // Enregistrer le livre
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'isbn' => 'required|string|unique:books',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'summary_ai' => 'nullable|string',
        ]);

        \App\Models\Book::create($validated);

        return redirect()->route('admin.books.index')
            ->with('success', 'Livre ajouté avec succès');
    }

}