@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Bahan untuk Kategori <span class="btn btn-success">{{$kategori_bahan->nama_kategori_bahan}}</span></h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>bahan dasar</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($bahans as $bahan)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bahan->nama_bahan}}</td>
                    <td>
                    <a href="{{route('bahan.baku.kategori.bahan.edit',['id_bahan'=>$bahan->id])}}" class="btn btn-primary">edit</a>
                     <a href="{{route('bahan.baku.kategori.bahan.delete',['id'=>$kategori_bahan->id,'id_bahan'=>$bahan->id])}}" onclick="return confirm('apakah anda yakin menghapus data ini?')" class="btn btn-danger">delete</a>
                    </td>
                 </tr>
                  @endforeach
                 
                  
                
                
                </tbody>
            </table>


            <a href="{{route('bahan.baku.kategori.bahan.create',['id'=>$id])}}" class="btn btn-success">Add</a>
            <a href="{{route('kategori.bahan.index')}}" class="btn btn-danger">Back</a>
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



