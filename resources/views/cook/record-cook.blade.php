@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Record Cook</span> </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>No Reference Cook</th>
                        <th>Chef</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($cooks as $cook)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cook->no_reference_cook}}</td>
                    <td>{{$cook->chef}}</td>
                    <td>{{$cook->status}}</td>
                    <td>{{$cook->price}}</td>
                    <td>{{$cook->created_at}}</td>
                    <td>
                     <a href="{{route('cook.detail',['no_reference_cook'=>$cook->no_reference_cook])}}" class="btn btn-primary">detail</a>
                    </td>
                  </tr>
                        
                    @endforeach
                
              
                
                </tbody>
            </table>

        </div>
    </div>


    
    


    
    
@endsection



