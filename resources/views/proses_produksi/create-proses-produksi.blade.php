@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Proses Produksi</h5>
                <div class="card-body">
                    <form action="{{route('proses.produksi.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf


                        <div class="mb-3">
                            <label for="kategori_produksi_id" class="form-label">Kategori Produksi</label>
                            <select id="kategori_produksi_id" name="kategori_produksi_id" class="form-control">
                              <option value="">pilih kategori produksi</option>
                              @foreach ($kategori_proses_produksis as $kategori)
                              <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                              @endforeach
                            </select>
                            @error('kategori_produksi_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select id="warehouse_id" name="warehouse_id" class="form-control">
                              <option value="">pilih warehouse</option>
                              @foreach ($warehouses as $warehouse)
                              <option value="{{$warehouse->id}}">{{$warehouse->name_warehouse}}</option>
                              @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                            <br>
                            <div id="table-stock-warehouse"></div>
                        </div>


                        <div class="mb-3">
                            <label for="menu_masakan_id" class="form-label">menu masakan</label>
                            <select id="menu_masakan_id" name="menu_masakan_id" class="form-control">
                              <option value="">pilih menu masakan</option>
                              @foreach ($menu_masakans as $masakan)
                              <option value="{{$masakan->id}}">{{$masakan->nama_menu}}</option>
                              @endforeach
                            </select>
                            @error('menu_masakan_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                            
                        </div>



                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="1" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        
                        <div class="mb-3">
                            <div id="table-rincian-resep"></div>
                        </div>


                        <hr>
                        <h4>output</h4>


                        <div class="mb-3">
                            <label for="bahan_dasar_id" class="form-label">Bahan Dasar</label>
                            <select id="bahan_dasar_id" name="bahan_dasar_id" class="form-control">
                              <option value="">Pilih Output Bahan Dasar</option>
                              @foreach ($bahan_dasars as $bahan)
                              <option value="{{$bahan->id}}">{{$bahan->nama_bahan}}</option>
                              @endforeach
                            </select>
                            
                        </div>


                      

                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit" id="submit-button">Simpan</button>
                            <a href="{{route('proses.produksi.index')}}" class="btn btn-danger ms-3">Kembali</a>
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

    $('#bahan_dasar_id').select2({})

    
  $('#menu_masakan_id').on('change',function () {
           tableRecipe()
           tableStockWarehouse()
        });

    $('#warehouse_id').on('change',function (params) {
        tableRecipe()
        tableStockWarehouse()
    })



        function tableRecipe() {
          var routeUrl = "{{ route('proses.produksi.rincian.resep', [':id',':qty']) }}";
            routeUrl = routeUrl.replace(':id', $('#menu_masakan_id').val());
            routeUrl = routeUrl.replace(':qty', $('#qty').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                  $('#table-rincian-resep').html('')
                    $('#table-rincian-resep').html(html)
                }
            });
        }





        function tableStockWarehouse() {
            var routeUrl = "{{ route('proses.produksi.stock.purchase.warehouse', [':id',':qty',':warehouse_id']) }}";
            routeUrl = routeUrl.replace(':id', $('#menu_masakan_id').val());
            routeUrl = routeUrl.replace(':qty', $('#qty').val());
            routeUrl = routeUrl.replace(':warehouse_id', $('#warehouse_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                  $('#table-stock-warehouse').html('')
                    $('#table-stock-warehouse').html(html)
                }
            });

        }


        $('#qty').on('keyup',function (params) {
          tableRecipe()
          tableStockWarehouse()
        })


       
    


</script>
@endpush
