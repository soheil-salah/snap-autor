<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Title -->
    @stack('title')

    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include('admin.includes.assets.styles')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <x-admin.navs.sidebar>
            <x-admin.navs.nav-small-cap title="Home" />
            <x-admin.navs.sidebar-item icon="home" title="Dashboard" route="admin.dashboard" />

            @if(Auth::guard('admin')->user()->author == null && Auth::guard('admin')->user()->editor == null)
            <x-admin.navs.nav-small-cap title="Users" />
            <x-admin.navs.sidebar-item icon="users" title="All Users" route="admin.user.all" />
            <x-admin.navs.sidebar-item icon="user-plus" title="Add New User" route="admin.user.create" />
            {{-- <x-admin.navs.sidebar-item icon="user-check" title="User Roles" route="admin.user.roles.all" /> --}}
            <x-admin.navs.sidebar-item icon="user-minus" title="Banned Users" route="admin.user.banned.all" />
            @endif

            <x-admin.navs.nav-small-cap title="Blogs" />
            @if(Auth::guard('admin')->user()->editor == null)
            <x-admin.navs.sidebar-item icon="category" title="Categories" route="admin.blog.category.all" />
            <x-admin.navs.sidebar-item icon="tags" title="Tags" route="admin.blog.tag.all" />
            <x-admin.navs.sidebar-item icon="article" title="Posts" route="admin.blog.post.all" />
            <x-admin.navs.sidebar-item icon="message-circle-2" title="Comments & Replies" />
            @else
            <x-admin.navs.sidebar-item icon="article" title="Posts" route="admin.blog.post.all" />
            @endif
            
            @if(Auth::guard('admin')->user()->author == null && Auth::guard('admin')->user()->editor == null)
            <x-admin.navs.nav-small-cap title="Meta Pages" />
            <x-admin.navs.sidebar-item icon="home" title="Home Page" />
            <x-admin.navs.sidebar-item icon="info-square-rounded" title="About Page" />
            <x-admin.navs.sidebar-item icon="phone-call" title="Contact Page" />
            @endif

            @if(Auth::guard('admin')->user()->author == null && Auth::guard('admin')->user()->editor == null)
            <x-admin.navs.nav-small-cap title="Email Notifications" />
            <x-admin.navs.sidebar-item icon="mail" title="Newsletters" />
            @endif

            {{-- <x-admin.navs.nav-small-cap title="Backups" />
            <x-admin.navs.sidebar-item icon="users" title="Blogs Backups" />
            <x-admin.navs.sidebar-item icon="users" title="User Backups" /> --}}
        </x-admin.navs.sidebar>
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!--  Header Start -->
            <x-admin.navs.navbar>
                <x-admin.navs.navbar-link title="Profile" subTitle="Account Settings" />
            </x-admin.navs.navbar>
            <!--  Header End -->

            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>

        <div class="dark-transparent sidebartoggler"></div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    @include('admin.includes.assets.scripts')
</body>
</html>
