@extends('layouts.app')

@section('sidebar')
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-leaf"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PROJECT 1</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>




    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        USER
    </div>
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fa fa-user"></i>
            <span>Profile</span></a>
    </li>


    <div class="sidebar-heading">
        ADMIN
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/datauser">
            <i class="fa fa-database"></i>
            <span>DATABASE</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
@endsection