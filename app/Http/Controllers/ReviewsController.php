<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $review = new reviews($validatedData);
        $review->book()->associate($book);
        $review->user()->associate(auth()->user());
        $review->save();
        return redirect()->back()->with('success', 'Đã tạo đánh giá thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('books.showrating', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
