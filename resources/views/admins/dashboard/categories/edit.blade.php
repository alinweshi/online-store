@extends('admins.dashboard.layout.layout')

@section('content')
    <h1>Edit Category</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> There were some problems with your input.+
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
            @endif
    <form method="POST" action="{{ route('categories.update',$category->id) }}">
        @csrf
        @method('PUT') <!-- Use PUT method for updating -->

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" value="{{ $category->image }}" required>
        </div>

            <div class="form-group">
                <label for="parent_id">Parent Category (optional):</label>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">Select Parent Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>
@stop