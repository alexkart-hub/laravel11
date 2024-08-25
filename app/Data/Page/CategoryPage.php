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
        $categories = BlogCategory::where(['level' => 1])->get();
        return ['categories' => $categories ?? []];
    }

    private function getCurrentCategory(string $categoryCode): array
    {
        $arCode = explode('/', $categoryCode);
        $slug = array_pop($arCode);
        $parentCategory = !empty($arCode) ? implode('/', $arCode) : '';
        $category = BlogCategory::where('slug', $slug)->first();
        if (is_null($category)) {
            abort(404);
        }
        $categories = BlogCategory::where(['parent_id' => $category->id])->get();
        $posts = $category->posts;
        return [
            'category'      => $categoryCode,
            'posts'         => $posts,
            'categories'    => $categories,
            'parentCategory'=> $parentCategory,
        ];
    }
}
