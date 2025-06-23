<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $covers = [
            'book1.jpg', 'book2.jpg', 'book3.jpg', 'book4.jpg', 'book5.jpg',
            'book6.jpg', 'book7.jpg', 'book8.jpg', 'book9.jpg', 'book10.jpg',
        ];

        $books = [
            ['Title' => 'The Da Vinci Code', 'Type' => 'Thriller', 'Price' => '25.00', 'author_id' => 1, 'publisher_id' => 1],
            ['Title' => 'Angels & Demons', 'Type' => 'Thriller', 'Price' => '22.00', 'author_id' => 1, 'publisher_id' => 1],
            ['Title' => 'Harry Potter 1', 'Type' => 'Fantasy', 'Price' => '30.00', 'author_id' => 2, 'publisher_id' => 2],
            ['Title' => 'Harry Potter 2', 'Type' => 'Fantasy', 'Price' => '30.00', 'author_id' => 2, 'publisher_id' => 2],
            ['Title' => '1984', 'Type' => 'Dystopian', 'Price' => '20.00', 'author_id' => 3, 'publisher_id' => 3],
            ['Title' => 'Animal Farm', 'Type' => 'Satire', 'Price' => '18.00', 'author_id' => 3, 'publisher_id' => 3],
            ['Title' => 'The Shining', 'Type' => 'Horror', 'Price' => '28.00', 'author_id' => 4, 'publisher_id' => 4],
            ['Title' => 'IT', 'Type' => 'Horror', 'Price' => '32.00', 'author_id' => 4, 'publisher_id' => 4],
            ['Title' => 'Murder on the Orient Express', 'Type' => 'Mystery', 'Price' => '26.00', 'author_id' => 5, 'publisher_id' => 5],
            ['Title' => 'And Then There Were None', 'Type' => 'Mystery', 'Price' => '24.00', 'author_id' => 5, 'publisher_id' => 5],
        ];

        foreach ($books as $index => $book) {
            $originalCover = $covers[$index];
            $extension = pathinfo($originalCover, PATHINFO_EXTENSION);
            $newFilename = 'book_covers/' . Str::uuid() . '.' . $extension;

            Storage::disk('public')->put($newFilename, Storage::disk('public')->get("book_covers/$originalCover"));

            Book::create(array_merge($book, [
                'cover_image' => $newFilename,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
