<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        body {
            background-color: blueviolet; /* Light background for contrast */
            font-family: Arial, sans-serif;
        }

        .page-header h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        form {
            background: #34495e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="number"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .current-image img {
            max-width: 20%;
            height: auto; /* Ensure the image maintains aspect ratio */
            border-radius: 4px;
        }

        .image-upload input[type="file"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
                <h2>Update Product</h2>
                <div class="div_deg">
                    <form action="{{ url('edit_product/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="{{ $data->title }}" required>
                        </div>

                        <div>
                            <label for="description">Description</label>
                            <textarea id="description" name="description" required>{{ $data->description }}</textarea>
                        </div>

                        <div>
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price" value="{{ $data->price }}" required>
                        </div>

                        <div>
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" value="{{ $data->quantity }}" required>
                        </div>

                        <div>
                            <label for="category">Category</label>
                            <select id="category" name="category" required>
                                <option value="{{ $data->category }}" selected>{{ $data->category }}</option>
                                <!-- Add more options as needed -->
                                @foreach($category as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="current-image">
                            <label>Current Image</label>
                            <img src="/products/{{ $data->image }}" alt="Product Image">
                        </div>

                        <div>
                            <label for="image">New Image (optional)</label>
                            <input type="file" id="image" name="image">
                        </div>

                        <div>
                            <input class="btn-success" type="submit" value="Update Product">
                        </div>
                    </form>
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
