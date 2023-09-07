                                <tr id="tr">
                                  <td>
                                    <select name="bahan_purcase[{{$i}}]" id="bahan_dasar_id{{$i}}" class="form-control">
                                      <option value="">pilih bahan dasar</option>
                                      @foreach ($bahan_dasars as $bahan)
                                      <option value="{{$bahan->id}}">{{$bahan->nama_bahan}}</option>
                                      @endforeach
                                    </select>
                                  </td>
                                  <td><input type="text"class="form-control"id="nama_kategori_bahan{{$i}}" readonly></td>
                                  <input type="text" name="bahan_purcase[{{$i}}]kategori_bahan_id" id="kategori_bahan_id{{$i}}">
                                  <td><input type="number" class="form-control" id="harga_satuan{{$i}}"></td>
                                  <td><input type="number" class="form-control" id="harga_acuan{{$i}}" readonly></td>
                                  <td><input type="text" class="form-control" name="bahan_purcase[{{$i}}]satuan" id="satuan{{$i}}" readonly></td>
                                  <td><input type="number" class="form-control" name="bahan_purcase[{{$i}}]qty" id="qty{{$i}}" ></td>
                                  <td><input type="number" class="form-control" name="bahan_purcase[{{$i}}]jumlah_harga" id="jumlah_harga{{$i}}" readonly></td>
                                  <td><input type="number" class="form-control" name="bahan_purcase[{{$i}}]selisih_harga" id="selisih_harga{{$i}}" readonly></td>
                                  <td><span class="btn btn-danger delete-row">delete</span></td>
                                </tr>
                                
                               