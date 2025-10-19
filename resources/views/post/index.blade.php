<x-layout :title="$title">
    @php
        $role = auth()->check() ? auth()->user()->role : null;
    @endphp
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($role == 'admin')
        <div class="mb-4">
            <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New Post</a>
        </div>
    @endif


    <div class="post-list">
        @foreach ($posts as $post)
            <article class="post-card">
                <h2 class="post-title"><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h2>
                <p class="post-content">{{ Str::limit($post->content, 200) }}</p>
                <div class="post-meta">
                    <strong>Author:</strong> {{ $post->author }}
                </div>
                <div class="post-meta">
                    <strong>Status:</strong> {{ $post->published ? 'Published' : 'Draft' }}
                </div>
                <div class="post-actions">
                    @if (in_array($role, ['admin', 'editor']))
                        <a href="{{ route('blog.show', $post->id) }}" class="btn btn-secondary">View</a>
                        <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                    @endif
                    @if (in_array($role, ['admin' ]))
                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this post?');" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </div>









            </article>
            
        @endforeach
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</x-layout>
