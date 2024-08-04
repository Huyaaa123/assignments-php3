<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tags")->insert([
            ['tag_name'=>'Chính Trị'],
            ['tag_name'=>'Thể Thao'],
            ['tag_name'=>'Thời Sụ']
        ]);


    }
}
