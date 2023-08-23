@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Food </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Nama Bahan</th>
                        <th>satuan</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Harga</th>
                        <th>Create Date</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($foods as $food)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$food->nama_menu_masakan}}</td>
                     <td>{{$food->nama_bahan}}</td>
                     <td>{{$food->satuan_id}}</td>
                     <td>{{$food->qty}}</td>
                     <td>Rp. {{number_format($food->harga_satuan)}}</td>
                     <td>Rp. {{number_format($food->jumlah_harga)}}</td>
                     <td>{{$food->created_at}}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <th colspan="8"></th>
                  </tr>
                  <tr>
                    <th colspan="6"></th>
                    <th style="text-align:center;">All Total Price</th>
                    <th></th>
                  </tr>
                  <tr>
                    <th colspan="6"></th>
                    <th style="text-align:center;">Rp. {{number_format($foods->sum('jumlah_harga'))}}</th>
                    <th></th>
                  </tr>
                
                </tbody>
            </table>

            <!-- <button
              type="button"
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#addDataIngredient">
                Add
            </button> -->

            <a href="{{route('food.create')}}" class="btn btn-success">Add</a>
        </div>
    </div>

    
    
@endsection



