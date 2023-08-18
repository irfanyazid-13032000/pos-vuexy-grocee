@extends('backend.layout.main')
@section('content')
<h4 class="fw-bold py-3 mb-4">Data Raw Food <span class="btn btn-success">{{$warehouse->name_warehouse}}</span> </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Bahan</th>
                        <th>Kode Bahan</th>
                        <th>price</th>
                        <th>qty</th>
                        <th>total price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  
                </tbody>
            </table>
            
            <a href="{{route('warehouse.stock.raw.create',['id_warehouse'=>$warehouse->id])}}" class="btn btn-success">add</a>
          </div>
        </div>
        <div class="card">
          <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover">
              <thead>
                <tr>
                  <td width="64%">total value warehouse</td>
                  <td>Rp. {{number_format($raw_foods->sum('total_price'))}}</td>
                </tr>
              </thead>
            </table>
          </div>
        </div>
@endsection

@push('addon-script')
<script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('warehouse.stock.raw.datatable', ['id_warehouse' => $warehouse->id]) }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_bahan', name: 'nama_bahan' },
            { data: 'kode_bahan', name: 'kode_bahan' },
            { data: 'price', name: 'price' },
            { data: 'qty', name: 'qty' },
            { data: 'total_price', name: 'total_price' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
    });
});
</script>


@endpush