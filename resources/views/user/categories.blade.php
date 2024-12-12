

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-1.jpg') }}">

                            @foreach($data as $category)
                <h5><a href="#">{{ $category->category_name }}</a></h5>
            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-2.jpg') }}">
                            <h5><a href="{{ url('/') }}">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-3.jpg') }}">
                            <h5><a href="{{ url('/') }}">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-4.jpg') }}">
                            <h5><a href="{{ url('/') }}">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-5.jpg') }}">
                            <h5><a href="{{ url('/') }}">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
