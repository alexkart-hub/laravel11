<?php

namespace App\Http\Controllers\Blog;

use App\Data\Page\PostPage;

class PostController extends BaseController
{
    public function index(string $category, string $post)
    {
        dump($category);
        $page = (new PostPage())
            ->setCategoryCode($category)
            ->setPostCode($post);
        return $this->returnView($page);
    }
}
