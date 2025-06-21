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
            'data' => [
                'id' => $author->id,
                'fName' => $author->FName,
                'lName' => $author->LName,
                'country' => $author->Country,
                'city' => $author->City,
                'address' => $author->Address,
            ]
        ], 201);
    }

    public function search()
    {
        $query = request('name');

        $authors = Author::with('books')
            ->where('FName', 'ILIKE', "%{$query}%")
            ->orWhere('LName', 'ILIKE', "%{$query}%")
            ->get();

        return response()->json([
            'message' => 'Search results',
            'data' => $authors->map(function ($author) {
                return [
                    'id' => $author->id,
                    'fName' => $author->FName,
                    'lName' => $author->LName,
                    'country' => $author->Country,
                    'city' => $author->City,
                    'address' => $author->Address,
                    'books' => $author->books->map(function ($book) {
                        return [
                            'id' => $book->id,
                            'title' => $book->Title,
                            'type' => $book->Type,
                            'price' => $book->Price,
                            'coverImage' => $book->CoverImage,
                        ];
                    }),
                ];
            }),
        ]);
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
            'data' => [
                'id' => $author->id,
                'fName' => $author->FName,
                'lName' => $author->LName,
                'books' => $author->books->map(function ($book) {
                    return [
                        'id' => $book->id,
                        'title' => $book->Title,
                        'type' => $book->Type,
                        'price' => $book->Price,
                        'coverImage' => $book->CoverImage,
                    ];
                }),
            ]
        ]);
    }
}
