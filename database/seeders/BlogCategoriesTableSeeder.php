<?php

namespace Database\Seeders;

use DateTimeInterface;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];

        $name      = 'Без категории';
        $createdAt = date_create('-3 month');

        $categories[] = [
            'title'      => $name,
            'slug'       => Str::slug($name),
            'parent_id'  => null,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];

        for ($i = 1; $i <= 10; $i++) {
            $name     = sprintf('Категория %d', $i);
            $parentId = $i > 4 ? rand(1, 4) : 1;

            $categories[] = [
                'title'      => $name,
                'slug'       => Str::slug($name),
                'parent_id'  => $parentId,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
