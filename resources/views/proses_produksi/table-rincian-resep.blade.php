                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>no</th>
                                  <th>nama bahan</th>
                                  <th>qty</th>
                                  <th>harga satuan</th>
                                  <th>jumlah_harga</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($foods_process as $food)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$food->nama_bahan}}</td>
                                  <td>{{$food->qty * $qty}}</td>
                                  <td>Rp. {{number_format($food->harga_satuan)}}</td>
                                  <td>Rp. {{number_format($food->jumlah_harga * $qty)}}</td>
                                </tr>
                              @endforeach
                              <tr>
                                <td colspan="4">total price</td>
                                <td>Rp. {{number_format($foods_process->sum('jumlah_harga') * $qty)}}</td>
                              </tr>
                            </tbody>
                            </table>

                            <input type="hidden" value="{{$foods_process->sum('jumlah_harga') * $qty}}" name="jumlah_cost">