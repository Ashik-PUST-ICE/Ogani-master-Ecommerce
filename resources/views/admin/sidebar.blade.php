<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div style="width: 90px; height: 90px; overflow: hidden;" class="avatar">
            <img src="{{ asset('admincss/img/ashik.png') }}" alt="..." class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
        </div>

        <div class="title">
          <h1 class="h5">Md.Ashikur Rahman</h1>
          <p>Laravel Developer</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li class="active"><a href="{{ url('admin/dashboard') }}">

                 <i class="icon-home"></i>Home </a></li>
              <li>
                <a href="{{ url('view_category') }}">
                    <i class="icon-grid"></i>Category </a>
            </li>

              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{ url('add_product') }}">Add Product</a></li>
                  <li><a href="{{ url('view_product') }}">View Product</a></li>

                </ul>
              </li>

              <li>
                <a href="{{ url('view_order') }}"> <i class="icon-grid"></i>Orders </a>
            </li>

      </ul>
    </nav>
