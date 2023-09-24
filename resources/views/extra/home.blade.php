@include('layouts/header')

<div class="container mb-5 mt-5">
    <div class="row">
        @foreach ($products as $product)
        <div class="card m-2 shadow" style="width: 15rem;height:500px">
            <img src="{{asset('/image').'/'.$product->image}}"
                class="card-img-top" alt="..."/>
            <div class="card-body">
                <h5 class="card-title">{{ ucwords($product->name)}}</h5>
                <p class="card-text fs-3">&#8377; {{$product->price}}</p> 
                <select class="form-select w-50 mb-3" id="quantity-{{$product->id}}" aria-label="Default select example">
                    @for ($i = 1; $i <=10; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <button class="btn btn-primary ajax-btn" id="add-to-cart-btn" data-id="{{$product->id}}" data-url="{{route('cart.addToCart')}}">Add To Cart</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('layouts/footer')
