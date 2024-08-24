<?php

namespace App\Data\Page\Dto;

use App\Data\Page\PageType;
use Illuminate\Database\Eloquent\Collection;

class MainPageDto extends PageDto
{
    public static function createFromArray(array $data): static
    {
        $dto = parent::createFromArray($data);
        $dto->pageType = PageType::MAIN;
        return $dto;
    }
}
