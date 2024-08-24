<?php

namespace App\Data\Page;

use App\Data\Page\Dto\PageDto;
use Illuminate\Support\Facades\Route;

abstract class Page
{
    protected PageType $type;

    public function __construct()
    {
        $this->initType();
    }

    abstract public function getData(): PageDto;

    public function getType(): PageType
    {
        return $this->type;
    }

    protected function initType(): void
    {
        $this->type = match (Route::currentRouteName()) {
            'main'                  => PageType::MAIN,
            'blog.categories.index' => PageType::CATEGORIES,
            'blog.categories.show'  => PageType::CATEGORY,
            'blog.post'             => PageType::POST
        };
    }
}
