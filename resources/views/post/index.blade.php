<x-layout :title="$title">
    <h1>Posts</h1>

    @foreach ($posts as $post)
        <h2>
            {{ $post->title }}
        </h2>
        <p>
            {{ $post->content }}
        </p>
        <p>
            <strong>Author:</strong> {{ $post->author }}
        </p>
        <p>
            <strong>Published:</strong> {{ $post->published ? 'Yes' : 'No' }}
        </p>
        <!-- comments  -->
        @if ($post->comments->isNotEmpty())
        <h3>Comments</h3>
            <h3>Comments</h3>
            @foreach ($post->comments as $comment)
                <ul>

                    <li>
                        {{ $comment->content }}
                    </li>
                </ul>

            @endforeach
        @endif
    @endforeach

</x-layout>
