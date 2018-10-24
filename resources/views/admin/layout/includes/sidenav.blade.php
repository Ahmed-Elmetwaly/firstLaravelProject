{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Products
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->

                <ul>
                    <li><a href="{{ Route('product.index') }}">Product</a></li>
                </ul>

                <ul>
                    <li><a href="{{ url('admin/product/create') }}">Add Product</a></li>
                </ul>

                
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Category
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->

                <ul>
                    <li><a href="{{ Route('category.index') }}">Category</a></li>
                </ul>
                
            </li>

            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Orders
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->

                <ul>
                    <li><a href="{{ url('admin/orders/pending') }}">Pending orders</a></li>
                    <li><a href="{{ url('admin/orders/delivered') }}">Delivered orders</a></li>
                    <li><a href="{{ url('admin/orders') }}">All orders</a></li>
                </ul>
                
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->