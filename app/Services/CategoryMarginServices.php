<?php

namespace App\Services;

use App\Models\BlogCategory;

class CategoryMarginServices
{
    private array $margin = [];

    public function calculate()
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

    private function update()
    {
        $categories = BlogCategory::all();
        foreach ($categories as $category) {
            $category->update([
                'margin_left' => $this->margin[$category->id]['margin_left'],
                'margin_right' => $this->margin[$category->id]['margin_right'],
            ]);
        }
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

    private function getCategories(): array
    {
        return [
            ['id' => 1, 'parent_id' => null, 'level' => 0, 'margin_left' => 0, 'margin_right' => 0],
                ['id' => 2, 'parent_id' => 1, 'level' => 1, 'margin_left' => 0, 'margin_right' => 0],
                    ['id' => 3, 'parent_id' => 2, 'level' => 2, 'margin_left' => 0, 'margin_right' => 0],
                        ['id' => 4, 'parent_id' => 3, 'level' => 3, 'margin_left' => 0, 'margin_right' => 0],
                        ['id' => 5, 'parent_id' => 3, 'level' => 3, 'margin_left' => 0, 'margin_right' => 0],
                    ['id' => 6, 'parent_id' => 2, 'level' => 2, 'margin_left' => 0, 'margin_right' => 0],
                        ['id' => 7, 'parent_id' => 6, 'level' => 3, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 8, 'parent_id' => 7, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 9, 'parent_id' => 7, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                        ['id' => 10, 'parent_id' => 6, 'level' => 3, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 11, 'parent_id' => 10, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 12, 'parent_id' => 10, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 13, 'parent_id' => 10, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                    ['id' => 14, 'parent_id' => 2, 'level' => 2, 'margin_left' => 0, 'margin_right' => 0],
                ['id' => 15, 'parent_id' => 1, 'level' => 1, 'margin_left' => 0, 'margin_right' => 0],
                    ['id' => 16, 'parent_id' => 15, 'level' => 2, 'margin_left' => 0, 'margin_right' => 0],
                        ['id' => 17, 'parent_id' => 16, 'level' => 3, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 18, 'parent_id' => 17, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 19, 'parent_id' => 17, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 20, 'parent_id' => 17, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                        ['id' => 21, 'parent_id' => 16, 'level' => 3, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 22, 'parent_id' => 21, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                            ['id' => 23, 'parent_id' => 21, 'level' => 4, 'margin_left' => 0, 'margin_right' => 0],
                    ['id' => 24, 'parent_id' => 15, 'level' => 2, 'margin_left' => 0, 'margin_right' => 0],
                        ['id' => 25, 'parent_id' => 24, 'level' => 3, 'margin_left' => 0, 'margin_right' => 0],
                        ['id' => 26, 'parent_id' => 24, 'level' => 3, 'margin_left' => 0, 'margin_right' => 0],
                    ['id' => 27, 'parent_id' => 15, 'level' => 2, 'margin_left' => 0, 'margin_right' => 0],
                    ['id' => 28, 'parent_id' => 15, 'level' => 2, 'margin_left' => 0, 'margin_right' => 0],
                ['id' => 29, 'parent_id' => 1, 'level' => 1, 'margin_left' => 0, 'margin_right' => 0],
        ];
    }

    private function getCategoriesByLevel(array $level = [1])
    {
        return BlogCategory::whereIn('level', $level)
            ->get()
            ->sortBy('level');
    }
}
