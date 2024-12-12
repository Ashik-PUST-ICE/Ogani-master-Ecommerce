<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            @foreach($data as $category)
                            <li><a href="#">{{ $category->category_name }}</a></li>
                        @endforeach

                        </ul>
                    </div>

                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>

                            <div class="latest-product__slider owl-carousel">
                                @foreach($products as $product)
                                <div class="latest-prdouct__slider__item">
                                    <a href="{{ url('product_details', $product->id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->title }}</h6>
                                            <span>Price: ${{ $product->price }}</span>
                                        </div>
                                    </a>



                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($products as $product)
                            <div class="col-lg-4">


                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg">
                                        <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{ url('product_details', $product->id) }}"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ url('add_cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="">{{ $product->title }}</a></h6>
                                        <h5>Price: ${{ $product->price }}</h5>
                                    </div>
                                </div>




                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>


                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
