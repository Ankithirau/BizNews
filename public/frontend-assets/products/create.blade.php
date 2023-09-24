@include('../layouts/header')
<div class="container mt-4 w-25">
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
    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{old('name')}}">
            @error('name')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Qantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" value="{{old('quantity')}}">
            @error('quantity')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{old('price')}}">
            @error('price')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image-file" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image-file">
            @error('image')
                <div class="error text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <img id="image-preview" class="img-fluid d-none" src="#" alt="Preview"
                style="height:100%;width:200px">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@include('../layouts/footer')
