Categories
<ul>
    <li>
        <a href="/">Главная</a>
    </li>
</ul>
<ul>
@foreach( $categories as $category)
    <li>
        <a href="{{ route('blog.categories.show', ['category' => $category->slug]) }}">
            {{ $category->title }}
        </a>
    </li>
@endforeach
</ul>
