<x-layout :title="$title">
    <article class="post-card">
        <h1 class="post-title">{{ $post->title }}</h1>
        <div class="post-content">{{ $post->content }}</div>
        <div class="post-meta">
            <strong>Author:</strong> {{ $post->author }}
        </div>
        <div class="post-meta">
            <strong>Status:</strong> {{ $post->published ? 'Published' : 'Draft' }}
        </div>
        <div class="post-actions">
            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Back to Posts</a>
            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
        </div>
    </article>

    <div class="comments-section">
        @if ($post->comments->isNotEmpty())
            <h3 class="comments-title">Comments</h3>
            <ul class="comment-list">
                @foreach ($post->comments as $comment)
                    <li class="comment-item">
                        <p class="comment-content">{{ $comment->content }}</p>
                        <p class="comment-meta">By {{ $comment->author }} on {{ $comment->created_at->format('M d, Y') }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="no-comments">No comments yet.</p>
        @endif
        <div class="add-comment">
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" id="author" name="author" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" rows="4" class="form-textarea" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
        </div>
    </div>
</x-layout>
