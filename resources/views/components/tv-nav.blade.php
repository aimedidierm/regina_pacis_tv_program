<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/tv">
            <span class="ms-1 font-weight-bold text-white">Welcome TV Admin</span> <br>
            <span class="ms-1 font-weight-bold text-white">{{Auth::guard('tv')->user()->names}}</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('tv') ? 'bg-gradient-info' : '' }}" href="/tv">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('tv/customers') ? 'bg-gradient-info' : '' }}"
                    href="/tv/customers">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('tv/applications') ? 'bg-gradient-info' : '' }}"
                    href="/tv/applications">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">file_copy</i>
                    </div>
                    <span class="nav-link-text ms-1">All Applications</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('tv/package') ? 'bg-gradient-info' : '' }}"
                    href="/tv/package">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">paid</i>
                    </div>
                    <span class="nav-link-text ms-1">Price Package</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('tv/waiting') ? 'bg-gradient-info' : '' }}"
                    href="/tv/waiting">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">hourglass_bottom</i>
                    </div>
                    <span class="nav-link-text ms-1">Waiting for payment</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('tv/approved') ? 'bg-gradient-info' : '' }}"
                    href="/tv/approved">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">verified_user</i>
                    </div>
                    <span class="nav-link-text ms-1">Approved</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->is('tv/settings') ? 'bg-gradient-info' : '' }}"
                    href="/tv/settings">
                    <div
                        class="text-white text-center {{ request()->is('tv/settings') ? 'active' : '' }} me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="/logout">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>