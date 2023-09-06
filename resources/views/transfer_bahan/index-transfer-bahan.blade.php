@extends('backend.layout.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"> Data Transfer Bahan </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>dari warehouse</th>
                        <th>ke outlet</th>
                        <th>Bahan Dasar</th>
                        <th>Stok</th>
                        <th>date</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($records_transfer_bahan as $record)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$record->name_warehouse}}</td>
                     <td>{{$record->name_outlet}}</td>
                     <td>{{$record->nama_bahan}}</td>
                     <td>{{$record->qty}}</td>
                     <td>{{$record->date}}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <a href="{{route('transfer.bahan.create')}}" class="btn btn-success">add</a>
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