@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Bahan {{$bahan_bakus}}</h5>
                <div class="card-body">
                    <form action="{{route('bahan.baku.store')}}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="nama_bahan" class="form-label">Nama Bahan Baku</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan"
                                value="{{ old('nama_bahan') }}" required>
                            @error('name_category')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kode_bahan" class="form-label">Kode Bahan Baku</label>
                            <input type="text" class="form-control" id="kode_bahan" name="kode_bahan"
                                value="{{ old('kode_bahan') }}" required>
                            @error('kode_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit"
                                value="{{ old('unit') }}" required>
                            @error('unit')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">tingkat kematangan</label>
                            <select class="form-select" id="status" name="status"
                                value="{{ old('name_warehouse') }}" required>
                                <option value="">Pilih</option>
                                <option value="mentah">mentah</option>
                                <option value="setengah-matang">setengah matang</option>
                                <option value="matang">matang</option>
                            </select>
                            @error('status')
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

