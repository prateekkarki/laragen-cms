 <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
            <a href="{{ route('backend.dashboard') }}" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                <li><a class="nav-link" href="/">Ecommerce Dashboard</a></li>
            </ul>
        </li>
        <li class="menu-header">Modules</li>

		{{-- Main Menu --}}
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> ProductExtraSauces </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.product_extra_sauces.create") }}"> Add new ProductExtraSauces</a></li>
                        <li><a class="nav-link" href="{{ route("backend.product_extra_sauces.index") }}">All ProductExtraSauces</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> ProductRealFields </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.product_real_fields.create") }}"> Add new ProductRealFields</a></li>
                        <li><a class="nav-link" href="{{ route("backend.product_real_fields.index") }}">All ProductRealFields</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Products </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.products.create") }}"> Add new Products</a></li>
                        <li><a class="nav-link" href="{{ route("backend.products.index") }}">All Products</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Extras </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.extras.create") }}"> Add new Extras</a></li>
                        <li><a class="nav-link" href="{{ route("backend.extras.index") }}">All Extras</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Categories </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.categories.create") }}"> Add new Categories</a></li>
                        <li><a class="nav-link" href="{{ route("backend.categories.index") }}">All Categories</a></li>
                    </ul>
                </li>

        
        
        
        <li class="menu-header">System</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
            <ul class="dropdown-menu">
                <li><a href="">Profile</a></li>
                <li><a href="">Change Password</a></li>
            </ul>
        </li>
		<li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Users</span></a>
            <ul class="dropdown-menu">
                <li><a href="">Add new User</a></li>
                <li><a href="">User Permissions</a></li>
            </ul>
        </li>
		<li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Notifications</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="errors-503.html">503</a></li>
                <li><a class="nav-link" href="errors-403.html">403</a></li>
                <li><a class="nav-link" href="errors-404.html">404</a></li>
                <li><a class="nav-link" href="errors-500.html">500</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>System Logs</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="errors-503.html">503</a></li>
                <li><a class="nav-link" href="errors-403.html">403</a></li>
                <li><a class="nav-link" href="errors-404.html">404</a></li>
                <li><a class="nav-link" href="errors-500.html">500</a></li>
            </ul>
        </li>
        
        
    </ul>