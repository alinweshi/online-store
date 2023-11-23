@extends('admins.dashboard.layout.layout')
@section('content')
    <div class="container">
        <h1>Edit Role</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

<div class="form-group">
    <label for="name">Role Name:</label>
    <select id="name" name="name" required>
        <option value="" Disable>Select Role</option>
        @foreach($roles as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach
    </select>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


            <div class="form-group">
                <label for="guard_name">Guard Name:</label>
                <input type="text" id="guard_name" name="guard_name" value="{{ $role->guard_name }}" required>
            </div>

            <div class="form-group">
                <label for="permission">Permissions:</label>
                <br>
                @foreach($permission as $permission)
                    <input type="checkbox" id="permission-{{ $permission->id }}" name="permission[]" value="{{ $permission->id }}"
                        {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                    {{ $permission->name }}
                    <br>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
@stop
@section('styles')
    <style>
/* Add your custom CSS styles here */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="checkbox"] {
    margin-right: 5px;
}

.btn {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.alert {
    background-color: #28A745;
    color: #fff;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
}

    </style>
@stop