<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{GetLanguage()}}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{GetLanguage()}}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{GetLanguage()}}" dir="{{GetDirection()}}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>{{ trans('orbscope.login') }} || {{ trans('orbscope.brand_name') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="theme-color" content="#07101b" />
        <meta content="{{ @SettingsByLang('description',GetLanguage() ) }}" name="description" />
        <meta content="{{ @SettingsByLang('keywords',GetLanguage() ) }}" name="keywords" />
        <meta content="{{ trans('orbscope.brand_full_name') }}" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {!! Html::style('orbscope/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
        {!! Html::style('orbscope/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
        {!! Html::style('orbscope/admin/assets/global/css/components.min.css') !!}

        <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap/css/bootstrap{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{url('orbscope/admin')}}/assets/global/css/components{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{url('orbscope/admin')}}/assets/global/css/plugins{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css"/>
        @include(AdminTheme().'/login_color'.GetLangAdds())

        {!! Html::style('orbscope/admin/assets/global/plugins/select2/css/select2.min.css') !!}
        {!! Html::style('orbscope/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
        {!! Html::style('orbscope/admin/assets/global/plugins/bootstrap-sweetalert/sweetalert.css') !!}
        {!! Html::style('orbscope/admin/assets/global/custom.css') !!}

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300;400;500;600;700&family=Cairo:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">
        <link href="{{ asset('css/daralomran-theme.css') }}?v={{ file_exists(public_path('css/daralomran-theme.css')) ? filemtime(public_path('css/daralomran-theme.css')) : 1 }}" rel="stylesheet" type="text/css"/>

        <link rel="shortcut icon" href="{{ asset('images/brand/favicon.ico') }}" />
        <link rel="icon" type="image/png" href="{{ asset('images/brand/favicon.png') }}" />
    </head>
    <!-- END HEAD -->

    <body class="login dao-login">
        <div class="dao-login-shell">
            <!-- BEGIN LOGO -->
            <div class="dao-login-brand">
                <a href="{{url(AdminPath())}}" aria-label="{{ trans('orbscope.brand_full_name') }}">
                    <img src="{{ asset('images/brand/logo-light.png') }}" alt="{{ trans('orbscope.brand_full_name') }}" />
                </a>
                <div class="dao-login-brand-eyebrow">{{ trans('orbscope.brand_eyebrow') }}</div>
            </div>
            <!-- END LOGO -->

            <!-- BEGIN LOGIN -->
            <div class="content dao-login-card">
                @if (count($errors) > 0)
                    <div class="alert alert-danger" dir="{{GetDirection()}}">
                        <ul style="margin: 0; padding-inline-start: 18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- BEGIN LOGIN FORM -->
                <form class="login-form" method="post">
                    {!! csrf_field() !!}
                    <div class="dao-login-card-head">
                        <div>
                            <h3 class="form-title">{{trans('orbscope.login')}}</h3>
                            <p class="dao-login-subtitle">{{ trans('orbscope.login_subtitle') }}</p>
                        </div>
                        <a class="dao-login-lang" href="@if (GetLanguage() == 'en') {{url('/lang/ar')}} @else {{url('/lang/en')}} @endif">
                            <span class="{{ GetLanguage() == 'en' ? 'is-active' : 'is-inactive' }}">EN</span>
                            <span>/</span>
                            <span class="{{ GetLanguage() == 'ar' ? 'is-active' : 'is-inactive' }}">عربي</span>
                        </a>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="dao-login-label" for="login_email">{{trans('orbscope.email')}}</label>
                        <input id="login_email" class="form-control form-control-solid" type="email" autocomplete="email" value="{{ old('email') }}" placeholder="{{trans('orbscope.email')}}" name="email" />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="dao-login-label" for="login_password">{{trans('orbscope.password')}}</label>
                        <input id="login_password" class="form-control form-control-solid" type="password" autocomplete="current-password" placeholder="{{trans('orbscope.password')}}" name="password" />
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn dao-login-submit uppercase">{{trans('orbscope.login')}}</button>
                    </div>
                </form>
                <!-- END LOGIN FORM -->

                <!-- BEGIN FORGOT PASSWORD FORM -->
                <form class="forget-form" action="{{url('admin/forget-password')}}" method="post">
                    {{ csrf_field() }}
                    <h3 class="form-title">{{trans('orbscope.forget_password')}}</h3>
                    <p class="dao-login-subtitle" style="margin-bottom: 18px;"> {{trans('orbscope.forget_message')}} </p>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="dao-login-label" for="forget_email">{{trans('orbscope.email')}}</label>
                        <input id="forget_email" class="form-control placeholder-no-fix" type="email" autocomplete="email" placeholder="{{trans('orbscope.email')}}" name="email" />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-actions" style="display: flex; gap: 10px; justify-content: space-between;">
                        <button type="button" id="back-btn" class="btn default dao-btn-outline">{{trans('orbscope.back')}}</button>
                        <button type="submit" class="btn dao-btn-gold uppercase">{{trans('orbscope.submit_password')}}</button>
                    </div>
                </form>
                <!-- END FORGOT PASSWORD FORM -->
            </div>

            <div class="copyright dao-login-copyright">
                &copy; {{ date('Y') }} <strong>{{ trans('orbscope.brand_full_name') }}</strong> &middot; {{ trans('orbscope.all_rights_reserved') }}
            </div>
        </div>

        <!--[if lt IE 9]>
        {!! Html::script('orbscope/admin/assets/global/plugins/respond.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/excanvas.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/ie8.fix.min.js') !!}
        <![endif]-->

        <!-- BEGIN CORE PLUGINS -->
        {!! Html::script('orbscope/admin/assets/global/plugins/jquery.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/js.cookie.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/jquery.blockui.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::script('orbscope/admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/select2/js/select2.full.min.js') !!}
        {!! Html::script('orbscope/admin/assets/global/scripts/app.min.js') !!}
        {!! Html::script('orbscope/admin/assets/pages/scripts/login.js') !!}
        {!! Html::script('orbscope/admin/assets/global/plugins/bootstrap-sweetalert/sweetalert.js') !!}
        <!-- END PAGE LEVEL SCRIPTS -->

        <script>
            @if(session()->has('success'))
                swal({
                    title                  : "{{trans('orbscope.success')}}",
                    text                   : "{{session()->get('success') }}",
                    type                   : "success",
                    customClass            : "sweet-alert showSweetAlert",
                    confirmButtonClass     : "btn-success",
                    cancelButtonClass      : "btn-success",
                    closeOnCancel          : true,
                    confirmButtonText      : "{{trans('orbscope.close')}}",
                    cancelButtonText       : "{{trans('orbscope.close')}}",
                    timer                  : "4000"
                });
            @endif
            @if(session()->has('info'))
                swal({
                title                  : "{{trans('orbscope.info')}}",
                text                   : "{{session()->get('info') }}",
                type                   : "info",
                customClass            : "sweet-alert showSweetAlert",
                confirmButtonClass     : "btn-info",
                cancelButtonClass      : "btn-info",
                closeOnCancel          : true,
                confirmButtonText      : "{{trans('orbscope.close')}}",
                cancelButtonText       : "{{trans('orbscope.close')}}",
                timer                  : "4000"
            });
            @endif
            @if(session()->has('warning'))
                swal({
                title                  : "{{trans('orbscope.warning')}}",
                text                   : "{{session()->get('warning') }}",
                type                   : "warning",
                customClass            : "sweet-alert showSweetAlert",
                confirmButtonClass     : "btn-warning",
                cancelButtonClass      : "btn-warning",
                closeOnCancel          : true,
                confirmButtonText      : "{{trans('orbscope.close')}}",
                cancelButtonText       : "{{trans('orbscope.close')}}",
                timer                  : "4000"
            });
            @endif
            @if(session()->has('error'))
                swal({
                    title                  : "{{trans('orbscope.error')}}",
                    text                   : "{{session()->get('error') }}",
                    type                   : "error",
                    customClass            : "sweet-alert showSweetAlert",
                    confirmButtonClass     : "btn-danger",
                    cancelButtonClass      : "btn-danger",
                    closeOnCancel          : true,
                    confirmButtonText      : "{{trans('orbscope.close')}}",
                    cancelButtonText       : "{{trans('orbscope.close')}}",
                    timer                  : "4000"
                });
            @endif
        </script>
    </body>

</html>
