@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Raw Warehouse <span class="btn btn-success">{{$warehouse->name_warehouse}}</span></h5>
                <div class="card-body">
                    <form action="{{route('warehouse.stock.raw.store',['id_warehouse'=>$warehouse->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="kode_bahan" class="form-label">Name Raw Food</label>
                            <select name="kode_bahan" id="kode_bahan" class="form-control">
                              <option value="">pilih</option>
                              @foreach ($bahan_bakus as $bahan_baku)
                              <option value="{{$bahan_baku->kode_bahan}}"> {{$bahan_baku->kode_bahan}} - {{$bahan_baku->nama_bahan}}</option>
                              @endforeach
                            </select>
                            @error('kode_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" required>
                            @error('price')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="qty" class="form-label">qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ old('qty') }}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Price</label>
                            <input type="number" class="form-control" id="total_price" name="total_price"
                                value="{{ old('total_price') }}" required>
                            @error('total_price')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                    
                       
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('warehouse.stock.raw',['id_warehouse'=>$warehouse->id])}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@push('addon-script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $('#price').on('keyup',function (params) {
    let price = $('#price').val()
    let qty = $('#qty').val()
    $('#total_price').val(price * qty)
  })


  $('#qty').on('keyup',function (params) {
    let price = $('#price').val()
    let qty = $('#qty').val()
    $('#total_price').val(price * qty)
  })

  $('#kode_bahan').select2({})
</script>
@endpush


