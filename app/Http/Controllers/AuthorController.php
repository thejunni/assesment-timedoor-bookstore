<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;


class AuthorController extends Controller
{
    public function top()
    {
        $authors = Author::withCount(['books as voters' => function ($query) {
            $query->join('ratings', 'books.id', '=', 'ratings.book_id')
                  ->where('ratings.rating', '>', 5) // Only consider ratings greater than 5
                  ->select(\DB::raw('count(distinct ratings.id)')); // Count unique ratings
        }])
        ->orderBy('voters', 'desc') // Order by calculated voters
        ->limit(10)
        ->get();

        return view('authors.top', compact('authors'));
    }
}
