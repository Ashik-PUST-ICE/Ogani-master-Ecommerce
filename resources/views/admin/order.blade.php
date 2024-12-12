<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .page-header {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid black; /* Border for table cells */
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .container-fluid {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #dc3545; /* Bootstrap danger color */
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #c82333; /* Darker shade on hover */
        }
    </style>
</head>
<body>

    @include('admin.header')
    @include('admin.sidebar')

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <h2>Customer All Orders</h2>
        </div>
        <div class="container-fluid">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print Pdf</th>
                </tr>

                @foreach($data as $data)
                <tr>
                   <td>{{ $data->name }}</td>
                   <td>{{ $data->rec_address }}</td>
                   <td>{{ $data->phone }}</td>
                   <td>{{ $data->product->title }}</td>
                   <td>${{ number_format($data->product->price, 2) }}</td>
                   <td>
                    <img width="70px" src="/products/{{ $data->product->image }}" alt="Product Image">
                   </td>
                   <td>{{ $data->payment_status }}</td>
                   <td>
                    @if ($data->status == 'in progress')
                    <span style="color: red;">{{ $data->status }}</span>
                @elseif ($data->status == 'On the Way')
                    <span style="color: skyblue;">{{ $data->status }}</span>
                @else
                    <span style="color: yellow;">{{ $data->status }}</span>
                @endif

                </td>
                   <td>
                       <a class="btn btn-danger" href="{{ url('on_the_way',$data->id) }}">On the Way</a>

                       <a class="btn btn-success" href="{{ url('delivered',$data->id) }}">Delivered</a>
                   </td>
                   <td >

                    <a class="btn btn-secondary" href="{{ url('print_pdf',$data->id) }}">Print Pdf</a>
                   </td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </table>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
</body>
</html>
