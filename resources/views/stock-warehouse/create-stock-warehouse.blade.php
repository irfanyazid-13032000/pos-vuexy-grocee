@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Stock Warehouse</h5>
                <div class="card-body">
                    <form action="{{route('warehouse.stock.store',['id_warehouse'=>$id_warehouse])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        
                        <div class="mb-3">
                            <label for="code_ingredient" class="form-label">Code Ingredient</label>
                            <input type="text" class="form-control" id="code_ingredient" name="code_ingredient"
                                value="{{ old('code_ingredient') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name_ingredient" class="form-label">Name Ingredient</label>
                            <input type="text" class="form-control" id="name_ingredient" name="name_ingredient"
                                value="{{ old('name_ingredient') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                value="{{ old('stock') }}" required>
                        </div>


                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit"
                                value="{{ old('unit') }}" required>
                        </div>


                        <div class="mb-3">
                            <label for="price_per_unit" class="form-label">Price / Unit</label>
                            <input type="number" class="form-control" id="price_per_unit" name="price_per_unit"
                                value="{{ old('price_per_unit') }}" required>
                        </div>
                       

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Price</label>
                            <input type="number" class="form-control" id="total_price" name="total_price"
                                value="{{ old('total_price') }}" readonly>
                        </div>
                       
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@push('addon-script')
<script>
    $('#stock').on('keyup',function (params) {
        let stockValue = $('#stock').val()
        let price_per_unit = $('#price_per_unit').val()
        
        $('#total_price').val(stockValue * price_per_unit)

    })


    $('#price_per_unit').on('keyup',function (params) {
        let stockValue = $('#stock').val()
        let price_per_unit = $('#price_per_unit').val()
        
        $('#total_price').val(stockValue * price_per_unit)

    })
</script>
@endpush