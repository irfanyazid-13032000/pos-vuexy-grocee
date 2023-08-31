                        <script>
                              let cukup = true; // Inisialisasi cukup dengan true
                        </script>
                        <table class="table table-bordered">
                          <thead>
                                <tr>
                                  <th>no</th>
                                  <th>nama bahan</th>
                                  <th>stock</th>
                                  <th>digunakan</th>
                                  <th>sisa</th>
                                  <th>harga satuan</th>
                                  <th>total harga per bahan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($food_stock_warehouses as $food)
                                
                                <tr style="@if ($food->sisa_stock < 0) background-color: rgb(234, 84, 85); color: white; @endif">
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$food->nama_bahan}}</td>
                                  <td>{{$food->stock}}</td>
                                  <td>{{$food->total_qty_used}}</td>
                                  <td>{{$food->sisa_stock}}</td>
                                  <th>{{$food->harga_satuan}}</th>
                                  <th>{{$food->harga_satuan * $qty}}</th>

                                </tr>
                                
                                @if ($food->sisa_stock < 0)
                                <script>
                                  return cukup = false
                                  alert("qty stock di warehouse kurang, untuk barang {{$food->nama_bahan}}");
                                </script>
                                
                                @endif
                               
                                @endforeach

                            </tbody>
                            </table>

                            <input type="text" value="{{$lengkap}}" id="kelengkapanBahan">
                            <input type="text" value="{{$cukup}}" id="kecukupanBahan">

                            <input type="number" value="{{$food_stock_warehouses->sum('harga_satuan') * $qty}}" name="jumlah_cost">

                            <script>
                              let lengkap = `{{ $lengkap }}`

                              $('#submit-button').on('click',function (event) {


                                  if ($('#kecukupanBahan').val() == 'kurang') {
                                      alert('stock tidak mencukupi')
                                      event.preventDefault()
                                  }

                                if($('#kelengkapanBahan').val() == 'kurang'){
                                    alert('stock tidak lengkap')
                                    event.preventDefault()
                                }

        });
                            </script>

                           

                    

                            
