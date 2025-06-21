<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = [
            [
                'PName' => 'دار الشروق',
                'Country' => 'مصر',
            ],
            [
                'PName' => 'الدار العربية للعلوم',
                'Country' => 'الإمارات',
            ],
            [
                'PName' => 'مكتبة لبنان',
                'Country' => 'لبنان',
            ],
            [
                'PName' => 'دار الفكر',
                'Country' => 'السعودية',
            ],
            [
                'PName' => 'دار النهضة',
                'Country' => 'الأردن',
            ],
        ];

        foreach ($publishers as $publisher) {
            Publisher::create($publisher);
        }
    }
}
