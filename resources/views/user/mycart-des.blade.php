<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $value = 0; ?>
                            @foreach ($cart as $cartItem)
                            <tr>
                                <td class="shoping__cart__item">
                                    {{ $cartItem->product->title }}
                                </td>
                                <td class="shoping__cart__price">
                                    ${{ number_format($cartItem->product->price, 2) }}
                                </td>
                                <td class="shoping__cart__image">
                                    <img src="/products/{{ $cartItem->product->image }}" alt="{{ $cartItem->product->title }}" >
                                </td>
                                <td class="shoping__cart__item__close">
                                    <form action="{{ route('remove_cart', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $value += $cartItem->product->price; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
           
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal: <span>$454.98</span></li>
                        <li>Total Value of Cart: <span>${{ number_format($value, 2) }}</span></li>
                    </ul>
                    <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
