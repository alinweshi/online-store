

@extends('layouts.app') {{-- Adjust the layout as needed --}}
@extends('admins.dashboard.layout.layout')
@section('styles')
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="container">
        <h1>Category Details</h1>

        <div class="card">
            <div class="card-header">
                Category Information
            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $category->name }}</h2>
                <p class="card-text">Category ID: {{ $category->id }}</p>
                <p class="card-text">Category Image: <img src="{{ $category->image }}" alt="{{ $category->name }}"></p>
                <p class="card-text">Parent Category: {{ $category->parent ? $category->parent->name : 'None' }}</p>

                <a href="{{ route('categories.index') }}" class="btn btn-primary">Back to Categories</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#roletable').DataTable({

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