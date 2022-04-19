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
{{--    <ul class="nav-links">--}}

{{--        <li>--}}
{{--            <a href="/home">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Dashboard</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('membershipDetails.index') }}">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Add membership Price</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('hostels.create') }}">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Add hostels</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('requestHostels.create') }}" >--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Hostel requests</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="{{ route('hostels.index') }}">--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name"> View Hostels</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="{{ route('featured.index') }}" >--}}
{{--                <i class='bx bx-grid-alt'></i>--}}
{{--                <span class="links_name">Featured Hostels</span>--}}
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
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('hostels.create') }}"> Add hostel </a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('requestHostels.create') }}">  Hostel requests </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('hostels.index') }}"> View hostels </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('featured.index') }}"> Featured hostels </a>
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

