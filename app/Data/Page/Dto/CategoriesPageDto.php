<?php

namespace App\Data\Page\Dto;

use App\Data\Page\PageType;
use Illuminate\Database\Eloquent\Collection;

class CategoriesPageDto extends PageDto
{
    public Collection $categories;

    public static function createFromArray(array $data): static
    {
        $dto = parent::createFromArray($data);
        $dto->pageType = PageType::CATEGORIES;
        return $dto;
    }
}
