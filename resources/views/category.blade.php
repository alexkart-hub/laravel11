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
