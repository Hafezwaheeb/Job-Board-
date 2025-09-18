<x-layout :title="$title">
    <h1>post</h1>

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
        

</x-layout>
