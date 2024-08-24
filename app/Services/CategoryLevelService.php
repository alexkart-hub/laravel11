<?php

namespace App\Services;

use App\Models\BlogCategory;

class CategoryLevelService
{
    public function fill(): void
    {
        $categories = BlogCategory::all([
            'id',
            'parent_id',
            'level'
        ])->sortBy('parent_id');

        $levels = [];
        foreach ($categories as $category) {
            $level =
            $levels[$category->id] =
                $category->parent_id
                    ? $levels[$category->parent_id] + 1
                    : 0;
            $category->update(['level' => $level]);
        }
    }
}
