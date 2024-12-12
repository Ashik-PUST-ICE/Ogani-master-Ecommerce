<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #2C3E50; /* Dark background for contrast */
            font-family: Arial, sans-serif;
            color: #ecf0f1;
        }

        .page-header h1 {
            text-align: center;
            margin-top: 20px;
            color: #ecf0f1;
            font-size: 36px;
        }

        .div_deg {
    display: flex;
    justify-content: center;
    margin-top: 40px;
    margin-bottom: 40px; /* Add bottom margin */
}
table {
    width: 80%;
    border-collapse: separate; /* Separate borders for better spacing */
    border-spacing: 10px 15px; /* Adds space between rows (15px) and columns (10px) */
    background-color: #34495e;
    border-radius: 8px;
    overflow: hidden;
    margin: 20px auto; /* Center the table */
}
th, td {
    padding: 15px; /* Adds padding inside each cell */
    text-align: left;
}

th {
    background-color: #2980b9;
    color: white;
    font-size: 18px;
    text-transform: uppercase;
}
td {
    background-color: #2C3E50;
    color: #ecf0f1;
    font-size: 16px;
    border-bottom: 1px solid #7f8c8d;
}


/* Adding hover effect for better visualization */
tr:hover td {
    background-color: #3a539b;
}

td img {
    width: 100px;
    height: auto;
    border-radius: 5px;
}

        /* Add responsiveness */
        @media screen and (max-width: 768px) {
            table, th, td {
                display: block;
                width: 100%;
            }

            th {
                display: none; /* Hide table headers for small screens */
            }

            td {
                display: flex;
                justify-content: space-between;
                padding: 10px;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                text-transform: uppercase;
                color: #7f8c8d;
            }
        }

        input[type='search']
        {
            width: 500px;
            height: 60px;
            margin-left: 50px;
        }
    </style>


</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <h1>Product List</h1>
        </div>

        <div class="container-fluid">
            <form action="{{ url('product_search') }}" method="get">
                @csrf
                <input type="search" name="search" placeholder="Search for products">
                <input type="submit" class="btn-secondary" value="Search">
            </form>

            <div class="div_deg">
                <table>
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td data-label="Product Title">{{ $product->title }}</td>
                        <td data-label="Description">{!! Str::limit($product->description, 50) !!}</td>
                        <td data-label="Category">{{ $product->category }}</td>
                        <td data-label="Price">{{ $product->price }}</td>
                        <td data-label="Quantity">{{ $product->quantity }}</td>
                        <td data-label="Image">
                            <img width="100" height="100" src="/products/{{ $product->image }}" alt="Product Image">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ url('update_product', $product->id) }}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product', $product->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                    {{-- <div>
                        {{ $products->onEachSide(1)->links() }}

                    </div> --}}
                </table>


            </div>
        </div>
    </div>

    <!-- JavaScript confirmation function -->
@include('admin.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- JavaScript files-->
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
</body>
</html>
