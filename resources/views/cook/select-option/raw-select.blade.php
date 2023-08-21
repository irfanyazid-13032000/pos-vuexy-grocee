<div class="input-group">
                    <select name="raw[mentah{{$i}}]" class="form-control" id="mentah{{$i}}">
                    @foreach ($raw_foods as $food)
                    <option value="{{$food->kode_bahan}}">{{$food->kode_bahan}} - {{$food->nama_bahan}}</option>
                    @endforeach
                    </select>
                    <input type="number" name="qty[mentah{{$i}}]" class="form-control" id="qtyMentah" placeholder="qty">
                    <button type="button" class="btn btn-danger remove-select">Hapus</button>
                </div>

                
                


