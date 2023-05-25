<?php

namespace Database\Seeders;

use App\Models\Order\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'departmentName' => 'المستودع'
        ]);

        Department::create([
            'departmentName' => 'التوصيل'
        ]);

        Department::create([
            'departmentName' => 'الصيانة'
        ]);
    }
}
