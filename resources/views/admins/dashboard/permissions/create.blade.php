@extends('admins.dashboard.layout.layout')
@section('content')
@section('content')
    <div class="container">
        <h1>Create Permission</h1>
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
        <form method="POST" action="{{ route('permissions.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Permission Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="guard_name">Guard:</label>
                <select name="guard_name" id="guard_name" class="form-control">
                    <option value="web" selected>web</option>
                    <option value="admin" selected>admin</option>
                    {{-- Add more guard options here if needed --}}
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Permission</button>
        </form>
    </div>
@stop
@section('styles')
<style>
/* Add this CSS to your project's stylesheet or create a new CSS file */

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f8f8f8;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color: #3490dc;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #1e70bf;
}

/* Customize the styles as needed to match your project's design. */
</style>
@stop
