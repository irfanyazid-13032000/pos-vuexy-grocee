@extends('backend.layout.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Outlet</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>nama warehouse</th>
                        <th>Nama outlet</th>
                        <th>alamat outlet</th>
                        <th>kontak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($outlets as $outlet)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$outlet->name_warehouse}}</td>
                     <td>{{$outlet->name_outlet}}</td>
                     <td>{{$outlet->address_outlet}}</td>
                     <td>{{$outlet->contact_outlet}}</td>
                     <td>
                      <a href="{{route('outlet.edit',['id'=>$outlet->id])}}" class="btn btn-primary">edit</a>
                      <a href="" class="btn btn-danger">delete</a>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <a href="{{route('outlet.create')}}" class="btn btn-success">add</a>
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