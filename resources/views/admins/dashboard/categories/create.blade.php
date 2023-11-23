@extends('admins.dashboard.layout.layout')

@section('content')
    <div class="container">
        <h1>Create Category</h1>

    @if(session('success'))
    {{ session('success') }}
    @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="image">Category Image:</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>

<select name="parent_id" class="form-control">
    <option value="">Select Parent Category</option>
    @foreach($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>
<button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection
@section('styles')
<style>
/* Style for the form container */
.container {
    margin: 20px auto;
    max-width: 600px;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

/* Style for form labels */
label {
    display: block;
    margin-bottom: 5px;
}

/* Style for form input and select fields */
input[type="text"],
input[type="file"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    font-size: 16px;
}

/* Style for form submit button */
button {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

/* Style for error messages */
.alert {
    background-color: #f44336;
    color: white;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}

/* Style for form validation error messages */
ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-left: 20px;
}

/* Optional: Add styles for success messages */
.alert-success {
    background-color: #28a745;
}

/* Optional: Add styles for the dropdown select */
select {
    cursor: pointer;
}

/* Optional: Add styles for the "Parent Category" label */
.form-group label[for="parent_id"] {
    margin-top: 10px;
}
</style>
@stop
