
@extends('admins.dashboard.layout.layout')
@section('styles')
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="container">
        <h1>Permissions</h1>
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
        <table class="permissionstable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>guard_name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>
                           <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-primary">show</a>
                           <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary">Edit</a>
                           <a href="{{ route('permissions.destroy', $permission->id) }}" class="btn btn-danger">Delete</a>
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
    $('#permissionstable').DataTable({
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
