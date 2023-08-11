@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Produk</h5>
                <div class="card-body">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="code_product" class="form-label">Code Product</label>
                            <select class="form-select" id="code_product" name="code_product"
                                value="{{ old('code_product') }}" onchange="lakukan(this)" required>
                                <option value="">Choose Code Product</option>
                                @foreach ($items as $item)
                                <option value="{{ $item->code_item }}">{{$item->code_item}}</option>
                                @endforeach
                            </select>
                            <div id="generatedTableContainer" class="mt-4"></div>
                          
                        </div>
                        <div class="mb-3">
                            <label for="name_product" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="name_product" name="name_product"
                                 readonly>
                           
                        </div>
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id"
                                value="{{ old('name_warehouse') }}" required>
                                <option value="">pilih warehouse</option>
                                @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{$warehouse->name_warehouse}}</option>
                                @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">kategori</label>
                            <select class="form-select" id="category_id" name="category_id"
                                value="{{ old('name_warehouse') }}" required>
                                <option value="">pilih kategori</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{$category->name_category}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" required>
                            @error('price')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control" id="product_image" name="product_image">
                            <img src="" id="img-view" width="50">
                            @error('product_image')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('category.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>

                        <div id="generatedTableContainer" class="mt-4"></div>

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


    function lakukan(selectedCode) {
            $.ajax({
                url: `{{route('ingredient.data',['code'=>$item->code_item])}}`,
                method: "GET",
                success: function (data) {
                    generateTable(selectedCode, data.ingredients,data.total_price);
                    document.getElementById("name_product").value = data.item.name_item;
                },
                error: function (error) {
                    console.error("AJAX request failed:", error);
                }
            });
        }

        function formatNumberToCurrency(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function generateTable(selectedCode, data,total_price) {
            console.log(data);
            const tableContainer = document.getElementById("generatedTableContainer");
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