@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Warehouse Stock Produk</h5>
                <div class="card-body">
                    <form action="{{route('warehouse.stock.update',['id_warehouse'=>$id,'product_id'=>$id_product])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_product" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="name_product" name="name_product"
                                value="{{$warehouse_stock->name_product}}" readonly>
                            @error('name_product')
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
                       
                        
                        
                      
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('product.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection