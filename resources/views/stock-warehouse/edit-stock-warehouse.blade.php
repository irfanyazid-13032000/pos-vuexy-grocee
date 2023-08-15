@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Warehouse Stock Produk</h5>
                <div class="card-body">
                    <form action="{{route('warehouse.stock.update',['id_warehouse'=>$id,'stock_id'=>$stock_id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="code_ingredient" class="form-label">Code Ingredient</label>
                            <input type="text" class="form-control" id="code_ingredient" name="code_ingredient"
                                value="{{$warehouse_stock->code_ingredient}}">
                            @error('code_ingredient')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name_ingredient" class="form-label">Name Ingredient</label>
                            <input type="text" class="form-control" id="name_ingredient" name="name_ingredient"
                                value="{{$warehouse_stock->name_ingredient}}">
                            @error('name_ingredient')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock"
                                value="{{$warehouse_stock->stock}}">
                            @error('stock')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit"
                                value="{{$warehouse_stock->unit}}">
                            @error('unit')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price_per_unit" class="form-label">Price / Unit</label>
                            <input type="text" class="form-control" id="price_per_unit" name="price_per_unit"
                                value="{{$warehouse_stock->price_per_unit}}">
                            @error('price_per_unit')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        
                        
                      
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('product.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection