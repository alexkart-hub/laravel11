@extends('app.layout.index')
@section('content')
    @php
        /** @var  App\Data\Page\Dto\CategoriesPageDto $data */
            $categories = $data->categories;
    @endphp
<h1>Категории</h1>
<ul class="menu">
    <li class="menu_item">
        <a class="menu_item_link" href="/">Главная</a>
    </li>
</ul>
<ul class="menu">
@foreach( $categories as $category)
    <li class="menu_item">
        <a class="menu_item_link" href="{{ route('blog.categories.show', ['category' => $category->slug]) }}">
            {{ $category->title }}
        </a>
    </li>
@endforeach
</ul>
@endsection
