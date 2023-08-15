@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Ingredient</h5>
                <div class="card-body">
                    <form action="{{route('ingredient.store',['code'=>$code])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="code_ingredient" class="form-label">Code Ingredient</label>
                            <select name="code_ingredient" id="code_ingredient" class="form-control" onchange="getData(this)">
                              <option value="">Choose Code Ingredient</option>
                              @foreach ($ingredients as $ingredient)
                              <option value="{{$ingredient->code_ingredient}}">{{$ingredient->code_ingredient}}</option>
                              @endforeach
                            </select>
                            @error('code_ingredient')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name_ingredient" class="form-label">Name Ingredient</label>
                            <input type="text" class="form-control" id="name_ingredient" name="name_ingredient"
                                value="" readonly>
                            @error('name_ingredient')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit"
                                value="" readonly>
                            @error('unit')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price_per_unit" class="form-label">Price / Unit</label>
                            <input type="text" class="form-control" id="price_per_unit" name="price_per_unit"
                                value="" readonly>
                            @error('price_per_unit')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock in Warehouse</label>
                            <input type="text" class="form-control" id="stock" name="stock"
                                value="" readonly>
                            @error('stock')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="text" class="form-control" id="qty" name="qty"
                                value="">
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('category.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@push('addon-script')
<script>
  function getData(param){
    let urlOnly = `{{ route('stock.warehouse.data',['code'=>':code']) }}`
    let urlFull = urlOnly.replace(':code',param.value)

    $.ajax({
      url: urlFull, // Ganti 'nama_route' dengan nama route yang sesuai
      method: 'GET',
      success: function(response){
        // Berhasil mendapatkan data
        $('#name_ingredient').val(response.name_ingredient)
        $('#unit').val(response.unit)
        $('#price_per_unit').val(response.price_per_unit)
        $('#stock').val(response.stock)
      },
      error: function(xhr, status, error){
        // Terjadi kesalahan
        console.error(error);
      }
    });
  }
</script>
@endpush
