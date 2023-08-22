                        <div id="select-raw-container">
                            <label for="raw" class="form-label">raw</label>
                              <div class="input-group">
                                  <select name="raw[mentah0]" class="form-control" id="mentah">
                                    <option value="">pilih</option>
                                    @foreach ($raw_foods as $food)
                                    <option value="{{$food->kode_bahan}}">{{$food->kode_bahan}} - {{$food->nama_bahan}}</option>
                                    @endforeach
                                  </select>
                                  <input type="number" name="qtyMentah[mentah0]" class="form-control" id="qtyMentah0" placeholder="qty">
                                  <input type="number" name="priceMentah[mentah0]" class="form-control" id="priceMentah0" placeholder="price">
                                  <input type="number" name="totalpriceMentah[mentah0]" class="form-control" id="totalpriceMentah0" placeholder="total price">
                                  <button type="button" class="btn btn-danger remove-select">Hapus</button>
                                  <button type="button" class="btn btn-success add-select-raw">Tambah</button>
                                </div>
                          </div>