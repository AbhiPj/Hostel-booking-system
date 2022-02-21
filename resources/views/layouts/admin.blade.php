<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{--<link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/adminStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!-- CSRF Token -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    </link>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    </link>

</head>


<body>
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">{{ config('app.name', 'Laravel') }}</span>

    </div>
    <ul class="nav-links">

        <li>
            <a href="/home" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rooms.create') }}" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">View Rooms</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rooms.index') }}" class="active">
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
            <span class="dropdown-btn">Dropdown
                <i class="fa fa-caret-down"></i>
            </span>
            <div class="dropdown-container">
                <ul>
                    <li>
                        <a href="#">Link 1</a>
                    </li>
                    <li>
                        <a href="#">Link 1</a>
                    </li>
                </ul>
            </div>
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
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
        </div>
{{--        <div class="search-box">--}}
{{--            <input type="text" placeholder="Search...">--}}
{{--            <i class='bx bx-search'></i>--}}
{{--        </div>--}}
{{--        <div class="profile-details">--}}
{{--            <!--<img src="images/profile.jpg" alt="">-->--}}
{{--            <span class="admin_name">Prem Shahi</span>--}}
{{--            <i class='bx bx-chevron-down'></i>--}}
{{--        </div>--}}
    </nav>

    <main>
    </main>
    <div class="home-content">

        @yield('content')


    </div>
</section>

<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>
<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        $("#example").DataTable({
            responsive: {
                details: {
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return col.hidden
                                ? '<tr data-dt-row="' +
                                col.rowIndex +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                "<td>" +
                                col.title +
                                ":" +
                                "</td> " +
                                "<td>" +
                                col.data +
                                "</td>" +
                                "</tr>"
                                : "";
                        }).join("");

                        return data ? $("<table/>").append(data) : false;
                    },
                },
            },
        });
    });
</script>

</body>
</html>
