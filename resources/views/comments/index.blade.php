<x-layout :title="$title">
    <h1>Comments</h1>
    <!-- #region comments -->


        @foreach ($comments as $comment)
        <h2>
            {{ $comment->content }}
        </h2>
        <p>
            {{ $comment->created_at }}
        </p>
        <p>
            <strong>Author:</strong> {{ $comment->author }}
        </p>
        <p>
            <a href="show/{{$comment->post->id }}">View Post</a>
        </p>
        @endforeach

</x-layout>
