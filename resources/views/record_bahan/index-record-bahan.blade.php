@extends('backend.layout.main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<h4 class="fw-bold py-3 mb-4">Data record bahan</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
        <div class="row mb-4">
            <div class="col-md-3">
                <input type="date" id="dateFrom" class="form-control" placeholder="Date From" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-3">
                <input type="date" id="dateTo" class="form-control" placeholder="Date To" value="{{ date('Y-m-d') }}">
            </div>
        </div>
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>nama menu masakan</th>
                        <th>nama Bahan dasar</th>
                        <th>menu masakan</th>
                        <th>qty masakan</th>
                        <th>qty bahan</th>
                        <th>price per bahan</th>
                        <th>jumlah cost per bahan</th>
                        <th>Date</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  
                </tbody>
            </table>
            
          </div>
        </div>
        
@endsection

@push('addon-script')
<script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>

<script>
$(document).ready(function() {
    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "{{ route('record.bahan.data') }}",
        type: "POST", // Use POST request
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: function (data) {
            data.dateFrom = $('#dateFrom').val();
            data.dateTo = $('#dateTo').val();
        }},
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_kategori', name: 'nama_kategori',orderable: true, searchable: true },
            { data: 'nama_bahan', name: 'nama_bahan' ,orderable: true, searchable: true},
            { data: 'nama_menu', name: 'nama_menu' ,orderable: true, searchable: true},
            { data: 'qty_masakan', name: 'qty_masakan' ,orderable: true, searchable: true},
            { data: 'qty_bahan', name: 'qty_bahan' ,orderable: true, searchable: true},
            { data: 'price_per_bahan', name: 'price_per_bahan' ,orderable: true, searchable: true},
            { data: 'jumlah_cost_per_bahan', name: 'jumlah_cost_per_bahan', orderable: true, searchable: true },
            { data: 'created_at', name: 'created_at', orderable: true, searchable: true },
            { data: 'action', name: 'action', orderable: true, searchable: true },
        ],
    });


    $('#dateFrom').on('keyup', function() {
        table.columns(8).search(this.value).draw(); // 8 is the index of the 'created_at' column
    });

    $('#dateTo').on('keyup', function() {
        table.columns(8).search(this.value).draw();
    });
    
});
</script>


@endpush