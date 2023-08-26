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
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($food_stock_warehouses as $food)
                                @php
                                  $sisa_stock = $food->qty_stock - ($food->qty_resep * $qty);
                                @endphp
                                <tr style="@if ($sisa_stock < 0) background-color: rgb(234, 84, 85); color: white; @endif">
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$food->nama_bahan}}</td>
                                  <td>{{$food->qty_stock}}</td>
                                  <td>{{$food->qty_resep * $qty}}</td>
                                  <td>{{$sisa_stock}}</td>
                                </tr>
                                
                                @if ($sisa_stock < 0)
                                <script>
                                  cukup = false
                                  alert("qty stock di warehouse kurang, untuk barang {{$food->nama_bahan}}");
                                </script>
                                @endif
                               
                                @endforeach

                            </tbody>
                            </table>

                            <script>
                              let lengkap = `{{ ($lengkap)?'lengkap':'tidak' }}`
                            </script>

                           

                    

                            
