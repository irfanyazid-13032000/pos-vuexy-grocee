@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Bahan Tambahan </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>nama bahan tambahan produksi</th>
                        <th>qty</th>
                        <th>harga satuan</th>
                        <th>jumlah harga</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($bahan_tambahan_produksis as $bahan)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$bahan->nama_bahan_tambahan_produksi}}</td>
                    <td>{{$bahan->qty}}</td>
                    <td>Rp. {{number_format($bahan->harga_satuan)}}</td>
                    <td>Rp. {{number_format($bahan->jumlah_harga)}}</td>
                    <td>
                    <a href="{{route('bahan.tambahan.produksi.edit',['id'=>$bahan->id])}}" class="btn btn-primary">edit</a>
                    <a href="{{route('bahan.tambahan.produksi.delete',['id'=>$bahan->id])}}" class="btn btn-danger">delete</a>
                    </td>
                 </tr>
                  @endforeach
                
                
                </tbody>
            </table>


            <a href="{{route('bahan.tambahan.produksi.create')}}" class="btn btn-success">Add</a>
        </div>
    </div>

    
    
@endsection



