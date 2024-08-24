<?php

namespace App\Http\Controllers\Blog;

use App\Data\Page\MainPage;
use App\Data\Page\Page;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

abstract class BaseController extends Controller
{
    protected string $routeName;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->routeName = Route::currentRouteName();
    }

    protected function returnView(Page $page): View | Application | Factory | ContractsApplication
    {
        return view($page->getType()->view(), $this->getData($page));
    }

    protected function getData(Page $page): array
    {
        return ['data' => $page->getData()];
    }
}
