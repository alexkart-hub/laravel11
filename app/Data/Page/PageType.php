<?php

namespace App\Data\Page;

enum PageType: string
{
    case MAIN = 'Главная';
    case CATEGORIES = 'Список разделов';
    case CATEGORY = 'Категория';
    case POST = 'Пост';

    public function view(): string
    {
        return match ($this) {
            self::MAIN       => 'main',
            self::CATEGORIES => 'categories',
            self::CATEGORY   => 'category',
            self::POST       => 'post'
        };
    }

    public function route(): string
    {
        return match ($this) {
            self::MAIN       => 'main',
            self::CATEGORIES => 'blog.categories.index',
            self::CATEGORY   => 'blog.categories.show',
            self::POST       => 'blog.post'
        };
    }
}
