@extends('admins.dashboard.layout.layout')

@section('content')
    <h1>Categories</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Parent Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="50">
                        @endif
                    </td>
                    <td>
                        @if ($category->parent)
                            {{ $category->parent->name }}
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Actions">
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE') <!-- This line is important -->
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('categories.create') }}" class="btn btn-success">Create Category</a>
@endsection
