@extends('backend.layout.main')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Bahan Baku</h4>
<div class="card">
  <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="bahan_baku">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>kode bahan</th>
                        <th>Name Bahan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                 
                </tbody>
            </table>
            <a href="{{route('bahan.baku.create')}}" class="btn btn-success">add</a>
        </div>
    </div>
@endsection

@push('addon-script')
  <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
  

  <script>
    $(document).ready(function() {
       $('#bahan_baku').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{{ route('bahan.baku.datatable') }}',
              type:'GET',
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'kode_bahan', name: 'kode_bahan' },
                { data: 'nama_bahan', name: 'nama_bahan' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

    });



    
    
    
</script>
  
  
@endpush