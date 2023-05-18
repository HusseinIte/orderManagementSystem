<?php

namespace Database\Seeders;

use App\Models\Category\CategoryAttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryAttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryAttributeValue::create([
            'category_attribute_id'=>4,
            'value'=>'ذكر'
        ]);
        CategoryAttributeValue::create([
            'category_attribute_id'=>4,
            'value'=>'أنثى'
        ]);
        CategoryAttributeValue::create([
            'category_attribute_id'=>3,
            'value'=>'أسود'
        ]);
        CategoryAttributeValue::create([
            'category_attribute_id'=>3,
            'value'=>'أحمر'
        ]);
    }
}
