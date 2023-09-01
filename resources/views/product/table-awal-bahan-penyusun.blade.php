                    <table class="table table-bordered" id="table-output-masakan">
                                <tr>
                                    <th>bahan penyusun</th>
                                    <th>qty</th>
                                    <th>price</th>
                                    <th>tombol</th>
                                </tr>
                                <tr>
                                    <td>
                                    <select id="bahan_dasar_id{{$i}}" name="outputs[0][bahan_dasar_id]" class="form-control">
                                        <option value="">Pilih Output Bahan hasil</option>
                                        @foreach ($bahan_dasars as $bahan)
                                        <option value="{{$bahan->id}}">{{$bahan->nama_bahan}}</option>
                                        @endforeach
                                    </select>
                                    </td>
                                    <td>
                                        <input type="number" name="outputs[0][qty_bahan_penyusun]" id="qty_bahan_penyusun{{$i}}" class="form-control">
                                    </td>
                                    <td>
                                    <input type="number" name="outputs[0][price]" id="price{{$i}}" class="form-control" readonly>
                                    </td>
                                    <td><span class="btn btn-success" id="add-more">add more</span></td>
                                </tr>
                        </table>