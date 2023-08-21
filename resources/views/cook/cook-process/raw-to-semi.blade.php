@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add Raw to Semi finished</h5>
                <div class="card-body">
                    <form action="{{route('cook.process.raw.to.semi.store')}}" method="POST" >
                        @csrf

                        
                        <div id="select-raw-container">
                          <label for="raw" class="form-label">raw</label>
                            <div class="input-group">
                                <select name="raw[mentah0]" class="form-control" id="mentah">
                                  <option value="">pilih</option>
                                  @foreach ($raw_foods as $food)
                                  <option value="{{$food->kode_bahan}}">{{$food->kode_bahan}} - {{$food->nama_bahan}}</option>
                                  @endforeach
                                </select>
                                <input type="number" name="qtyMentah[mentah0]" class="form-control" id="qtyMentah" placeholder="qty">
                                <button type="button" class="btn btn-danger remove-select">Hapus</button>
                                <button type="button" class="btn btn-success add-select-raw">Tambah</button>
                              </div>
                        </div>

                        <hr>

                        <div id="select-container">
                          <label for="raw" class="form-label">half cooked</label>
                            <div class="input-group">
                                <select name="halfCooked[setengah_matang0]" class="form-control" id="setengah_matang">
                                  <option value="">pilih</option>
                                  @foreach ($half_cooked_foods as $half_cooked)
                                  <option value="{{$half_cooked->kode_bahan}}">{{$half_cooked->kode_bahan}} - {{$half_cooked->nama_bahan}}</option>
                                  @endforeach
                                </select>
                                <input type="number" name="qtySetengahMatang[setengah_matang0]" class="form-control" id="qtySetengahMatang" placeholder="qty">
                                <button type="button" class="btn btn-danger remove-select">Hapus</button>
                                <button type="button" class="btn btn-success add-select-half-cooked">Tambah</button>
                              </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id"
                                value="{{ old('name_warehouse') }}" required>
                                <option value="">pilih warehouse</option>
                                @foreach ($warehouses as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->name_warehouse}}</option>
                                @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('category.index')}}" class="btn btn-danger ms-3">Kembali</a>
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
        let selectIndexRaw = 1;
        let selectIndexHalfCooked = 1;



        $(".add-select-raw").click(function() {
            var routeUrl = "{{ route('cook.select.raw', ':index') }}";
            routeUrl = routeUrl.replace(':index', selectIndexRaw);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                    $("#select-raw-container").append(html);

                    // Generate a unique ID for the new select element
                var newSelectId = 'mentah_' + selectIndexRaw;
                
                // Add the new ID to the select element
                $('#mentah' + selectIndexRaw).attr('id', newSelectId);
                
                // Initialize Select2 for the newly added select element
                $('#' + newSelectId).select2({});


                selectIndexRaw++;
                }
            });
        });


        $(".add-select-half-cooked").click(function() {
            var routeUrl = "{{ route('cook.select.half.cooked', ':index') }}";
            routeUrl = routeUrl.replace(':index', selectIndexHalfCooked);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(html) {
                    $("#select-container").append(html);

                    // Generate a unique ID for the new select element
                var newSelectId = 'mentah_' + selectIndexHalfCooked;
                
                // Add the new ID to the select element
                $('#mentah' + selectIndexHalfCooked).attr('id', newSelectId);
                
                // Initialize Select2 for the newly added select element
                $('#' + newSelectId).select2({});


                    selectIndexHalfCooked++;
                }
            });
        });




        });

        $(document).on("click", ".remove-select", function() {
            $(this).closest(".input-group").remove();
        });

        $('#mentah').select2({})
        $('#setengah_matang').select2({})

</script>
@endpush