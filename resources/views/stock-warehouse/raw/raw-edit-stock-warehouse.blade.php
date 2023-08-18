@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Warehouse <span class="btn btn-warning">{{$warehouse->name_warehouse}}</span></h5>
                <div class="card-body">
                    <form action="{{route('warehouse.stock.raw.update',['id_warehouse'=>$warehouse->id,'kode_bahan'=>$raw_food->kode_bahan])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="nama_bahan" class="form-label">Nama Bahan</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan"
                                value="{{$raw_food->nama_bahan}}" readonly>
                            @error('nama_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kode_bahan" class="form-label">Nama Bahan</label>
                            <input type="text" class="form-control" id="kode_bahan" name="kode_bahan"
                                value="{{$raw_food->kode_bahan}}" readonly>
                            @error('kode_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="text" class="form-control" id="qty" name="qty"
                                value="{{$raw_food->qty}}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="price" class="form-label">price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{$raw_food->price}}" required>
                            @error('price')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="total_price" class="form-label">total_price</label>
                            <input type="text" class="form-control" id="total_price" name="total_price"
                                value="{{$raw_food->total_price}}" readonly>
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
</script>
@endpush
