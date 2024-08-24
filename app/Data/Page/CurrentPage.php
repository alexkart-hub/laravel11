<?php

namespace App\Data\Page;

use App\Data\Page\Dto\MainPageDto;
use App\Data\Page\Dto\PageDto;

class CurrentPage extends Page
{
    public function getData(): PageDto
    {
        return MainPageDto::createFromArray([]);
    }
}
