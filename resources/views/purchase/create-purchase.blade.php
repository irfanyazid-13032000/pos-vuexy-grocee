@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Purchase</h5>
                <div class="card-body">
                    <form action="{{route('outlet.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_outlet" class="form-label">Name Outlet</label>
                            <input type="text" class="form-control" id="name_outlet" name="name_outlet"
                                value="{{ old('name_outlet') }}" required>
                            @error('name_outlet')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>



                      


                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Warehouse</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control">
                              <option value="">pilih warehouse</option>
                              @foreach ($warehouses as $warehouse)
                              <option value="{{ $warehouse->id }}">{{ $warehouse->name_warehouse }}</option>
                              @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="kategori_bahan_id" class="form-label">kategori bahan</label>
                            <select name="kategori_bahan_id" id="kategori_bahan_id" class="form-control">
                              <option value="">pilih kategori bahan</option>
                              @foreach ($kategori_bahans as $kategori_bahan)
                              <option value="{{ $kategori_bahan->id }}">{{ $kategori_bahan->nama_kategori_bahan }}</option>
                              @endforeach
                            </select>
                            @error('kategori_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="bahan_dasar_id" class="form-label">nama bahan</label>
                            <select name="bahan_dasar_id" id="bahan_dasar_id" class="form-control">
                              <option value="">pilih kategori bahan</option>
                              @foreach ($bahans as $bahan)
                              <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                              @endforeach
                            </select>
                            @error('bahan_dasar_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="satuan_id" class="form-label">satuan</label>
                            <select name="satuan_id" id="satuan_id" class="form-control">
                              <option value="">pilih kategori satuan</option>
                              @foreach ($satuans as $satuan)
                              <option value="{{ $satuan->id }}">{{ $satuan->nama_satuan }}</option>
                              @endforeach
                            </select>
                            @error('satuan_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ old('qty') }}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('outlet')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
