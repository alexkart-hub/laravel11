<?php

namespace App\Data\Page\Dto;

use App\Data\Page\PageType;
use Illuminate\Database\Eloquent\Collection;

class CategoryPageDto extends PageDto
{
    public string $category = '';
    public Collection $posts;
    public Collection $categories;
    public string $parentCategory = '';

    public static function createFromArray(array $data): static
    {
        $dto = parent::createFromArray($data);
        $dto->pageType = PageType::CATEGORY;
        return $dto;
    }
}
