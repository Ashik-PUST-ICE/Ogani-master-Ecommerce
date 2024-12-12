<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style type="text/css">
      input[type='text'] {
        width: 400px;
        height: 50px;
      }
      .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
      }

      .table_deg {
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top: 50px;
        width: 600px;
      }

      th {
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }

      td {
        color: white;
        padding: 10px;
        border: 1px solid skyblue;
      }

      .btn-danger {
        background-color: red;
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 5px;
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
          <h1 style="color: white">Add Category</h1>

          <div class="div_deg">
            <form action="{{ url('add_category') }}" method="post">
              @csrf
              <div>
                <input type="text" name="category" required>
                <input type="submit" class="btn btn-primary" value="Add Category">
              </div>
            </form>
          </div>

          <div>
            <table class="table_deg">
              <tr>
                <th>Category Name</th>
                <th>Edit Category Name</th>
                <th>Delete</th>
              </tr>
              @foreach($data as $category)

              <tr>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a class="btn btn-success" href="{{ url('edit_category',$category->id) }}">Edit</a>
                </td>
                <td>
                  <a class="btn-danger" onclick="confirmation(event)" href="
                  {{ url('delete_category', $category->id) }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>

        </div>
      </div>
    </div>

    <!-- JavaScript files-->
   @include('admin.js')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Flasher Toastr rendering -->
    {!! Flasher::render() !!}

  </body>
</html>
