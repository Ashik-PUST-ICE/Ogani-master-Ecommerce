<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #2C3E50; /* Dark background for contrast */
            font-family: Arial, sans-serif;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1 {
            color: #ecf0f1; /* Light color for title */
            text-align: center;
            font-size: 36px;
            margin-bottom: 30px;
        }

        label {
            display: inline-block;
            width: 250px;
            font-size: 18px !important;
            color: #ecf0f1 !important;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"], textarea, select, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #bdc3c7;
            background-color: #34495e; /* Input background color */
            color: #ecf0f1; /* Text color inside input fields */
        }

        input[type="text"]:focus, input[type="number"]:focus, textarea:focus, select:focus {
            outline: none;
            border: 1px solid #3498db; /* Border color on focus */
            background-color: #2C3E50;
        }

        textarea {
            height: 100px;
            resize: vertical; /* Allow vertical resizing */
        }

        .form-container {
            background-color: #34495e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Add shadow for a nice look */
            width: 600px;
        }

        button {
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .form-group {
            margin-bottom: 15px;
        }

    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>Add Product</h1>

                <div class="div_deg">
                    <div class="form-container">
                        <form action="{{ 'upload_product' }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Product Title</label>
                                <input type="text" name="title" required>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" required>
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="qty" required>
                            </div>

                            <div class="form-group">
                                <label>Product Category</label>

                                <select name="category" required>

                                    <option>Select a Option</option>

                                    @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">
                                        {{ $category->category_name }}</option>

                                    @endforeach

                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" required>
                            </div>

                            <button type="submit">Add Product</button>
                        </form>
                    </div>
                </div>

            </div>
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
