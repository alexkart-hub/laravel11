@extends('app.layout.index')
@section('content')
    Category {{ $data->category }}
    <ul class="menu">
        <li class="menu_item">
            <a class="menu_item_link" href="/">Главная</a>
        </li>
        <li class="menu_item">
            <a class="menu_item_link" href="/category">Разделы</a>
        </li>
        @empty($data->parentCategory)
        @else
            <li class="menu_item">
                <a class="menu_item_link" href="/category/{{ $data->parentCategory }}">Наверх</a>
            </li>
        @endempty
    </ul>

    <ul class="menu">
    @foreach( $data->categories as $category)
            <li class="menu_item">
            <a class="menu_item_link" href="{{ route('blog.categories.show', ['category' => $data->category . '/' . $category->slug]) }}">
                {{ $category->title }}
            </a>
        </li>
    @endforeach
</ul>
    <ul class="menu">
    @foreach( $data->posts as $post)
            <li class="menu_item">
            <a class="menu_item_link" href="{{ route('blog.post', ['category' => $data->category, 'post' => $post->slug]) }}">
                {{ $post->title }}
            </a>
        </li>
    @endforeach
</ul>
@endsection
