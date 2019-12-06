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
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Settings </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.settings.create") }}"> Add new Settings</a></li>
                        <li><a class="nav-link" href="{{ route("backend.settings.index") }}">All Settings</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Employees </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.employees.create") }}"> Add new Employees</a></li>
                        <li><a class="nav-link" href="{{ route("backend.employees.index") }}">All Employees</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Parkings </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.parkings.create") }}"> Add new Parkings</a></li>
                        <li><a class="nav-link" href="{{ route("backend.parkings.index") }}">All Parkings</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Bookings </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.bookings.create") }}"> Add new Bookings</a></li>
                        <li><a class="nav-link" href="{{ route("backend.bookings.index") }}">All Bookings</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> VehicleTypes </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.vehicle_types.create") }}"> Add new VehicleTypes</a></li>
                        <li><a class="nav-link" href="{{ route("backend.vehicle_types.index") }}">All VehicleTypes</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> LocationSubLocations </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.location_sub_locations.create") }}"> Add new LocationSubLocations</a></li>
                        <li><a class="nav-link" href="{{ route("backend.location_sub_locations.index") }}">All LocationSubLocations</a></li>
                    </ul>
                </li>
<li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Locations </span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route("backend.locations.create") }}"> Add new Locations</a></li>
                        <li><a class="nav-link" href="{{ route("backend.locations.index") }}">All Locations</a></li>
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