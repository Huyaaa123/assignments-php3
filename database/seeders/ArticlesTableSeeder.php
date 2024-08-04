<?php

namespace Database\Seeders;
use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return array<string, mixed>
     */
    public function run(): void
    {
        DB::table("articles")->insert([
            ['category_name'=>'Chính Trị'],
            ['category_name'=>'Thể Thao'],
            ['category_name'=>'Thời Sụ']
        ]);

    }
}
