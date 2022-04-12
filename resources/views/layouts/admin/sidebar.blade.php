<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){

            element.addEventListener('click', function (e) {

                let nextEl = element.nextElementSibling;
                let parentEl  = element.parentElement;

                if(nextEl) {
                    e.preventDefault();
                    let mycollapse = new bootstrap.Collapse(nextEl);

                    if(nextEl.classList.contains('show')){
                        mycollapse.hide();
                    } else {
                        mycollapse.show();
                        // find other submenus with class=show
                        var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                        // if it exists, then close all of them
                        if(opened_submenu){
                            new bootstrap.Collapse(opened_submenu);
                        }
                    }
                }
            }); // addEventListener
        }) // forEach
    });
</script>


{{--<div class="sidebar">--}}
{{--    <div class="logo-details">--}}
{{--        <i class='bx bxl-c-plus-plus'></i>--}}
{{--        <span style="padding-left: 20px" class="logo_name">{{ config('app.name', 'Laravel') }}</span>--}}
{{--    </div>--}}
{{--    <hr>--}}

{{--    <ul class="nav-links">--}}

{{--        <li>--}}
{{--            <a href="/home">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Dashboard</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('rooms.create') }}">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">View Rooms</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{ route('customers.create') }}">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Check in</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="/admin/customer/checkout">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Checkout</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="/admin/customer/view">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Customers</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="/admin/messages">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Messages</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="/admin/appointments">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Appointments</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="/admin/requestAppointment">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">View appointment requests</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{ route('rooms.index') }}" >--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Add Rooms</span>--}}
{{--            </a>--}}
{{--        </li>--}}


{{--        <li>--}}
{{--            <a href="{{ route('roomType.create') }}">--}}
{{--                <i class='bx bx-box'></i>--}}
{{--                <span class="links_name">Add Roomtype</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('booking.index') }}">--}}
{{--                <i class='bx bx-list-ul'></i>--}}
{{--                <span class="links_name">Booking</span>--}}
{{--            </a>--}}
{{--        </li>--}}


{{--        <li class="log_out">--}}
{{--            <a href="{{ route('logout') }}" onclick="event.preventDefault();--}}
{{--                document.getElementById('logout-form').submit();">--}}
{{--                <i class='bx bx-log-out'></i>--}}
{{--                <span class="links_name">Log out</span>--}}
{{--            </a>--}}
{{--            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                @csrf--}}
{{--            </form>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</div>--}}
<nav class="sidebar">
    <ul class="nav flex-column" id="nav_accordion">
            <div class="logo-details">
                <span style="padding-left: 20px" class="logo_name">{{ config('app.name', 'Laravel') }}</span>
            </div>
            <hr>
        <li class="nav-item">
            <a class="nav-link" href="/home"> Dashboard </a>
        </li>
        <li class="nav-item has-submenu">

            <a class="nav-link" href="#"> Rooms
                <p>⯆</p>
            </a>
            <ul class="submenu collapse">
                <li><a class="nav-link" href="{{ route('rooms.create') }}">View rooms </a></li>
                <li><a class="nav-link" href="{{ route('rooms.index') }}">Add rooms </a></li>
                <li><a class="nav-link" href="{{ route('roomType.create') }}">Add room type </a></li>

            </ul>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link" href="#"> Customer
                <p>⯆</p>
            </a>
            <ul class="submenu collapse">
                <li><a class="nav-link" href="/admin/customer/view">Customers </a></li>
                <li><a class="nav-link" href="{{ route('customers.create') }}">Check-in </a></li>
                <li><a class="nav-link" href="/admin/customer/checkout">Check-out </a></li>
            </ul>
        </li>
        <li class="nav-item has-submenu">
            <a class="nav-link" href="#"> Appointments
                <p>⯆</p>
            </a>
            <ul class="submenu collapse">
                <li><a class="nav-link" href="/admin/appointments">Appointments</a></li>
                <li><a class="nav-link" href="/admin/requestAppointment">View appointment requests </a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('booking.index') }}"> Booking </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/messages"> Messages </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               Log out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>

<style>
    .nav-link{
     color: white;
    }

    .nav-item{
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        /*align-items: center;*/
    }

    .nav-item a{
        display: flex;
        justify-content: space-between;
    }
    .sidebar li .submenu{
        list-style: none;
        margin: 0;
        padding: 0;
        padding-left: 1rem;
        padding-right: 1rem;
    }
</style>
