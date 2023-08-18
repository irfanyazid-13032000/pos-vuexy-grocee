@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Bahan Baku</h5>
                <div class="card-body">
                    <form action="{{route('bahan.baku.update',['id'=>$bahan_baku->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="mb-3">
                            <label for="kode_bahan" class="form-label">Kode Bahan</label>
                            <input type="text" class="form-control" id="kode_bahan" name="kode_bahan"
                                value="{{$bahan_baku->kode_bahan}}">
                            @error('kode_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_bahan" class="form-label">Nama Bahan</label>
                            <input type="text" class="form-control" id="nama_bahan" name="nama_bahan"
                                value="{{$bahan_baku->nama_bahan}}">
                            @error('nama_bahan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit"
                                value="{{$bahan_baku->unit}}">
                            @error('unit')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                       

                        <div class="mb-3">
                            <label for="unit" class="form-label">status</label>
                            <select name="status" id="status" class="form-control">
                              @foreach ($status_kematangan as $kematangan)
                              <option value="{{ $kematangan }}">{{$kematangan}}</option>
                              @endforeach
                            </select>
                            @error('status')
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

