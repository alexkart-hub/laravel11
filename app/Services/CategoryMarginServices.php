<?php

namespace App\Services;

use App\Models\BlogCategory;

class CategoryMarginServices
{
    private array $margin = [];

    public function calculate(): void
    {
        $margin = 1;
        $topCategoryId = 1;
        foreach ($this->getCategoriesByLevel([0, 1]) as $category) {
            if ($category['level'] === 0) {
                $topCategoryId = $category['id'];
            }
            if (($category['level'] < 2)) {
                $this->margin[$category['id']]['margin_left'] = $margin++;
            }
            if ($category['level'] === 1) {
                $this->setMargin(2, $category['id'], $margin);
                $this->margin[$category['id']]['margin_right'] = $margin++;
            }
        }
        $this->margin[$topCategoryId]['margin_right'] = $margin;
        $this->update();
    }

    private function setMargin(int $level, ?int $parent_id, int &$margin): void
    {
        $result = [];
        foreach ($this->getCategoriesByLevel([$level]) as $category) {
            if ($category['level'] === $level && $category['parent_id'] === $parent_id) {
                $result[$category['id']] = $category;
            }
        }
        if (count($result) > 0) {
            foreach ($result as &$item) {
                $this->margin[$item['id']]['margin_left'] = $margin++;

                $this->setMargin($level + 1, $item['id'], $margin);

                $this->margin[$item['id']]['margin_right'] = $margin++;
            }
        }
        unset($result);
    }

    private function getCategoriesByLevel(array $level = [1])
    {
        return BlogCategory::whereIn('level', $level)
            ->get()
            ->sortBy('level');
    }

    private function update(): void
    {
        $categories = BlogCategory::all();
        foreach ($categories as $category) {
            $category->update([
                'margin_left' => $this->margin[$category->id]['margin_left'],
                'margin_right' => $this->margin[$category->id]['margin_right'],
            ]);
        }
    }
}
