<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    public function run(): void
    {
        Publisher::insert([
            ['PName' => 'Penguin Random House', 'Country' => 'USA'],
            ['PName' => 'Bloomsbury Publishing', 'Country' => 'UK'],
            ['PName' => 'HarperCollins', 'Country' => 'USA'],
            ['PName' => 'Macmillan Publishers', 'Country' => 'UK'],
            ['PName' => 'Scholastic Press', 'Country' => 'USA'],
        ]);
    }
}
