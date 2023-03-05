<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            @if (Auth::user())
            @if (Auth::user()->role_id == 1)
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                </ul>
            </li>
            <li class="nav-label">Data Master</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-people menu-icon"></i> <span class="nav-text">User</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.customer') }}">Customer</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Concert</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.concert') }}">Concert</a></li>
                    <li><a href="{{ route('admin.band-playing') }}">Band Playing</a></li>
                    <li><a href="{{ route('admin.band') }}">Band</a></li>
                </ul>
            </li>
            <li class="nav-label">Transaction</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-chart menu-icon"></i><span class="nav-text">Transaction</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.transaction') }}">Transaction</a></li>
                    <li><a href="{{ route('admin.verify-transaction') }}">Verify Transaction</a></li>
                    <li><a href="{{ route('admin.ticket') }}">Ticket</a></li>
                </ul>
            </li>
            {{-- <li class="nav-label">Report</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Report</span>
                </a>
                <ul aria-expanded="false">

                    <li><a href="{{ route('admin.report.ticket') }}">Ticket</a></li>
                    <li><a href="{{ route('admin.report.transaction') }}">Transaction</a></li>
                </ul>
            </li> --}}

            @elseif (Auth::user()->role_id == 2)
            <li class="nav-label">My</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-ecommerce-ticket menu-icon"></i><span class="nav-text">My Ticket</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('customer.transaction') }}">My Transaction</a></li>
                    <li><a href="{{ route('customer.ticket') }}">My Ticket</a></li>
                </ul>
            </li>
            @endif
            @endif
        </ul>
    </div>
</div>
