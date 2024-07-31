<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid w-75 for-light"
                    src="{{ asset('assets/images/logo/login.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="fa fa-cog status_toggle middle sidebar-toggle"> </i>
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid"
                    style="width: 40px; text-align: center;" src="{{ asset('assets/images/logo/login.png') }}"
                    alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    {{-- <li class="sidebar-main-title">
                        <h6></h6>
                    </li> --}}
                    <li class="menu-box">
                        <ul>
                            @if(Auth::check() && Auth::user()->is_admin)
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i
                                            data-feather="server"></i><span>Data Master</span></a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{ route('car.index') }}">Mobil</a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                    href="{{ route('rentals.index') }}">
                                    <i data-feather="trending-up"></i><span>Peminjaman Mobil</span></a>
                                </li>
                            @endif
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('dashboard') }}">
                                <i data-feather="dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="{{ route('bookings.create') }}">
                                <i data-feather="trending-up"></i><span>Booking Mobil</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
