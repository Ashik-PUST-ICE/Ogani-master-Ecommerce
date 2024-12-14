
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> -->
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ url('confirm_order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Receiver Name<span></span></p>
                                        <input type="text" name="name" placeholder="Enter your name" value="{{ Auth::user()->name }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Receiver Address<span></span></p>
                                <input type="text" name="address" placeholder="Enter your address" value="{{ Auth::user()->address }}" required>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Receiver Phone<span></span></p>
                                        <input type="text" name="phone" placeholder="Enter your phone number" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <?php $value = 0; ?>
                                <ul>
                                    @foreach ($cart as $cartItem)
                                        <li>{{ $cartItem->product->title }} <span>${{ number_format($cartItem->product->price, 2) }}</span></li>
                                        <?php $value += $cartItem->product->price; ?>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__total">
                                    Total Value of Cart: <span>${{ number_format($value, 2) }}</span>
                                </div>

                                <p>Happy Shopping "Thank You"</p>

                                <!-- Cash On Delivery Button -->
                                <button type="submit" class="site-btn">Cash On Delivery</button>
                                <a class="btn btn-success" href="{{ url('stripe', $value) }}">Pay Using Card</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


