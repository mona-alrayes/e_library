<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'FName' => 'أحمد',
                'LName' => 'الراشدي',
                'Country' => 'مصر',
                'City' => 'القاهرة',
                'Address' => 'شارع التحرير',
            ],
            [
                'FName' => 'ليلى',
                'LName' => 'محمد',
                'Country' => 'المغرب',
                'City' => 'الرباط',
                'Address' => 'شارع النصر',
            ],
            [
                'FName' => 'سامي',
                'LName' => 'العلي',
                'Country' => 'السعودية',
                'City' => 'الرياض',
                'Address' => 'شارع الملك فهد',
            ],
            [
                'FName' => 'منى',
                'LName' => 'الفيصل',
                'Country' => 'الإمارات',
                'City' => 'دبي',
                'Address' => 'شارع الشيخ زايد',
            ],
            [
                'FName' => 'خالد',
                'LName' => 'النجار',
                'Country' => 'الأردن',
                'City' => 'عمان',
                'Address' => 'شارع الملكة رانيا',
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
