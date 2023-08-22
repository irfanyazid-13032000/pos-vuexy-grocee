@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Cook Raw to Semi finished</h5>
                <div class="card-body">
                    <form action="{{route('cook.process.raw.to.semi.store')}}" method="POST" >
                        @csrf

                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">warehouse</label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id">
                                @foreach ($warehouses as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->name_warehouse}}</option>
                                @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <label for="" class="form-label">No Reference Cook</label>
                        <input type="text" name="no_reference_cook" id="no_reference_cook" class="form-control" readonly>

                        <label for="" class="form-label">chef</label>
                        <input type="text" name="chef" id="chef" class="form-control" required>
                        
                        <div id="raw-select">
                         
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
       



        // ketika menambah inputan select half cooked
         let selectIndexRaw = 1;
         let selectIndexHalfCooked = 1;
      

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


        
       
        
        
        
        
        // setengah matang select 2
        $('#setengah_matang').select2({})


        // warehouse_id change
        $('#warehouse_id').on('change',function () {
            let warehouse_id = $('#warehouse_id').val()
            loadRawSelectContainer(warehouse_id)
            addInputanRaw(warehouse_id)
        })

        function loadRawSelectContainer(warehouse_id = 1) {
            var routeUrl = "{{ route('cook.select.container.raw',':warehouse_id') }}";
              routeUrl = routeUrl.replace(':warehouse_id', warehouse_id);
          $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                    $('#raw-select').html(res)
                    $('#mentah').select2({})

                    mentahOnChange()

                    keyupQty()

                    addInputanRaw()

                }
            });
        }

        loadRawSelectContainer()



        function addInputanRaw(warehouse_id = 1) {
                // klik add inputan select baru

        let selectIndexRaw = 1;
        let selectIndexHalfCooked = 1;

        $(".add-select-raw").click(function() {
            var routeUrl = "{{ route('cook.select.raw', [':index',':warehouse_id']) }}";
            routeUrl = routeUrl.replace(':index', selectIndexRaw);
            routeUrl = routeUrl.replace(':warehouse_id', $('#warehouse_id').val());
            console.log(routeUrl)

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

                // ketika select mentah di pilih
                $('#' + newSelectId).on('change',function (params) {
                  $('#totalpriceMentah'+(selectIndexRaw-1)).val(0)
                  $('#qtyMentah'+(selectIndexRaw-1)).val(0)


                  let code_raw = $('#' + newSelectId).val()
                  let warehouse_id = $('#warehouse_id').val()
                  var routeUrl = "{{ route('cook.data.raw', [':code',':warehouse_id']) }}";
                      routeUrl = routeUrl.replace(':code', code_raw);
                      routeUrl = routeUrl.replace(':warehouse_id', warehouse_id);
                      $.ajax({
                                url: routeUrl,
                                method: 'GET',
                                success: function(res) {
                                  $('#priceMentah'+(selectIndexRaw-1)).val(res.price)
                                //   ketika keyup pada qty
                                  $('#qtyMentah'+(selectIndexRaw-1)).on('keyup',function (params) {
                                      $('#totalpriceMentah'+(selectIndexRaw-1)).val( $('#qtyMentah'+(selectIndexRaw-1)).val() * res.price )
                                })
                    }
            });
        })

                selectIndexRaw++;
                }
            });
        });


        }


        function keyupQty() {
            // ketika qty keyup, maka data total price adalah qty keyup value di kali dengan harga per item mentah
            $('#qtyMentah0').on('keyup',function (params) {
                    $('#totalpriceMentah0').val($('#priceMentah0').val() * $('#qtyMentah0').val())
                })
        }

        function mentahOnChange() {
            $('#mentah').on('change',function (params) {
        // ketika mentah onchange, req ke backend, lalu isi inputan data harga dengan data hasil req
                    let code_raw = $('#mentah').val()
                    let warehouse_id = $('#warehouse_id').val()
                    var routeUrl = "{{ route('cook.data.raw', [':code',':warehouse_id']) }}";
                        routeUrl = routeUrl.replace(':code', code_raw);
                        routeUrl = routeUrl.replace(':warehouse_id', warehouse_id);
                    $.ajax({
                            url: routeUrl,
                            method: 'GET',
                            success: function(res) {
                            $('#priceMentah0').val(res.price)
                            }
                        });
                    })
        }



        function generateRandomString(length) {
        const charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return Array.from({ length }, () => charset[Math.floor(Math.random() * charset.length)]).join('');
        }

      const length = 10; // Ubah sesuai panjang string acak yang diinginkan
      const randomString = generateRandomString(length);

      $('#no_reference_cook').val(randomString)




</script>
@endpush