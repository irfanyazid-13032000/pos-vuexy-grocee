@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Bahan Tambahan Produksi</h5>
                <div class="card-body">
                    <form action="{{route('bahan.tambahan.produksi.update',['id'=>$bahan_tambahan_produksi->id])}}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="nama_bahan_tambahan_produksi" class="form-label">Nama Bahan Tambahan</label>
                            <input type="text" class="form-control" id="nama_bahan_tambahan_produksi" name="nama_bahan_tambahan_produksi"
                                value="{{ $bahan_tambahan_produksi->nama_bahan_tambahan_produksi }}" required>
                            @error('nama_bahan_tambahan_produksi')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="harga_satuan" class="form-label">Harga Satuan</label>
                            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"
                                value="{{ $bahan_tambahan_produksi->harga_satuan }}" required>
                            @error('harga_satuan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ $bahan_tambahan_produksi->qty }}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        


                        <div class="mb-3">
                            <label for="jumlah_harga" class="form-label">jumlah harga</label>
                            <input type="number" class="form-control" id="jumlah_harga" name="jumlah_harga"
                                value="{{ $bahan_tambahan_produksi->jumlah_harga }}" readonly>
                            @error('jumlah_harga')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('bahan.tambahan.produksi.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@push('addon-script')
<script>
    $('#harga_satuan').on('keyup',function (params) {
        let harga_satuan = $('#harga_satuan').val()
        let qty = $('#qty').val()
        $('#jumlah_harga').val(harga_satuan * qty)
    })

    $('#qty').on('keyup',function (params) {
        let harga_satuan = $('#harga_satuan').val()
        let qty = $('#qty').val()
        $('#jumlah_harga').val(harga_satuan * qty)
    })
</script>
@endpush