<div class="input-group">
                    <select name="raw[mentah{{$i}}]" class="form-control" id="mentah{{$i}}">
                    @foreach ($raw_foods as $food)
                    <option value="{{$food->kode_bahan}}">{{$food->kode_bahan}} - {{$food->nama_bahan}}</option>
                    @endforeach
                    </select>
                    <input type="number" name="qtyMentah[mentah{{$i}}]" class="form-control" id="qtyMentah{{$i}}" placeholder="qty">
                    <input type="number" name="priceMentah[mentah{{$i}}]" class="form-control" id="priceMentah{{$i}}" placeholder="price">
                                  <input type="number" name="totalpriceMentah[mentah{{$i}}]" class="form-control" id="totalpriceMentah{{$i}}" placeholder="total price">
                    <button type="button" class="btn btn-danger remove-select">Hapus</button>
                </div>

                
                


