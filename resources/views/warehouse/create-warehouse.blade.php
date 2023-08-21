@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Warehouse</h5>
                <div class="card-body">
                    <form action="{{route('warehouse.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_warehouse" class="form-label">Nama Warehouse</label>
                            <input type="text" class="form-control" id="name_warehouse" name="name_warehouse"
                                value="{{ old('name_warehouse') }}" required>
                            @error('name_warehouse')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="select-container">
                            <div class="input-group">
                                <select name="select_option[]" class="form-control" id="makanan_pokok">
                                    <option value="dfg">nasi</option>
                                    <option value="dfg">kentang</option>
                                    <option value="dfg">tepung goreng</option>
                                </select>
                                <button type="button" class="btn btn-danger remove-select">Hapus</button>
                                <button type="button" class="btn btn-success add-select">Tambah</button>
                            </div>
                        </div>
                       
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('warehouse.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@push('addon-script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>         
<script>
    $(document).ready(function() {
        let selectIndex = 0;



        $(".add-select").click(function() {
            var routeUrl = "{{ route('warehouse.makanan.pokok', ':index') }}";
            routeUrl = routeUrl.replace(':index', selectIndex);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                    $("#select-container").append(html);

                    // Generate a unique ID for the new select element
                var newSelectId = 'mentah_' + selectIndex;
                
                // Add the new ID to the select element
                $('#mentah' + selectIndex).attr('id', newSelectId);
                
                // Initialize Select2 for the newly added select element
                $('#' + newSelectId).select2({});


                    selectIndex++;
                }
            });
        });
        });

        $(document).on("click", ".remove-select", function() {
            $(this).closest(".input-group").remove();
        });

        $('#makanan_pokok').select2({})

</script>
@endpush