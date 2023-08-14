@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Stock Warehouse</h5>
                <div class="card-body">
                    <form action="{{route('warehouse.stock.store',['id_warehouse'=>$id_warehouse])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_warehouse" class="form-label">Product</label>
                            <select class="form-select" id="id_product" name="id_product"
                                value="{{ old('code_product') }}" onchange="lakukan(this)" required>
                                <option value="">Choose Product</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->code_product }} - {{$product->name_product}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name_warehouse" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                value="{{ old('stock') }}" required>
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