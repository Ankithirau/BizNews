@include('../layouts/header')
<div class="container mt-4">
<div class="d-flex justify-content-end">
    <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Create</a>
</div>
@if (Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{{ Session::get('success') }}</li>
    </ul>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger">
    <ul>
        <li>{{ Session::get('error') }}</li>
    </ul>
</div>
@endif
<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Qantity</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>
                    <img src="{{asset('/image').'/'.$product->image}}" alt="Company Logo" class="img-thumbnail rounded-circle shadow" style="width: 54px;height:50px">
                    <span>&nbsp;{{ucwords($product->name)}}</span>
                </td>
                <td>{{$product->quantity}}</td>
                <td>$ {{$product->price}}</td>
                <td>
                    <a href="{{ route('product.edit',$product->id) }}" rel="noopener noreferrer"
                        class="btn btn-success btn-sm">Edit</a>
                    <a href="{{ route('product.destroy',$product->id) }}" rel="noopener noreferrer" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@include('../layouts/footer')