@extends('admins.dashboard.layout.layout')
@section('styles')
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

h1 {
    text-align: center;
}

form {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin: 20px auto;
    max-width: 400px;
}

.form-group {
    margin-bottom: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="file"] {
    width: 100%;
    margin-bottom: 10px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: bold;
}

</style>
@stop
@section('content')
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
    <form action="{{ route('users.store') }}" method="POST">
        @csrf <!-- Laravel CSRF token -->

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
        </div>

        <div class="form-group">
            <label for="image">Profile Image:</label>
            <input type="file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="role">Role:</label>
            <select id="role" name="role[]" multiple>
                @foreach($userroles as $role)
                    <option value="{{ $role->name  }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>


<div class="form-group">
    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="active">Active</option>
        <option value="non-active">Non-Active</option>
    </select>
</div>


        <button type="submit">Create User</button>
    </form>
@stop