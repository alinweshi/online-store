@extends('admins.dashboard.layout.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Laravel CSRF token -->
        @method('PUT') <!-- Use 'PUT' method for updating -->

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ $user->phone }}">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ $user->address }}">
        </div>

        <div class="form-group">
            <label for="image">Profile Image:</label>
            <input type="file" id="image" name="image">
            <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" width="100">
        </div>

<div class="form-group">
    <label for="role">Role:</label>
    <select id="role" name="role[]" multiple>
        @foreach ($roles as $roleKey => $role)
            <option value="{{ $role }}" {{ in_array($role, $roles) ? 'selected' : '' }}>{{ $role }}</option>
        @endforeach
    </select>
</div>



        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" value="{{ $user->status }}">
        </div>

        <button type="submit">Update User</button>
    </form>
    @stop
@section('styles')
    <style>
    /* CSS code to style form elements */

/* Form container styles */
.form-container {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background: #f9f9f9;
}

/* Form input styles */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 3px;
    margin-bottom: 10px;
}

input[type="file"] {
    margin-top: 5px;
}

button {
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}
    </style>
    @stop