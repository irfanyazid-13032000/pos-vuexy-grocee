@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Produk</h5>
                <div class="card-body">
                    <form action="{{route('product.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="oldImage" value="{{$product->image}}">
                        <div class="mb-3">
                            <label for="name_product" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name_product" name="name_product"
                                value="{{ $product->name_product }}" readonly>
                            @error('name_product')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="code_product" class="form-label">Product Code</label>
                            <input type="text" class="form-control" id="code_product" name="code_product"
                                value="{{ $product->code_product }}" readonly>
                            @error('code_product')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div id="generatedTableContainer"></div>
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id"
                                value="{{ old('name_warehouse') }}" required>
                                <option value="">pilih warehouse</option>
                                @foreach ($warehouses as $warehouse)
                                  @if ($warehouse->id == $product->warehouse_id)
                                  <option value="{{ $warehouse->id }}" selected>{{$warehouse->name_warehouse}}</option>
                                  @else
                                  <option value="{{ $warehouse->id }}">{{$warehouse->name_warehouse}}</option>
                                  @endif
                                @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Kategori</label>
                            <select class="form-select" id="category_id" name="category_id"
                                value="{{ old('name_warehouse') }}" required>
                                <option value="">pilih kategori</option>
                                @foreach ($categories as $category)
                                  @if ($category->id == $product->category_id)
                                  <option value="{{ $category->id }}" selected>{{$category->name_category}}</option>
                                  @else
                                  <option value="{{ $category->id }}">{{$category->name_category}}</option>
                                  @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ $product->price }}" required>
                            @error('price')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stock_product" class="form-label">Stock Produk</label>
                            <input type="number" class="form-control" id="stock_product" name="stock_product"
                                value="{{ $product->stock_product }}" required>
                            @error('stock_product')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" id="product_image" name="product_image">
                            <img src="{{asset('storage/product_images')}}/{{$product->image}}" id="img-view" width="50">
                            @error('product_image')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('product.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
@endsection

@push('addon-script')
<script>
    $('#product_image').change(function(){
        previewImage(this)
    })

    function previewImage(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) { // Menghapus tanda kurung ()
                console.log(e.target.result)
                $('#img-view').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]) // Menggunakan readAsDataURL
        }
    }


    lakukan()

    // console.log($('#code_product').val())
    function lakukan() {
        let urlRoute = `{{ route('ingredient.data', ['code' => ':code']) }}`
        let url = urlRoute.replace(':code',$('#code_product').val())
        if ($('#code_product').val() !== '') {
            $.ajax({
                url: url,
                method: "GET",
                success: function (data) {
                    // console.log(data)
                    // return
                    generateTable($('#code_product').val(), data.ingredients,data.total_price);
                    document.getElementById("name_product").value = data.item.name_item;
                },
                error: function (error) {
                    console.error("AJAX request failed:", error);
                }
            });
        }else{
            const tableContainer = document.getElementById("generatedTableContainer");
            tableContainer.innerHTML = ''
        }
        }

        function formatNumberToCurrency(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function generateTable(selectedCode, data,total_price) {
            // console.log(data);
            // return
            const tableContainer = document.getElementById("generatedTableContainer");
            tableContainer.innerHTML = ''
            tableContainer.innerHTML = `
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Code Ingredient</th>
                            <th>Name Ingredient</th>
                            <th>Price / Unit</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Total Price/Ingredient</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${data.map(item => `
                            <tr>
                                <td>${item.code_ingredient}</td>
                                <td>${item.name_ingredient}</td>
                                <td>${formatNumberToCurrency(item.price_per_unit)}</td>
                                <td>${item.qty}</td>
                                <td>${item.unit}</td>
                                <td>${formatNumberToCurrency(item.total_price)}</td>
                            </tr>
                        `).join("")}
                        <tr>
                            <td colspan="5">total price</td>
                            <td>${formatNumberToCurrency(total_price)}</td>
                        </tr>
                    </tbody>
                </table>
            `;
        }

</script>

@endpush