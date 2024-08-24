<?php

namespace App\Http\Controllers\Blog;

use App\Data\Page\MainPage;

class Main extends BaseController
{
    public function index()
    {
        return $this->returnView(new MainPage());
    }
}
