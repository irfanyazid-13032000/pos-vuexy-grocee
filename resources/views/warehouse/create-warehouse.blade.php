@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Warehouse</h5>
                <div class="card-body">
                    <form action="{{route('warehouse.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_warehouse" class="form-label">Nama Warehouse</label>
                            <input type="text" class="form-control" id="name_warehouse" name="name_warehouse"
                                value="{{ old('name_warehouse') }}" required>
                            @error('name_warehouse')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('warehouse.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection