@extends('backend.layout.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Raw</h4>
<div class="card">
  <div class="table-responsive text-nowrap p-4">
    <label for="warehouse">warehouse</label>
          <select name="warehouse" id="warehouse" class="form-control" onchange="selectWarehouse(this)">
            @foreach ($warehouses as $warehouse)
            <option value="{{$warehouse->id}}">{{$warehouse->name_warehouse}}</option>
            @endforeach
          </select>
            <table class="table table-hover" id="raw-table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>kode bahan</th>
                        <th>Name Raw</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                 
                </tbody>
            </table>
            <a href="" class="btn btn-success">add</a>
        </div>
    </div>
@endsection

@push('addon-script')
  <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
  

  <script>
    $(document).ready(function() {
       var dataTable = $('#raw-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{{ route('raw.datatable') }}',
              type:'POST',
              headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: function(d) {
                        d.warehouse_id = $('#warehouse').val(); // Add warehouse_id to the request data
                    }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'kode_bahan', name: 'kode_bahan' },
                { data: 'nama_bahan', name: 'nama_bahan' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        $('#warehouse').on('change', function() {
          dataTable.ajax.reload();
      });
    });



    
    
    
</script>
  
  
@endpush