@extends('backend.layout.main')
@section('content')
  <h4 class="fw-bold py-3 mb-4">Data Ingredient <span class="badge bg-success">{{$item->name_item}}</span> </h4>
    <div class="card">
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center" style="text-align:center">
                        <th>No</th>
                        <th>Code Ingredient</th>
                        <th>Name Ingredient</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Price Per Unit</th>
                        <th>Total Price/Ingredients</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0" id="table">
                  @foreach ( $ingredients as $ingredient)
                  <tr class="text-center">
                     <td>{{$loop->iteration}}</td>
                     <td>{{$ingredient->code_ingredient}}</td>
                     <td>{{$ingredient->name_ingredient}}</td>
                     <td>{{$ingredient->qty}}</td>
                     <td>{{$ingredient->unit}}</td>
                     <td>Rp. {{number_format($ingredient->price_per_unit)}}</td>
                     <td>Rp. {{number_format($ingredient->total_price)}}</td>
                     <td>
                      <a href="{{route('ingredient.edit',['id'=> $ingredient->id,'code'=>$code_item])}}" class="btn btn-primary">edit</a>
                      <a href="{{route('ingredient.delete',['id'=> $ingredient->id,'code'=>$code_item])}}" class="btn btn-danger">delete</a>
                     </td>
                  </tr>
                  @endforeach
                  <tr>
                    <th colspan="8"></th>
                  </tr>
                  <tr>
                    <th colspan="6"></th>
                    <th style="text-align:center;">All Total Price</th>
                    <th></th>
                  </tr>
                  <tr>
                    <th colspan="6"></th>
                    <th style="text-align:center;">Rp. {{number_format($ingredients->sum('total_price'))}}</th>
                    <th></th>
                  </tr>
                
                </tbody>
            </table>

            <button
              type="button"
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#addDataIngredient">
                Add
            </button>
        </div>
    </div>


    
    



    <div class="modal fade" id="addDataIngredient" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="mb-2">Add Data Ingredient</h3>
                      </div>
                      <form id="addDataIngredientForm" class="row g-3" action="{{route('ingredient.store',['code'=>$code_item])}}">
                        <div class="col-12">

                          <label class="form-label w-100" for="modalAddCard">Code Ingredient</label>
                          <div class="input-group input-group-merge">
                            <input id="code_ingredient" name="code_ingredient" class="form-control credit-card-mask" type="text"/>
                          </div>

                          <label class="form-label w-100" for="modalAddCard">Name Ingredient</label>
                          <div class="input-group input-group-merge">
                            <input id="name_ingredient" name="name_ingredient" class="form-control credit-card-mask"type="text"/>
                          </div>


                          <label class="form-label w-100" for="modalAddCard">Quantity</label>
                          <div class="input-group input-group-merge">
                            <input id="qty" name="qty" class="form-control credit-card-mask"type="number" step="any"/>
                          </div>


                          <label class="form-label w-100" for="modalAddCard">Unit</label>
                          <div class="input-group input-group-merge">
                            <input id="unit" name="unit" class="form-control credit-card-mask"type="text"/>
                          </div>


                          <label class="form-label w-100" for="modalAddCard">Price / Unit</label>
                          <div class="input-group input-group-merge">
                            <input id="price_per_unit" name="price_per_unit" class="form-control credit-card-mask"type="number"/>
                          </div>


                        </div>
                        </div>
                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                          <button
                            type="reset"
                            class="btn btn-label-secondary btn-reset"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
    </div>
    
    
@endsection



