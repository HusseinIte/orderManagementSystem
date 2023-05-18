<?php

namespace Database\Seeders;

use App\Models\Category\CategoryAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryAttribute::create([
            'category_id'=>1,
            'name'=>'الماركة'
        ]);
        CategoryAttribute::create([
            'category_id'=>1,
            'name'=>'القياس'
        ]);
        CategoryAttribute::create([
            'category_id'=>1,
            'name'=>'اللون'
        ]);
        CategoryAttribute::create([
            'category_id'=>1,
            'name'=>'الجنس'
        ]);

    }
}
