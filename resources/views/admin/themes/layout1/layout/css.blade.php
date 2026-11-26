
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/pace/themes/pace-theme-flash{{GetLangAdds()}}.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{url('orbscope/admin')}}/assets/global/plugins/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"/>

    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap/css/bootstrap{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/css/components-md{{GetLangAdds()}}.min.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="{{url('orbscope/admin')}}/assets/global/css/plugins-md{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css"/>


    <link href="{{url('orbscope/admin')}}/assets/layouts/layout/css/layout{{GetLangAdds()}}.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('orbscope/admin')}}/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{url('orbscope/admin')}}/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    {!! Html::style('orbscope/admin/assets/global/plugins/bootstrap-sweetalert/sweetalert.css') !!}
    {!! Html::style('orbscope/admin/assets/global/custom.css') !!}
    <link rel="shortcut icon" href="{{ asset('images/brand/favicon.ico') }}"/>
    <link rel="icon" type="image/png" href="{{ asset('images/brand/favicon.png') }}"/>
    <link rel="stylesheet" href="{{url('orbscope/admin')}}/magnific-popup/magnific-popup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@300;400;500;600;700&family=Cairo:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/daralomran-theme.css') }}?v={{ file_exists(public_path('css/daralomran-theme.css')) ? filemtime(public_path('css/daralomran-theme.css')) : 1 }}" rel="stylesheet" type="text/css"/>

    <style>
    .special-image {
        filter: gray; /* IE6-9 */
        -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
        -webkit-box-shadow: 1px 1px 5px #777;
        -moz-box-shadow: 1px 1px 5px #777;
        box-shadow: 1px 1px 3px #777;
        margin-bottom:20px;
        opacity: 0.8;
    }



    .special-image:hover {
        filter: none; /* IE6-9 */
        -webkit-filter: grayscale(0); /* Google Chrome, Safari 6+ & Opera 15+ */
        transition: all 0.5s ease-in-out;
        opacity: 1;
    }
    </style>
