<!-- Sidebar Toggle Navbar -->
<nav class="navbar navbar-expand bg-dark text-white px-3 d-flex justify-content-between align-items-center">
    <button id="sidebarToggle" class="btn btn-outline-light btn-sm">
        <i class="bi bi-list fs-4"></i>
    </button>
    <span class="fw-semibold">Veshoz Village</span>
</nav>

<!-- Sidebar -->
<aside id="appSidebar" class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand py-2 text-center">
        <a href="{{ url('/dashboard') }}" class="brand-link d-flex align-items-center justify-content-center">
            <img src="{{ asset('backend/dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                 class="brand-image opacity-75 shadow me-2" style="width: 30px; height: 30px;" />
            <span class="brand-text fw-light fs-6">Veshoz Village</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="true">

                <!-- Purchase Menu -->
                <li class="nav-item">
                    <a href="{{url('/purchase')}}" class="nav-link">
                        <i class="nav-icon bi bi-cart-check text-primary"></i>
                        <p>Purchase <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/purchase/create')}}" class="nav-link">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-card-list"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Manufacturing Menu -->
                <li class="nav-item">
                    <a href="{{url('/production')}}" class="nav-link">
                        <i class="nav-icon bi bi-building-fill-gear text-info"></i>
                        <p>Manufacturing <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/production/product/add') }}" class="nav-link">
                                <i class="nav-icon bi bi-bag"></i>
                                <p>Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-tags"></i>
                                <p>Raw Materials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-people nav-icon"></i>
                                <p>Production Batches</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-person-circle"></i>
                                <p>Costing</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-buildings"></i>
                                <p>Report</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Sales Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-graph-up-arrow text-success"></i>
                        <p>
                            Sales 
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-plus-circle"></i><p>Add New</p></a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-card-list"></i><p>List</p></a></li>
                    </ul>
                </li>

                <!-- HR & Payroll Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people text-purple"></i>
                        <p>HR & Payroll <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-plus-circle"></i><p>Add New</p></a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-card-list"></i><p>List</p></a></li>
                    </ul>
                </li>

                <!-- Accounts Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-calculator text-warning"></i>
                        <p>Accounts <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Add New</p></a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>List</p></a></li>
                    </ul>
                </li>

                <!-- Inventory Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-boxes text-secondary"></i>
                        <p>Inventory <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Add New</p></a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>List</p></a></li>
                    </ul>
                </li>

                <!-- Reports Menu -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-file-earmark-bar-graph text-cyan"></i>
                        <p>Reports <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Add New</p></a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>List</p></a></li>
                    </ul>
                </li>

                <!-- Settings Menu -->
                <li class="nav-item">
                    <a href="{{url('/settings')}}" class="nav-link">
                        <i class="nav-icon bi bi-sliders text-muted"></i>
                        <p>Settings <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{url('/settings/items-entry')}}" class="nav-link"><i class="nav-icon bi bi-bag"></i><p>Product Item Entry</p></a></li>
                        <li class="nav-item"><a href="{{url('/settings/category-entry')}}" class="nav-link"><i class="nav-icon bi bi-tags"></i><p>Category Entry</p></a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people nav-icon"></i><p>Customer Entry</p></a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-person-circle"></i><p>User Entry</p></a></li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon bi bi-buildings"></i><p>Company Profile</p></a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>


