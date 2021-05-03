<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categoryList = [
            'Apple', 'Xiaomi', 'Samsung', 'LG', 'Huawei', 'Oppo', 'Motorola', 'Mobicel', 'Nokia', 'HTC','Google'
        ];
        // Administrator Roles
        foreach($categoryList as $category => $name) {
            Category::create([
                'name' => $name,
                'status' => Arr::random([0,1]),
            ]);
        }
    }
}
