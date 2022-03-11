
<div class="sidebar">
    <div class="logo-details">
{{--        <i class='bx bxl-c-plus-plus'></i>--}}
        <span style="padding-left: 20px" class="logo_name">{{ config('app.name', 'Laravel') }}</span>

    </div>
    <ul class="nav-links">

        <li>
            <a href="/home" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('membershipDetails.index') }}" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Add membership Price</span>
            </a>
        </li>
        <li>
            <a href="{{ route('hostels.create') }}" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Add hostels</span>
            </a>
        </li>

        <li class="log_out">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
