@extends('backend.layout.main')
@section('content')
<style>
  .button-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
  }

  a{
    text-decoration:none;
  }

  .square-button {
    width: calc(33.33% - 10px);
    padding: 20px;
    color: white;
    text-align: center;
    border: none;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
  }

  .button-1 {
    background-color: #007bff; /* Warna biru */
  }

  .button-2 {
    background-color: #e74c3c; /* Warna merah */
  }

  .button-3 {
    background-color: #2ecc71; /* Warna hijau */
  }
</style>
</head>
<body>
<h4 class="fw-bold py-3 mb-4">Data Warehouse <span class="btn btn-danger">{{$warehouse->name_warehouse}}</span></h4>
<div class="button-container">
  <a href="{{route('warehouse.stock.raw',['id_warehouse'=>$id_warehouse])}}" class="square-button button-1">Raw Food</a>
  <a href="" class="square-button button-2">Half Cooked Food</a>
  <a href="" class="square-button button-3">Full Cooked Food</a>
</div>
@endsection



