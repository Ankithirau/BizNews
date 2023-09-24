@include('layouts/header')

<div class="container mt-4">
    <div class="row">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @php
                $total=0;
            @endphp
            @foreach($cart as $item)
            @php
                  $total += $item['price'] * $item['quantity']; // Calculate the total cart value
            @endphp
            <tr>
              <td>{{ $item['name'] }}</td>
              <td>$ {{ $item['price'] }}</td>
              <td>{{ $item['quantity'] }}</td>
              <td>$ {{ $item['price'] * $item['quantity'] }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cart Total</h5>
            <hr>

            <p class="card-text">Subtotal: $ {{ $total }}</p>
            <p class="card-text">Shipping: Free</p>
            <hr>
            <h4 class="card-text">Total: $ {{ $total }}</h4>
            <a href="#" class="btn btn-primary">Proceed to Checkout</a>
          </div>
        </div>
      </div>
    </div>
</div>
  
@include('layouts/footer')
