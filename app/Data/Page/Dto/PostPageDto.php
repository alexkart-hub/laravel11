<?php

namespace App\Data\Page\Dto;

use App\Data\Page\PageType;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class PostPageDto extends PageDto
{
    public BlogPost $post;
    public BlogCategory $category;
    public string $categoryChain;

    public static function createFromArray(array $data): static
    {
        $dto = parent::createFromArray($data);
        $dto->pageType = PageType::POST;
        return $dto;
    }
}
