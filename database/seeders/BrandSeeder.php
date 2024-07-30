<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Brand::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'TOYOTA', 'FORD', 'HONDA', 'NISSAN', 'BMW', 
            'SUZUKI', 'HYUNDAI', 'MAZDA', 'MERCEDES', 'MITSUBISHI'
        ];

        foreach ($data as $value) {
            Brand::insert([
                'name' => $value
            ]);
        }
    }
}
