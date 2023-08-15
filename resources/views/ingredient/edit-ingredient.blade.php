@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Ingredient {{ $ingredient->name_item }} </h5>
                <div class="card-body">
                    <form action="{{route('ingredient.update',['id'=>$ingredient->id])}}" method="POST" >
                        @csrf
                        <input type="hidden" name="code_item" value="{{$ingredient->code_item}}">
                        <div class="mb-3">
                            <label for="name_ingredient" class="form-label">Name Ingredient</label>
                            <input type="text" class="form-control" id="name_ingredient" name="name_ingredient"
                                value="{{$ingredient->name_ingredient}}" readonly>
                            @error('name_ingredient')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="code_ingredient" class="form-label">Code Ingredient</label>
                            <input type="text" class="form-control" id="code_ingredient" name="code_ingredient"
                                value="{{$ingredient->code_ingredient}}" readonly>
                            @error('code_ingredient')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{$ingredient->qty}}" step="any" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit"
                                value="{{$ingredient->unit}}" readonly>
                            @error('unit')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price_per_unit" class="form-label">Price/Unit</label>
                            <input type="text" class="form-control" id="price_per_unit" name="price_per_unit"
                                value="{{$ingredient->price_per_unit}}" readonly>
                            @error('price_per_unit')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">total price</label>
                            <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                            @error('total_price')
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

        // ketika di load, inputan total price input berasal dari value database
    document.addEventListener("DOMContentLoaded", function() {
        var totalPriceInput = document.getElementById("total_price");
        totalPriceInput.value = $('#price_per_unit').val() * $('#qty').val();
    });


        //  ketika di ketik, data inputan total price berasal dari perkalian data antara price per unit dengan qty
    $('#qty').on('keyup',function (params) {
        console.log(params.target.value);
        $('#total_price').val(params.target.value * $('#price_per_unit').val())
    })

    $('#price_per_unit').on('keyup',function (params) {
        console.log(params.target.value);
        $('#total_price').val(params.target.value * $('#qty').val())
    })

</script>

@endpush
