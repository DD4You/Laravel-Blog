<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dd4you-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.min.css') }}">

    <title>Dashboard</title>
</head>

<body>
    {{-- <div class="theme-settings">
        <div class="button">
            <span class="dd-icon dd-settings"></span>
        </div>
        <!-- <div class="panel">
            <h5>Style</h5>
            <div>
                <span>Light</span> | <span>Dark</span>
            </div>
        </div> -->
    </div> --}}
    <div class="wrapper">
        <aside>
            <div class="user_info">
                <h5 class="mb-0">{{ $name }}</h5>
                <p>{{ $email }}</p>
            </div>
            <ul class="mt-4">
                <li class="{{ request()->segment(2) == 'dashboard' ? 'active' : '' }}"><a
                        href="{{ url('admin/dashboard') }}"><i class="dd-icon dd-dashboard"></i>
                        <span>Dashboard</span></a></li>
                <li class="{{ request()->segment(2) == 'categories' ? 'active' : '' }}"><a
                        href="{{ url('admin/categories') }}"><i class="dd-icon dd-category"></i>
                        <span>Category</span></a></li>
                <li class="{{ request()->segment(2) == 'posts' ? 'active' : '' }}"><a
                        href="{{ url('admin/posts') }}"><i class="dd-icon dd-post"></i> <span>Posts</span></a></li>
            </ul>

            <a href="{{ route('admin.logout') }}" class="logout"><i class="dd-icon dd-logout"></i>
                <span>Logout</span></a>
        </aside>
