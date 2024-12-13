
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
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>

                            </div>

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="" class="checkout__input__add">

                            </div>



                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <?php $value = 0; ?>
                                @foreach ($cart as $cartItem)
                                <ul>
                                    <li>{{ $cartItem->product->title }} <span>${{ number_format($cartItem->product->price, 2) }}</span></li>

                                </ul>
                                <?php $value += $cartItem->product->price; ?>
                                @endforeach
                                <div class="checkout__order__total">Total Value of Cart: <span>${{ number_format($value, 2) }}</span></div>

                                <p>Happy Shopping "Thank You"</p>

                                <button type="submit" class="site-btn">Cash On Delevary</button>
                                <button type="submit" class="site-btn">Pay Using Card</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


