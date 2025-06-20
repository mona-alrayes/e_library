<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Get paginated books with relationships, e.g. 10 per page
        $paginator = Book::with(['author', 'publisher'])->paginate(10);

        // Append 'cover_image_url' to each book in the collection
        $paginator->getCollection()->transform(function ($book) {
            return $book->append('cover_image_url');
        });

        // Use your base Controller's paginated response helper
        return self::paginated($paginator, null, 'Books retrieved successfully', 200);
    }


    public function show($id)
    {
        $book = Book::with(['author', 'publisher'])->findOrFail($id);
        $book->append('cover_image_url');

        return response()->json([
            'message' => 'Book retrieved successfully',
            'data' => $book
        ], 200);
    }

    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('book_covers', $filename, 'public');
            $data['cover_image'] = $path;
        }

        $book = Book::create($data);
        $book->append('cover_image_url');

        return response()->json([
            'message' => 'Book added successfully',
            'data' => $book
        ], 201);
    }


    public function search()
    {
        $query = request('title');

        $books = Book::with(['author', 'publisher'])
            ->where('Title', 'like', "%{$query}%")
            ->get()
            ->append('cover_image_url');

        return response()->json([
            'message' => 'Search results',
            'data' => $books
        ], 200);
    }
}
