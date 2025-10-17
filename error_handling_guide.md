# Laravel Validation Error Handling Guide

## 1. Basic Error Display Methods

### Method 1: @error Directive (Recommended)
```blade
@error('title')
    <span class="error">{{ $message }}</span>
@enderror
```

### Method 2: Check if errors exist
```blade
@if ($errors->has('title'))
    <span class="error">{{ $errors->first('title') }}</span>
@endif
```

### Method 3: Display all errors
```blade
@if ($errors->any())
    <div class="alert">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
```

## 2. Form Input with Old Values
```blade
<input name="title" value="{{ old('title') }}">
<textarea name="content">{{ old('content') }}</textarea>
<input type="checkbox" name="published" {{ old('published') ? 'checked' : '' }}>
```

## 3. Dynamic CSS Classes
```blade
<input class="form-input {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}" 
       name="title" value="{{ old('title') }}">
```

## 4. Complete Form Example
```blade
<form method="POST" action="{{ route('blog.store') }}">
    @csrf
    
    <!-- Title Field -->
    <div>
        <label>Title</label>
        <input name="title" value="{{ old('title') }}" 
               class="{{ $errors->has('title') ? 'error-input' : '' }}">
        @error('title')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>
    
    <!-- Content Field -->
    <div>
        <label>Content</label>
        <textarea name="content">{{ old('content') }}</textarea>
        @error('content')
            <span class="error-text">{{ $message }}</span>
        @enderror
    </div>
    
    <button type="submit">Create Post</button>
</form>
```

## 5. CSS for Error Styling
```css
.error-input {
    border-color: #ef4444;
}
.error-text {
    color: #ef4444;
    font-size: 0.875rem;
}
.alert {
    background-color: #fef2f2;
    border: 1px solid #fecaca;
    color: #dc2626;
    padding: 1rem;
    border-radius: 0.375rem;
}
```

## 6. Testing Validation
1. Submit empty form
2. Check network tab for validation errors
3. Verify errors display correctly
4. Test that old values persist