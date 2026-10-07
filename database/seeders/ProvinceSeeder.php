<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use Illuminate\Support\Str;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            [
                'name' => 'Tây Ninh',
                'description' => 'Tỉnh nổi tiếng với Núi Bà Đen, Tòa Thánh Cao Đài và nhiều điểm du lịch tâm linh.'
            ],
            [
                'name' => 'Hà Nội',
                'description' => 'Thủ đô Việt Nam, nổi bật với các công trình lịch sử, văn hóa và khu phố cổ.'
            ],
            [
                'name' => 'TP. Hồ Chí Minh',
                'description' => 'Thành phố lớn và năng động với nhiều công trình lịch sử, văn hóa và điểm vui chơi.'
            ],
        ];

        foreach ($provinces as $province) {
            Province::updateOrCreate(
                ['name' => $province['name']],
                [
                    'slug' => Str::slug($province['name']),
                    'description' => $province['description'],
                ]
            );
        }
    }
}
