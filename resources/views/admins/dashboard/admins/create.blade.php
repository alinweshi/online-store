@extends('admins.dashboard.layout.layout')
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
<form method="POST" action="{{ route('admins.store') }}">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="email">email:</label>
        <input type="text" id="email" name="email" required>
    </div>

    <div>
        <label for="password">password:</label>
        <input type="password" id="password" name="password"  required>
    </div>

    <div>
<label for="role_id">role_id:</label>
<select name="role_id" id="role_id">
@foreach ($adminroles as $role )
      <option value="{{ $role->id }}">{{ $role->role }}</option>
@endforeach
</select>
    </div>
    <button type="submit">Submit</button>
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

/* Style text inputs and password input */
input[type="text"],
input[type="password"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
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

</style>
@stop