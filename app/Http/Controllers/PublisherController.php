<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;

class PublisherController extends Controller
{
    public function store(StorePublisherRequest $request)
    {
        $publisher = Publisher::create($request->validated());

        return response()->json([
            'message' => 'Publisher added successfully',
            'data' => $publisher
        ], 201);
    }

    public function search()
    {
        $query = request('name');

        $publishers = Publisher::with('books')
            ->where('PName', 'like', "%{$query}%")
            ->get();

        if ($publishers->isEmpty()) {
            return response()->json([
                'message' => 'No publishers found matching the query.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Search results',
            'data' => $publishers
        ], 200);
    }


    public function showBooks($id)
    {
        $publisher = Publisher::with('books')->find($id);

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'message' => 'Books by publisher retrieved successfully',
            'data' => $publisher
        ], 200);
    }
}
