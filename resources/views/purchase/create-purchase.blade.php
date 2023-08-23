@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Purchase</h5>
                <div class="card-body">
                    <form action="{{route('purchase.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf


                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Warehouse</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control">
                              <option value="">pilih warehouse</option>
                              @foreach ($warehouses as $warehouse)
                              <option value="{{ $warehouse->id }}">{{ $warehouse->name_warehouse }}</option>
                              @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="kategori_bahan_id" class="form-label">kategori bahan</label>
                            <select name="kategori_bahan_id" id="kategori_bahan_id" class="form-control">
                              <option value="">pilih kategori bahan</option>
                              @foreach ($kategori_bahans as $kategori_bahan)
                              <option value="{{ $kategori_bahan->id }}">{{ $kategori_bahan->nama_kategori_bahan }}</option>
                              @endforeach
                            </select>
                            @error('kategori_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="bahan_dasar_id" class="form-label">nama bahan</label>
                            <select name="bahan_dasar_id" id="bahan_dasar_id" class="form-control">
                              <option value="">pilih kategori bahan</option>
                              @foreach ($bahans as $bahan)
                              <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                              @endforeach
                            </select>
                            @error('bahan_dasar_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">satuan</label>
                            <select name="satuan_id" id="satuan_id" class="form-control">
                              <option value="">pilih kategori satuan</option>
                              @foreach ($satuans as $satuan)
                              <option value="{{ $satuan->id }}">{{ $satuan->nama_satuan }}</option>
                              @endforeach
                            </select>
                            @error('satuan_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ old('qty') }}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="harga_satuan" class="form-label">harga_satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                value="{{ old('harga_satuan') }}" required>
                            @error('harga_satuan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="jumlah_harga" class="form-label">jumlah_harga</label>
                            <input type="number" class="form-control" id="jumlah_harga" name="jumlah_harga"
                                value="{{ old('jumlah_harga') }}" required>
                            @error('jumlah_harga')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="vendor_id" class="form-label">vendor</label>
                            <select name="vendor_id" id="vendor_id" class="form-control">
                              <option value="">pilih kategori vendor</option>
                              @foreach ($vendors as $vendor)
                              <option value="{{ $vendor->id }}">{{ $vendor->name_vendor }}</option>
                              @endforeach
                            </select>
                            @error('vendor_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('outlet')}}" class="btn btn-danger ms-3">Kembali</a>
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
  $('#warehouse_id').select2({})
  $('#kategori_bahan_id').select2({})
  $('#satuan_id').select2({})
  $('#vendor_id').select2({})
  $('#bahan_dasar_id').on('change',function (params) {
    var routeUrl = "{{ route('food.data', ':index') }}";
            routeUrl = routeUrl.replace(':index', $('#bahan_dasar_id').val());

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    // console.log(res.harga_satuan);
                    $('#harga_satuan').val(res.harga_satuan)
                }
            });
  })

  $('#qty').on('keyup',function (params) {
    $('#jumlah_harga').val($('#qty').val() * $('#harga_satuan').val())
  })
</script>
@endpush
