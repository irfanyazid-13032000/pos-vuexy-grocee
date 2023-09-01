@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Add Stock Produk</h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>Code</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  <tr class="text-center">
                     <td>{{$product->code_product}}</td>
                     <td>{{$product->name_product}}</td>
                     <td>Rp. {{number_format($product->price)}}</td>
                     <td>{{$product->stock_product}}</td>
                     <td><img src="{{asset('storage/product_images')}}/{{$product->image}}" alt="" width="50"></td>
                  </tr>
                </tbody>
            </table>

            <select id="warehouse_id" name="warehouse_id" class="form-control mb-3 mt-3">
                <option value="">Pilih Warehouse</option>
                @foreach ($warehouses as $warehouse)
                <option value="{{$warehouse->id}}">{{$warehouse->name_warehouse}}</option>
                @endforeach
            </select>


            <div id="table-bahan-penyusun"></div>
            
            
           
        </div>
    </div>
@endsection

@push('addon-script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 

<script>
   var i = 0
    $('#add-more').on('click',function (params) {
      renderBahanPenyusun(i)
      ++i
    })

    $('#warehouse_id').on('change',function (params) {
      alert('lih berubah nih')
      renderTableAwalBahanPenyusun()
    })

    function renderBahanPenyusun(i) {
      var routeUrl = `{{ route('product.bahan.penyusun',':i') }}`;
            routeUrl = routeUrl.replace(':i', i);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                    $('#table-output-masakan').append(html)
                    console.log(html);

                    $('#bahan_dasar_id' + i).select2();

                    $('.btn-danger').click(function() {
                        var rowIndex = $(this).closest('tr').attr('id'); // Mendapatkan id baris
                        $('#' + rowIndex).remove(); // Menghapus baris
                        alert('hapus nih')
                    });

                }
            });
    }



    function renderTableAwalBahanPenyusun() {
      var routeUrl = `{{ route('product.awal.bahan.penyusun',':i') }}`;
            routeUrl = routeUrl.replace(':i', 0);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                    $('#table-bahan-penyusun').html(html)
                    

                    $('#bahan_dasar_id' + i).select2();

                    $('.btn-danger').click(function() {
                        var rowIndex = $(this).closest('tr').attr('id'); // Mendapatkan id baris
                        $('#' + rowIndex).remove(); // Menghapus baris
                        alert('hapus nih')
                    });

                }
            });
    }
    
</script>
@endpush

