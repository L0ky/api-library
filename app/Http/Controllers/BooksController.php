<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    public function index()
    {
        return Book::all();
    }

    public function create(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();
        return $book;
    }

    public function getAvailableBooks()
    {
        return Book::where('is_available', true)->get();
    }

    public function borrowBook(Request $request, int $id)
    {
        $userId = (int)$request->user_id;;
        $user = User::findOrFail($userId);

        if ($user->borrow_count >= 3) {
            return response()->json([
                'message' => 'You have reached the maximum borrow limit',
            ], 400);
        }

        $user->borrow_count++;
        $user->save();

        $book = Book::find($id);
        $book->is_available = false;
        $book->borrower_id = $user->id;
        $book->save();
        return $book;
    }

    public function returnBook(Request $request, int $id)
    {
        $userId = (int)$request->user_id;
        $user = User::findOrFail($userId);

        if ($user->borrow_count <= 0) {
            return response()->json([
                'message' => 'You have no books to return',
            ], 400);
        }
        $user->borrow_count--;
        $user->save();

        $book = Book::find($id);
        $book->is_available = true;
        $book->borrower_id = null;
        $book->save();
        return $book;
    }
}
