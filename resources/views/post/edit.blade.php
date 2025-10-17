<x-layout :title="$title">
    <div class="form-container">
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('blog.update', $post->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $post->id }}">
            
            <div class="form-group">
                <label for="title" class="form-label">Title *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                    class="form-input {{ $errors->has('title') ? 'error' : '' }}">
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content" class="form-label">Content *</label>
                <textarea id="content" name="content" rows="6"
                    class="form-textarea {{ $errors->has('content') ? 'error' : '' }}">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="author" class="form-label">Author *</label>
                <input type="text" id="author" name="author" value="{{ old('author', $post->author) }}"
                    class="form-input {{ $errors->has('author') ? 'error' : '' }}">
                @error('author')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="checkbox" id="published" name="published" value="1" {{ old('published', $post->published) ? 'checked' : '' }} class="form-checkbox">
                <label for="published" class="form-label">Published</label>
            </div>

            <div class="form-actions">
                <a href="{{ route('blog.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
        </form>
    </div>
</x-layout>