@extends('backend.layout.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"> Data Stock Outlet <span class="btn btn-success">{{$outlet->name_outlet}}</span></h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Bahan Dasar</th>
                        <th>Stok</th>
                        <th>harga satuan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($outlet_stocks as $stock)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$stock->nama_bahan}}</td>
                     <td>{{$stock->stock}}</td>
                     <td>Rp. {{number_format($stock->harga_satuan)}}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
      $('#table').DataTable({
    columnDefs: [
        {
            targets: '_all', // Kolom terakhir
            className: 'dt-center' // Membuat semua sel dalam kolom menjadi berpusat
        },
        
    ]
});

    </script>
@endpush