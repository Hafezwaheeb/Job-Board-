<x-layout :title="$title">
    <h1>Tags</h1>

    @foreach ($tags as $tag)
        <h2>
            {{ $tag->title }}
        </h2>
        <!-- posts for this tag -->
        @if ($tag->posts->isNotEmpty())
            <h3>Posts with this tag:</h3>
            @foreach ($tag->posts as $post)
                <ul>
                    <li>
                        {{ $post->title }}
                    </li>
                </ul>
            @endforeach
        @endif
    @endforeach

</x-layout>
