{{-- VALIDATION ERRORS TUTORIAL --}}

{{-- 1. DISPLAY ALL ERRORS AT ONCE --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- 2. DISPLAY SPECIFIC FIELD ERRORS --}}
<form method="POST" action="/blog/store">
    @csrf
    
    {{-- Title Field --}}
    <div>
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    {{-- Content Field --}}
    <div>
        <label>Content:</label>
        <textarea name="content">{{ old('content') }}</textarea>
        @error('content')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    {{-- Author Field --}}
    <div>
        <label>Author:</label>
        <input type="text" name="author" value="{{ old('author') }}">
        @error('author')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Create Post</button>
</form>

{{-- 3. ALTERNATIVE ERROR DISPLAY METHODS --}}

{{-- Check if specific field has error --}}
@if ($errors->has('title'))
    <p>Title has an error: {{ $errors->first('title') }}</p>
@endif

{{-- Get all errors for a field --}}
@if ($errors->has('content'))
    @foreach ($errors->get('content') as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

{{-- 4. STYLED ERROR MESSAGES --}}
<style>
.error {
    color: red;
    font-size: 12px;
}
.alert {
    padding: 10px;
    margin: 10px 0;
    border-radius: 4px;
}
.alert-danger {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}
</style>