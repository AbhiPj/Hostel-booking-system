
<div class="sidebar">
    <div class="logo-details">
{{--        <i class='bx bxl-c-plus-plus'></i>--}}
        <span style="padding-left: 20px" class="logo_name">{{ config('app.name', 'Laravel') }}</span>
    </div>
    <hr>

    <ul class="nav-links">

        <li>
            <a href="/home">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rooms.create') }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">View Rooms</span>
            </a>
        </li>

        <li>
            <a href="{{ route('customers.create') }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Check in</span>
            </a>
        </li>

        <li>
            <a href="/admin/customer/checkout">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Checkout</span>
            </a>
        </li>

        <li>
            <a href="/admin/customer/view">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Customers</span>
            </a>
        </li>

        <li>
            <a href="/admin/messages">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Messages</span>
            </a>
        </li>



        <li>
            <a href="{{ route('rooms.index') }}" >
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Add Rooms</span>
            </a>
        </li>


        <li>
            <a href="{{ route('roomType.create') }}">
                <i class='bx bx-box'></i>
                <span class="links_name">Add Roomtype</span>
            </a>
        </li>
        <li>
            <a href="{{ route('booking.index') }}">
                <i class='bx bx-list-ul'></i>
                <span class="links_name">Booking</span>
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
