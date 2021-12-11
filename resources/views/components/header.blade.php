<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('assets/ckeditor/contents.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />

    <x-SeoMetaTags />

</head>

<body>
    <div class="container mt-0 mt-md-5">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">
                    <img src="{{asset('assets/image/logo.png')}}" alt="" width="50" height="50" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::current()->uri() == '/' || request()->segment(1) == 'category') ? 'active' : '' }}" aria-current="page" href="{{url('./')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::current()->uri() == 'categories') ? 'active' : '' }}" href="{{url('categories')}}">Categories</a>
                        </li>
                    </ul>
                    <form class="d-flex search" action="{{url('/')}}">
                        <input class="form-control" type="search" name="search" placeholder="Search"
                            aria-label="Search" required />
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                    <img class="nav-item" id="theme_Mode" height="30" src="{{asset('assets/image/moon.png')}}" alt="">
                </div>
            </div>
        </nav>
        <!-- Navbar End -->