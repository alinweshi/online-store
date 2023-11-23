
@extends('admins.dashboard.layout.layout')
@section('styles')
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
@stop
@section('content')
<div class="container">
    <h1>Roles and Permissions</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table" id="rolestable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Role Name</th>
                <th>Guard Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->guard_name }}</td>
                    <td>
                        @foreach($role->permissions as $permission)
                            {{ $permission->name }}<br>
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Actions">
                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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

</div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#rolestable').DataTable({
          "order": [], // Disable initial sorting
  "searching": true, // Enable searching
  "paging": true, // Enable pagination
  "pageLength": 10, // Set the number of rows per page
  "columnDefs": [{
    "targets": -1, // Last column (actions column)
    "columnDefs": [{ "orderable": false, "targets": [6] }],
  }],
            'dom': 'Bfrtip',
    "buttons": [
      'copy', 'csv', 'excel', 'pdf', 'print', 'colvis','new' // Add column visibility button
    ],
    });
});
</script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
@stop
