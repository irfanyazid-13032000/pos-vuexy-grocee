@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Bahan Dasar</h5>
                <div class="card-body">
                    <form action="{{route('bahan.dasar.store')}}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="nama_bahan" class="form-label">Nama bahan</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan"
                                value="{{ old('nama_bahan') }}" required>
                            @error('nama_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga_satuan" class="form-label">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                value="{{ old('harga_satuan') }}" required>
                            @error('harga_satuan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('bahan.dasar.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection