                <div class="input-group">
                    <select name="halfCooked[setengah_matang{{$i}}]" class="form-control" id="halfCooked{{$i}}">
                    @foreach ($raw_foods as $food)
                    <option value="{{$food->kode_bahan}}">{{$food->kode_bahan}} - {{$food->nama_bahan}}</option>
                    @endforeach
                    </select>
                    <input type="number" name="halfCooked[setengah_matang{{$i}}]" class="form-control" id="qtyHalfCooked" placeholder="qty">
                    <button type="button" class="btn btn-danger remove-select">Hapus</button>
                </div>

                
                


