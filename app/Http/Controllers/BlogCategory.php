<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

class BlogCategory extends Controller
{
    public function categories(): View|Application|Factory|ContractsApplication
    {
        return view('categories');
    }

    public function category(string $category): View|Application|Factory|ContractsApplication
    {
        return view('category', ['category' => $category, 'request' => $this->request]);
    }
}
