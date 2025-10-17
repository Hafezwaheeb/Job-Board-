<x-layout :title="$title">
    <div class="comment-list">
        @foreach ($comments as $comment)
            <article class="comment-item">
                <p class="comment-content">{{ $comment->content }}</p>
                <div class="comment-meta">
                    <strong>Author:</strong> {{ $comment->author }}
                </div>
                <div class="comment-meta">
                    <strong>Posted:</strong> {{ $comment->created_at->format('M d, Y') }}
                </div>
                <div class="mt-2">
                    <a href="/blog/{{ $comment->post->id }}" class="btn btn-secondary">View Post</a>
                </div>
            </article>
        @endforeach
    </div>
</x-layout>