Category {{ $category }}
<ul>
    <li>
        <a href="/">Главная</a>
    </li>
    <li>
        <a href="/category">Разделы</a>
    </li>
</ul>

<ul>
    @foreach( $posts as $post)
        <li>
            <a href="{{ route('blog.post', ['category' => $category, 'post' => $post->slug]) }}">
                {{ $post->title }}
            </a>
        </li>
    @endforeach
</ul>
