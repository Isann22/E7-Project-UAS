<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: rgb(57, 40, 159)">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('organizer.index') }}">
        <img src="{{ asset('img/logotajudin1.png') }}" width="70" alt="">
        <div class="sidebar-brand-text mx-3">Arena Access </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('organizer.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('organizer.index') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading ">
        Events
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('organizer.tournaments.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('organizer.tournaments.index') }}">
            <i class="fas fa-tag"></i>
            <span>Tournaments</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ request()->routeIs('organizer.tickets.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('organizer.tickets.index') }}">
            <i class="fas fa-ticket-alt"></i>
            <span>Tickets</span>
        </a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="d-flex  justify-content-center">
        <button class="rounded-circle border-0" id="sidebarToggle" style="position:fixed; bottom:0;"></button>
    </div>



</ul>
