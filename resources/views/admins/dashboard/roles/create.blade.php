@extends('admins.dashboard.layout.layout')

@section('content')
    <div class="container">
        <h1>Create Role</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Role Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="guard_name">guard_name:</label>
                <input type="text" id="guard_name" name="guard_name" required>
            </div>

            <div class="form-group">
                <label for="permissions">Permissions:</label>
                <br>
                @foreach ($permissions as $permission)
                    <input type="checkbox" id="{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}">
                    {{ $permission->name }}
                    <br>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Create Role</button>
        </form>
    </div>
@endsection
@section('styles').
<style>
/* Add some basic styles to improve the visual appearance */

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="checkbox"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="checkbox"] {
    width: auto;
    display: inline-block;
    margin-right: 10px;
}

button {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>
@stop

