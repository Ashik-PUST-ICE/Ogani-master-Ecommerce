<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">


                <!-- Loop through products -->
                @foreach($products as $product)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg">
                                <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ url('product_details', $product->id) }}"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{ url('add_cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ url('product_details', $product->id) }}">{{ $product->title }}</a></h6>
                        <h5>Price: ${{ $product->price }}</h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->
