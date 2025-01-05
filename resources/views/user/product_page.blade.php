


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">



    @include('user.css')
</head>
<body>
@include('user.loder')

@include('user.header')

@include('user.hero')

<div class="row">
    @if($products->isNotEmpty())
        @foreach($products as $product)
            <div class="col-lg-4 col-md-6">
                <div class="product__item">
                    <div class="product__item__pic">
                        <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}">
                    </div>
                    <div class="product__item__text">
                        <h6>{{ $product->title }}</h6>
                        <h5>Price: ${{ $product->price }}</h5>
                        <a href="{{ url('product_details', $product->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No products found.</p>
    @endif
</div>






@include('user.footer')

@include('user.js')
</body>
</html>


