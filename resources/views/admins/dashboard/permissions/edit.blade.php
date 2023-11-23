@extends('admins.dashboard.layout.layout')
@section('content')
<form method="POST" action="{{ route('role.update', $role->id) }}">
    @csrf
    @method('PUT') <!-- You may use PUT or PATCH, depending on your application's routing conventions -->

    <div>
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" value="{{ old('role', $role->role) }}">
        @error('role')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="permissions">Permissions:</label>
        <br>
        @foreach (config('global.permissions') as $key => $value)
            <label for="{{ $key }}">
            {{--  @dd($role->permissions )  --}}
                <input type="checkbox" id="{{ $key }}" name="permissions[]" value="{{ $key }}" @if(in_array($key, $role->permissions)) checked @endif>
                {{ $value }}
            </label>
            <br>
        @endforeach
        @error('permissions')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Update</button>
</form>
@stop
@section('styles')
    <style>
    /* Apply some basic styling to the form */
form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style form labels */
label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

/* Style text inputs */
input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style checkboxes and their labels */
input[type="checkbox"] {
    margin-right: 5px;
}

/* Style the submit button */
button[type="submit"] {
    background: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button[type="submit"]:hover {
    background: #0056b3;
}

/* Style error messages */
span {
    color: red;
    display: block;
    margin-top: 5px;
}

    </style>
@stop