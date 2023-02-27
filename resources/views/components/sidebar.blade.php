<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/"><img src="{{ url('/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item">
                            <a href="/admin" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="/admin/schools" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>All Schools</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="/admin/rooms" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>All Rooms</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="/logout" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>