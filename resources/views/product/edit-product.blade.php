@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Produk</h5>
                <div class="card-body">
                    <form action="{{route('product.update',['id'=>$product->id])}}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_product" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="name_product" name="name_product"
                                value="{{ $product->name_product }}" required>
                            @error('name_product')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id"
                                value="{{ old('name_warehouse') }}" required>
                                <option value="">pilih warehouse</option>
                                @foreach ($warehouses as $warehouse)
                                  @if ($warehouse->id == $product->warehouse_id)
                                  <option value="{{ $warehouse->id }}" selected>{{$warehouse->name_warehouse}}</option>
                                  @else
                                  <option value="{{ $warehouse->id }}">{{$warehouse->name_warehouse}}</option>
                                  @endif
                                @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Kategori</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id"
                                value="{{ old('name_warehouse') }}" required>
                                <option value="">pilih kategori</option>
                                @foreach ($categories as $category)
                                  @if ($category->id == $product->category_id)
                                  <option value="{{ $category->id }}" selected>{{$category->name_category}}</option>
                                  @else
                                  <option value="{{ $category->id }}">{{$category->name_category}}</option>
                                  @endif
                                @endforeach
                            </select>
                            @error('category_id')
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