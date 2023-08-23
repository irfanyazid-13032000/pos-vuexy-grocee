@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Food Process Masakan <span class="btn btn-success">{{$food->nama_menu}}</span></h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>bahan dasar</th>
                        <th>satuan</th>
                        <th>qty</th>
                        <th>harga satuan</th>
                        <th>jumlah harga</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($foods_process as $food)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$food->nama_bahan}}</td>
                    <td>{{$food->nama_satuan}}</td>
                    <td>{{$food->qty}}</td>
                    <td>Rp. {{number_format($food->harga_satuan)}}</td>
                    <td>Rp. {{number_format($food->jumlah_harga)}}</td>
                    <td>
                    <a href="{{route('food.process.edit',['id_food_process'=>$food->id])}}" class="btn btn-primary">edit</a>
                     <a href="{{route('food.process.delete',['id_food_process'=>$food->id])}}" class="btn btn-danger">delete</a>
                    </td>
                 </tr>
                    @endforeach
                  <tr>
                    <th colspan="8"></th>
                  </tr>
                  <tr>
                    <th colspan="5"></th>
                    <th style="text-align:center;">All Total Price</th>
                    <th></th>
                  </tr>
                  <tr>
                    <th colspan="5"></th>
                    <th style="text-align:center;">Rp. {{number_format($foods_process->sum('jumlah_harga'))}}</th>
                    <th></th>
                  </tr>
                
                
                </tbody>
            </table>


            <a href="{{route('food.process.create',['id'=>$id])}}" class="btn btn-success">Add</a>
            <a href="{{route('food')}}" class="btn btn-danger">Back</a>
        </div>
    </div>

    
    
@endsection



