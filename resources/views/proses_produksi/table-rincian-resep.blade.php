                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>no</th>
                                  <th>nama bahan</th>
                                  <th>qty</th>
                                  <th>satuan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($foods_process as $food)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$food->nama_bahan}}</td>
                                  <td>{{$food->qty * $qty}}</td>
                                  <td>{{$food->nama_satuan}}</td>
                                 
                                </tr>
                              @endforeach
                            </tbody>
                            </table>

                            