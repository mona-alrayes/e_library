<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;

class PublisherController extends Controller
{


    public function index()
    {
        $paginator = Publisher::paginate(10);

        $paginator->getCollection()->transform(function ($publisher) {
            return [
                'id' => $publisher->id,
                'name' => $publisher->PName,
                'country' => $publisher->Country,
            ];
        });

        return self::paginated($paginator, null, 'Publishers retrieved successfully', 200);
    }


    public function store(StorePublisherRequest $request)
    {
        $publisher = Publisher::create($request->validated());

        return response()->json([
            'message' => 'Publisher added successfully',
            'data' => [
                'id' => $publisher->id,
                'name' => $publisher->PName,
                'country' => $publisher->Country,
            ]
        ], 201);
    }

    public function search()
    {
        $query = request('name');

        $publishers = Publisher::with('books')
            ->where('PName', 'ILIKE', "%{$query}%")
            ->get();

        return response()->json([
            'message' => 'Search results',
            'data' => $publishers->map(function ($publisher) {
                return [
                    'id' => $publisher->id,
                    'name' => $publisher->PName,
                    'country' => $publisher->Country,
                    'books' => $publisher->books->map(function ($book) {
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
        $publisher = Publisher::with('books')->find($id);

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'message' => 'Books by publisher retrieved successfully',
            'data' => [
                'id' => $publisher->id,
                'name' => $publisher->PName,
                'country' => $publisher->Country,
                'books' => $publisher->books->map(function ($book) {
                    return [
                        'id' => $book->id,
                        'title' => $book->Title,
                        'type' => $book->Type,
                        'price' => $book->Price,
                        'coverImage' => $book->CoverImage,
                    ];
                }),
            ],
        ]);
    }
}
