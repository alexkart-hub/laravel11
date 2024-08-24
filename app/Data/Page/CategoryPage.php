<?php

namespace App\Data\Page;

use App\Data\Page\Dto\CategoriesPageDto;
use App\Data\Page\Dto\CategoryPageDto;
use App\Data\Page\Dto\PageDto;
use App\Models\BlogCategory;

class CategoryPage extends Page
{
    protected string $categoryCode = '';

    public function setCategoryCode(string $categoryCode): static
    {
        $this->categoryCode = $categoryCode;
        return $this;
    }

    public function getData(): PageDto
    {
        if ($this->type === PageType::CATEGORIES) {
            return CategoriesPageDto::createFromArray($this->getAllCategories());
        }
        return CategoryPageDto::createFromArray($this->getCurrentCategory($this->categoryCode));
    }

    private function getAllCategories(): array
    {
        $categories = BlogCategory::all();
        return ['categories' => $categories ?? []];
    }

    private function getCurrentCategory(string $categoryCode): array
    {
        $category = BlogCategory::where('slug', $categoryCode)->first();
        if (is_null($category)) {
            abort(404);
        }
        $posts = $category->posts;
        return ['category' => $categoryCode, 'posts' => $posts];
    }
}
