@extends('app.layout.index')
@section('content')
    @php
        /** @var  App\Data\Page\Dto\PostPageDto $data */
            $post = $data->post;
            $category = $data->category;
    @endphp

    {{ $post->title }} ({{ $category->title }})
    <ul>
        <li>
            <a href="{{ route('main') }}">Главная</a>
        </li>
        <li>
            <a href="{{ route('blog.categories.index') }}">Разделы</a>
        </li>
        <li>
            <a href="{{ route('blog.categories.show', ['category' => $category->slug]) }}">{{ $category->title }}</a>
        </li>
    </ul>

    {{ $post->content_html }}
@endsection
