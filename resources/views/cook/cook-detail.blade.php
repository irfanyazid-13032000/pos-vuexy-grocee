@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold">Data Cook Detail</h4>
  <h4 class="fw-bold">Chef : {{$cook->chef}}</h4>
  <h4 class="fw-bold mb-4">tanggal : {{$cook->created_at}}</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Kode Bahan</th>
                        <th>Status</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($cook_details as $cook)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cook->kode_bahan}}</td>
                    <td>{{$cook->status}}</td>
                    <td>{{$cook->qty}}</td>
                    <td>Rp. {{number_format($cook->price)}}</td>
                    <td>Rp. {{number_format($cook->total_price)}}</td>
                  </tr>
                  @endforeach
                        
                
              
                
                </tbody>
            </table>

        </div>
    </div>


    
    


    
    
@endsection



