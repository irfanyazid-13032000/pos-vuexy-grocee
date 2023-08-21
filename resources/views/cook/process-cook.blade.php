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
    width: calc(50% - 10px);
    padding: 20px;
    color: white;
    text-align: center;
    border: none;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
  }

  .button-1 {
    background-color: #313866; /* Warna biru */
  }

  .button-2 {
    background-color: #CECE5A; /* Warna merah */
  }

</style>
</head>
<body>
<div class="button-container">
  <a href="{{route('cook.process.raw.to.semi')}}" class="square-button button-1">raw -> semi-finished </a>
  <a href="" class="square-button button-2">semi-finished -> finished material</a>
</div>
@endsection



