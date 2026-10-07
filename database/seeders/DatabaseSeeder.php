<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Chạy Seeder tỉnh/thành trước
        // vì Place cần province_id tồn tại
        $this->call([
            ProvinceSeeder::class,
            PlaceSeeder::class,
        ]);
    }
}