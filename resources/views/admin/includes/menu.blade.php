<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('/') }}admin/assets/images/logo.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{ asset('/') }}admin/assets/images/logo_sm.png" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('/') }}admin/assets/images/logo-dark.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{ asset('/') }}admin/assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">Dashboard</a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                    <i class="uil uil-tachometer-fast"></i>
                    <span> Course Module</span>
                </a>
                <div class="collapse" id="sidebarCrm">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('course-categories.index') }}">Course Category</a>
                        </li>
                        <li>
                            <a href="{{ route('course-sub-categories.index') }}">Course Sub Category</a>
                        </li>
                        <li>
                            <a href="{{ route('courses.index') }}">Course</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Slider Module </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Add Slider</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Manage Slider</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Contact Module </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-email-inbox.html">Manage Contact</a>
                        </li>
                        <li>
                            <a href="apps-email-read.html">Send Mail</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('manage-enroll') }}" class="side-nav-link"><i class="uil-windsock"></i> Enroll Module</a>
            </li>
        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
