@extends('admins.dashboard.layout.layout')
@section('styles')
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">
@stop
@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
@endif
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-14">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">All products</h6>
                            <table class="table" id="producttable">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">description</th>
                                        <th scope="col">image</th>
                                        <th scope="col">price</th>
                                        <th scope="col">discount_price</th>
                                        <th scope="col">category_id</th>
                                        <th scope="col">status</th>
                                        <th scope="col">quantity</th>
                                        <th scope="col">edit</th>
                                        <th scope="col">delete</th>
                                    </tr>
                               </thead>
                                <tbody>
                                        @foreach ( $products as $product )
                                    <tr>
                                        <th scope="col">{{ $product->id }}</th>
                                        <th scope="col">{{ $product->name }}</th>
                                        <th scope="col">{{ $product->description }}</th>
                                        <th scope="col">{{ $product->image }}</th>
                                        <th scope="col">{{ $product->price }}</th>
                                        <th scope="col">{{ $product->discount_price }}</th>
                                        <th scope="col">{{ $product->category_id }}</th>
                                        <th scope="col">{{ $product->status }}</th>
                                        <th scope="col">{{ $product->quantity }}</th>
                                        <th scope="col" ><button type="button" class="btn btn-secondary  m-2" ><a href="{{ route('products.edit',$product->id) }}">edit</a></button></th>
                                        <th scope="col" ><button type="button" class="btn btn-danger m-2"      ><a href="{{ route('products.destroy',$product->id) }}">delete</a></button></th>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                                            <a href="{{ route('products.create') }}" class="btn btn-success">Create product</a>

                        </div>
                    </div>
                </div>

            </div>


@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#producttable').DataTable({

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