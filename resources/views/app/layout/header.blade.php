<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    @vite('resources/css/app.css')
</head>
<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 logo">
                <a  @if(!isActive('main')) href="/" @endif>
                    <div class="logo-text">
                        IT блокнот
                    </div>
                </a>
            </div>
            <div class="col-xl-10 col-lg-9 top-menu">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a
                                        class="nav-link @if(isActive('main')) active @endif"
                                        @if(isActive('main')) aria-current="page" @endif
                                        @if(!isActive('main'))href="{{ route('main') }}"  @endif
                                    >
                                        Главная
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link @if(isActive('blog.categories.index')) active @endif"
                                        @if(isActive('blog.categories.index')) aria-current="page" @endif
                                        @if(!isActive('blog.categories.index')) href="{{ route('blog.categories.index') }}" @endif
                                    >
                                        Разделы
                                    </a>
                                </li>
                            </ul>
                            <form class="d-flex top-search" role="search">
                                <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
                                <button class="btn btn-outline-primary" type="submit">Поиск</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="content">
    <div class="container">
