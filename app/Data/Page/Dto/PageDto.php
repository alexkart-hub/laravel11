<?php

namespace App\Data\Page\Dto;

use App\Data\Page\PageType;

abstract class PageDto
{
    public PageType $pageType;

    public static function createFromArray(array $data): static
    {
        $dto = new static();
        foreach ($data as $key => $value) {
            if (property_exists($dto, $key)) {
                $dto->$key = $value;
            }
        }
        return $dto;
    }
}
