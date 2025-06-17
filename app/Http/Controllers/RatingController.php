<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;

class RatingController extends Controller
{
    public function create(Request $request)
    {
        // Data semua penulis diurutkan secara descending berdasarkan nama
        $authors = Author::orderBy('name', 'asc')->get(); 
        $books = collect(); // Awalnya koleksi kosong

        if ($request->has('author_id')) {
            // Filter buku berdasarkan penulis yang dipilih
            $books = Book::where('author_id', $request->author_id)
                ->orderBy('title', 'asc') // Pastikan orderBy digunakan sebelum get
                ->get();
        }

        return view('ratings.create', compact('authors', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        Rating::create([
            'book_id' => $request->book_id,
            'rating' => $request->rating,
        ]);

        return redirect()->route('books.index')->with('success', 'Rating submitted successfully');
    }

    public function getBooks($author_id)
    {
        $books = Book::where('author_id', $author_id)->get();
        return response()->json($books);
    }

}
