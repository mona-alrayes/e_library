<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;

class AuthorController extends Controller
{
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        return response()->json([
            'message' => 'Author added successfully',
            'data' => $author
        ], 201);
    }

    public function search()
    {
        $query = request('name');

        $authors = Author::with('books')
            ->where('FName', 'like', "%{$query}%")
            ->orWhere('LName', 'like', "%{$query}%")
            ->get();

        if ($authors->isEmpty()) {
            return response()->json([
                'message' => 'No authors found matching the query.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Search results',
            'data' => $authors
        ], 200);
    }


    public function showBooks($id)
    {
        $author = Author::with('books')->find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'message' => 'Books by author retrieved successfully',
            'data' => $author
        ], 200);
    }
}
