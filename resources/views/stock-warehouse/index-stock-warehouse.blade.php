@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Warehouse Stock <span class="badge bg-success">{{$first_data_stock_warehouse->name_warehouse}}</span> </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Product</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($stocks_warehouse as $stock)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$stock->name_product}}</td>
                    <td>{{$stock->stock}}</td>
                    <td>
                     <a href="" class="btn btn-primary">edit</a>
                     <a href="{{route('warehouse.stock.delete',['id_warehouse'=>$id_warehouse,'product_id'=>$stock->product_id])}}" class="btn btn-danger">delete</a>
                    </td>
                  </tr>
                    @endforeach
                
                </tbody>
            </table>

            <a class="btn btn-success" href="{{route('warehouse.stock.create',['id_warehouse'=>$id_warehouse])}}">Add</a>
        </div>
    </div>


    
    


    
@endsection



