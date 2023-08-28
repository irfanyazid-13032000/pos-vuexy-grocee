@extends('backend.layout.main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<h4 class="fw-bold py-3 mb-4">Data record bahan</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
        <div class="row mb-4">
            <div class="col-md-3">
                <input type="date" id="dateFrom" class="form-control" placeholder="Date From" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-3">
                <input type="date" id="dateTo" class="form-control" placeholder="Date To" value="{{ date('Y-m-d') }}">
            </div>
        </div>
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>nama kategori produksi</th>
                        <th>nama Bahan dasar</th>
                        <th>menu masakan</th>
                        <th>qty masakan</th>
                        <th>qty bahan</th>
                        <th>price per bahan</th>
                        <th>jumlah cost per bahan</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ($record_bahans as $record)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$record->nama_kategori}}</td>
                    <td>{{$record->nama_bahan}}</td>
                    <td>{{$record->nama_menu}}</td>
                    <td>{{$record->qty_masakan}}</td>
                    <td>{{$record->qty_bahan}}</td>
                    <td>{{$record->price_per_bahan}}</td>
                    <td>{{$record->jumlah_cost_per_bahan}}</td>
                    <td>{{$record->created_at}}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>

            <div class="pagination">
              {{ $record_bahans->links() }}
            </div>

            
          </div>
        </div>
        
@endsection
