@extends('admins.dashboard.layout.layout')
@section('content')
<div>
@if ($errors->any())
    <div class="alert alert-danger">
    @foreach ($errors->all() as $error )
        {{ $error }}
    @endforeach
    
@endif
</div>
<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
        @error('role')
            <span>{{ $message }}</span>
        @enderror
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
    </div>        
       @error('role')
            <span>{{ $message }}</span>
        @enderror

    <div>
        <label for="image">Image:</label>
        <input type="text" id="image" name="image" value="{{ old('image') }}" required>
    </div>

    <div>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}" min="0">
    </div>

    <div>
        <label for="discount_price">Discount Price:</label>
        <input type="text" id="discount_price" name="discount_price" value="{{ old('discount_price') }}">
    </div>

    <div>
        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            <option value="">Select a category</option>
            <!-- Populate the options with categories from your database -->
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="status">Status:</label>
        <input type="number" id="status" name="status" value="{{ old('status', 1) }}" min="0">
    </div>

    <button type="submit">Submit</button>
</form>
@stop
@section('styles')
<style>
/* Style the form container */
form {
    max-width: 400px;
    margin: 0 auto;
}

/* Style form elements */
form div {
    margin-bottom: 10px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea,
select {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #007BFF;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Style error messages */
span.error {
    color: red;
    font-size: 14px;
    display: block;
    margin-top: 5px;
}
</style>
@stop