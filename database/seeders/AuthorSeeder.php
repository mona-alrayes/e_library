<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::insert([
            ['FName' => 'Dan', 'LName' => 'Brown', 'Country' => 'USA', 'City' => 'Exeter', 'Address' => '123 Harvard Ave'],
            ['FName' => 'J.K.', 'LName' => 'Rowling', 'Country' => 'UK', 'City' => 'Edinburgh', 'Address' => '7 Private Drive'],
            ['FName' => 'George', 'LName' => 'Orwell', 'Country' => 'UK', 'City' => 'Motihari', 'Address' => '44 Main Street'],
            ['FName' => 'Stephen', 'LName' => 'King', 'Country' => 'USA', 'City' => 'Portland', 'Address' => '1313 Elm St'],
            ['FName' => 'Agatha', 'LName' => 'Christie', 'Country' => 'UK', 'City' => 'Torquay', 'Address' => '22 Murder St'],
        ]);
    }
}
