@foreach ($carts as $cart)
<div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.html"><img src="{{asset('storage/product_images')}}/{{$cart->image}}" alt="product-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.html">{{$cart->name_product}}</a></h4>
                        <div class="minicart__price">
                            <span class="current__price">Rp. {{number_format($cart->price)}}</span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <a href="{{route('decrease.cart',['id'=>$cart->id])}}" type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</a>
                                <label>
                                    <input type="number" class="quantity__number" value="{{$cart->qty}}" />
                                </label>
                                <a  href="{{route('increase.cart',['id'=>$cart->id])}}" type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</a>
                            </div>
                            <!-- <a class="minicart__product--remove" href="{/{route('cart.remove',['id'=>$cart->id])}}" type="button">Remove</a> -->
                            <span class="minicart__product--remove" onclick="remove({{$cart->id}})">remove</span>
                        </div>
                        <h4 class="minicart__subtitle">total price</h4>
                        <span class="current__price">Rp. {{number_format($cart->total_price)}}</span>
                    </div>
                </div>
    
@endforeach