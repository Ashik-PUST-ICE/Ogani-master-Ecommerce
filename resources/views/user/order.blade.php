<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">



    @include('user.css')
    <style>
        /* Center the table container */
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        /* Table styles */
        table {
            width: 80%;
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;
            border: 1px solid #ddd; /* Light gray border */
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd; /* Light gray border */
        }

        th {
            background-color: blue; /* Blue background for header */
            color: white; /* White text color for better contrast */
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Light background for even rows */
        }

        tr:hover {
            background-color: #f1f1f1; /* Slightly darker background on hover */
        }

        img {
            width: 70px; /* Set a fixed width for images */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px; /* Rounded corners */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                font-size: 14px; /* Smaller font size on small screens */
            }

            img {
                width: 40px; /* Smaller image size */
            }
        }
    </style>
</head>
<body>
@include('user.loder')

@include('user.header')


<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Category</span>
                    </div>
                    <ul>
                        @foreach($data as $category)
                        <li><a href="{{ url('/') }}">{{ $category->category_name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+8801748031295</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="text-center col-lg-12">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/') }}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="table-container">
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Delivery Status</th>
            <th>Image</th>
        </tr>

        @foreach ($order as $item)
        <tr>
            <td>{{ $item->product->title }}</td>
            <td>{{ $item->product->price }}</td>
            <td>{{ $item->status }}</td>
            <td><img src="{{ asset('products/' . $item->product->image) }}" alt="Product Image"></td>
        </tr>
        @endforeach
    </table>
</div>



@include('user.footer')

@include('user.js')
</body>
</html>
