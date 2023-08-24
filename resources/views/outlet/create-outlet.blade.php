@extends('backend.layout.main')
@section('content')
<div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Outlet</h5>
                <div class="card-body">
                    <form action="{{route('outlet.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="mb-3">
                            <label for="name_outlet" class="form-label">Name Outlet</label>
                            <input type="text" class="form-control" id="name_outlet" name="name_outlet"
                                value="{{ old('name_outlet') }}" required>
                            @error('name_outlet')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>



                      


                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Warehouse</label>
                            <select name="warehouse_id" id="warehouse_id" class="form-control">
                              <option value="">pilih warehouse</option>
                              @foreach ($warehouses as $warehouse)
                              <option value="{{ $warehouse->id }}">{{ $warehouse->name_warehouse }}</option>
                              @endforeach
                            </select>
                            @error('warehouse_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="address_outlet" class="form-label">Addres Outlet</label>
                            <input type="text" class="form-control" id="address_outlet" name="address_outlet"
                                value="{{ old('address_outlet') }}" required>
                            @error('address_outlet')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="contact_outlet" class="form-label">Contact Outlet</label>
                            <input type="text" class="form-control" id="contact_outlet" name="contact_outlet"
                                value="{{ old('contact_outlet') }}" required>
                            @error('contact_outlet')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('outlet.index')}}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
