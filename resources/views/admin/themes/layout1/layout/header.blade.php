<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{GetLanguage()}}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="{{GetLanguage()}}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{GetLanguage()}}" dir="{{GetDirection()}}">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    @php
        $daoBrandName = trans('orbscope.brand_name');
        $daoLegacyName = @GetSettings()->name;
        $daoPageTitle = (!empty($title) && trim($title) !== trim((string) $daoLegacyName)) ? $title : trans('orbscope.dashboard');
    @endphp
    <title>{{ $daoPageTitle }} || {{ $daoBrandName }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="theme-color" content="#07101b"/>
    <meta content="{{ trans('orbscope.brand_full_name') }}" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include(AdminCss())
    @include(AdminJs())

    @yield('css')
    @yield('js')


</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white dao-admin" lang="{{GetLanguage()}}">
<!-- BEGIN HEADER -->

<div class="page-wrapper">
    <!-- BEGIN HEADER -->

<div class="page-header navbar navbar-fixed-top dao-header">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">

        <!-- BEGIN LOGO -->
        <div class="page-logo dao-brand">
            <a href="{{url('/admin')}}" class="dao-brand-link" aria-label="{{ trans('orbscope.brand_full_name') }}">
                <img src="{{ asset('images/brand/logo-light.png') }}" alt="{{ trans('orbscope.brand_full_name') }}" class="dao-brand-logo" width="42" height="42" />
                <span class="dao-brand-text">
                    <span class="dao-brand-name">{{ trans('orbscope.brand_name') }}</span>
                    <span class="dao-brand-sub">{{ trans('orbscope.admin_portal') }}</span>
                </span>
            </a>
            <div class="menu-toggler sidebar-toggler" role="button" aria-label="Toggle sidebar">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse" aria-label="Toggle navigation">
            <span></span>
        </a>

        <!-- BEGIN PAGE TOP -->
        <div class="page-top">

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right dao-top-nav">

                    <li class="dao-lang-item">
                        @if(GetLanguage() == "ar")
                            <a class="dao-lang-pill" href="{{url(AdminPath().'/lang/en')}}" title="Switch to English">
                                <span class="dao-lang-opt is-inactive">EN</span>
                                <span class="dao-lang-sep">/</span>
                                <span class="dao-lang-opt is-active">عربي</span>
                            </a>
                        @else
                            <a class="dao-lang-pill" href="{{url(AdminPath().'/lang/ar')}}" title="التبديل إلى العربية">
                                <span class="dao-lang-opt is-active">EN</span>
                                <span class="dao-lang-sep">/</span>
                                <span class="dao-lang-opt is-inactive">عربي</span>
                            </a>
                        @endif
                    </li>

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dao-user-menu">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="dao-avatar-ring">
                                <img alt="{{ auth()->user()->name }}" class="img-circle" src="{{url('orbscope/admin')}}/user.png" />
                            </span>
                            <span class="username username-hide-on-mobile">{{ auth()->user()->name }}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{url(AdminPath().'/profile')}}">
                                    <i class="icon-user"></i> {{trans('orbscope.profile')}} </a>
                            </li>
                            <li>
                                <a href="{{url(AdminPath().'/logout')}}">
                                    <i class="icon-key"></i> {{trans('orbscope.logout')}} </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-quick-sidebar-toggler dao-logout-item">
                        <a href="{{url(AdminPath().'/logout')}}" class="dropdown-toggle dao-logout-btn" title="{{trans('orbscope.logout')}}" aria-label="{{trans('orbscope.logout')}}">
                            <i class="icon-logout"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->

        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->

<div class="page-container">

<!-- BEGIN SIDEBAR -->
