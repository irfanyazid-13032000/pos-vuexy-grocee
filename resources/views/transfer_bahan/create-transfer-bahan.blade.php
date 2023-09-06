@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Transfer Bahan</h5>
                <div class="card-body">
                    <form action="{{route('transfer.bahan.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Warehouse</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control">
                              <option value="">pilih warehouse</option>
                              @foreach ($warehouses as $warehouse)
                              <option value="{{$warehouse->id}}">{{$warehouse->name_warehouse}}</option>
                              @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="outlet_id" class="form-label">Outlet_id</label>
                            <select name="outlet_id" id="outlet_id" class="form-control">
                              <option value="">pilih outlet</option>
                              @foreach ($outlets as $outlet)
                                  <option value="{{$outlet->id}}">{{$outlet->name_outlet}}</option>
                              @endforeach
                            </select>
                            @error('outlet_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div id="bahan_dasar_select"></div>
                        


                        <div class="mb-3">
                            <label for="stock" class="form-label">stock warehouse</label>
                            <input type="text" class="form-control" id="stock" name="stock"
                                value="{{ old('stock') }}" required>
                            @error('stock')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="text" class="form-control" id="qty" name="qty"
                                value="{{ old('qty') }}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                    
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('transfer.bahan.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection


@push('addon-script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>


  $('#warehouse_id').on('change',function (params) {
    var routeUrl = "{{ route('transfer.bahan.stock.warehouse.select', ':warehouse_id') }}";
        routeUrl = routeUrl.replace(':warehouse_id', $('#warehouse_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#bahan_dasar_select').html(res)
                    $('#bahan_dasar_id').select2({})
                    getDataBahanDasar()
                }
            });
    
    
  })


  function getDataBahanDasar() {
    $('#bahan_dasar_id').on('change',function (params) {
      var routeUrl = "{{ route('transfer.bahan.stock.warehouse.data', [':warehouse_id',':bahan_dasar_id']) }}";
        routeUrl = routeUrl.replace(':warehouse_id', $('#warehouse_id').val());
        routeUrl = routeUrl.replace(':bahan_dasar_id', $('#bahan_dasar_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#stock').val(res.stock)
                    console.log(typeof res)
                    hitungSisaStockWarehouse()
                }
            });
  })


  }


  function hitungSisaStockWarehouse(sisaStock) {
    $('#qty').on('keyup',function (params) {
      alert(sisaStock)
    })
  }

  
  
</script>

@endpush
