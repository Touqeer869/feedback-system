<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(4)
            ->sequence(
                ['name'=>'Bug Report'],
                ['name'=>'Feature Request'],
                ['name'=>'Improvement'],
                ['name'=>'Bug Fixed']
            )
            ->create();
    }
}
