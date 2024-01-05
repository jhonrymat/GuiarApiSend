@extends('adminlte::page')

@section('title', 'Planes')

@section('content_header')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
        </div>
        <div class="col-md-10 text-right">
            <h1>Planes</h1>
        </div>
    </div>
@stop

@section('content')
    @if(session('notification'))
        <div class="card text-white bg-danger mb-3 text-center">
            <div class="card-body">
                <p class="mb-0">{{ session('notification') }}</p>
            </div>
        </div>
    @endif
    @if ($isPlan)
        @include('subscription.includes.active')
    @else
        @include('subscription.includes.forms')
    @endif
@stop

@section('css')
    <style>
        @import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800);

        .pricing1 {
            font-family: "Montserrat", sans-serif;
            color: #8d97ad;
            font-weight: 300;
        }

        .pricing1 h1,
        .pricing1 h2,
        .pricing1 h3,
        .pricing1 h4,
        .pricing1 h5,
        .pricing1 h6 {
            color: #3e4555;
        }

        .pricing1 .font-weight-medium {
            font-weight: 500;
        }

        .pricing1 .bg-light {
            background-color: #f4f8fa !important;
        }

        .pricing1 .subtitle {
            color: #8d97ad;
            line-height: 24px;
            font-size: 14px;
        }

        .pricing1 .font-14 {
            font-size: 14px;
        }

        .pricing1 h5 {
            line-height: 22px;
            font-size: 18px;
        }

        .pricing1 .card.card-shadow {
            -webkit-box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
            box-shadow: 0px 0px 30px rgba(115, 128, 157, 0.1);
        }

        .pricing1 .on-hover {
            -webkit-transition: 0.1s;
            -o-transition: 0.1s;
            transition: 0.1s;
        }

        .pricing1 .on-hover:hover {
            -ms-transform: scale(1.05);
            transform: scale(1.05);
            -webkit-transform: scale(1.05);
            -webkit-font-smoothing: antialiased;
        }

        .pricing1 .btn-success-gradiant {
            background: #2cdd9b;
            background: -webkit-linear-gradient(legacy-direction(to right), #2cdd9b 0%, #1dc8cc 100%);
            background: -webkit-gradient(linear, left top, right top, from(#2cdd9b), to(#1dc8cc));
            background: -webkit-linear-gradient(left, #2cdd9b 0%, #1dc8cc 100%);
            background: -o-linear-gradient(left, #2cdd9b 0%, #1dc8cc 100%);
            background: linear-gradient(to right, #2cdd9b 0%, #1dc8cc 100%);
        }

        .pricing1 .btn-success-gradiant:hover {
            background: #1dc8cc;
            background: -webkit-linear-gradient(legacy-direction(to right), #1dc8cc 0%, #2cdd9b 100%);
            background: -webkit-gradient(linear, left top, right top, from(#1dc8cc), to(#2cdd9b));
            background: -webkit-linear-gradient(left, #1dc8cc 0%, #2cdd9b 100%);
            background: -o-linear-gradient(left, #1dc8cc 0%, #2cdd9b 100%);
            background: linear-gradient(to right, #1dc8cc 0%, #2cdd9b 100%);
        }

        .pricing1 .btn-danger-gradiant {
            background: #ff4d7e;
            background: -webkit-linear-gradient(legacy-direction(to right), #ff4d7e 0%, #ff6a5b 100%);
            background: -webkit-gradient(linear, left top, right top, from(#ff4d7e), to(#ff6a5b));
            background: -webkit-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
            background: -o-linear-gradient(left, #ff4d7e 0%, #ff6a5b 100%);
            background: linear-gradient(to right, #ff4d7e 0%, #ff6a5b 100%);
        }

        .pricing1 .btn-danger-gradiant:hover {
            background: #ff6a5b;
            background: -webkit-linear-gradient(legacy-direction(to right), #ff6a5b 0%, #ff4d7e 100%);
            background: -webkit-gradient(linear, left top, right top, from(#ff6a5b), to(#ff4d7e));
            background: -webkit-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
            background: -o-linear-gradient(left, #ff6a5b 0%, #ff4d7e 100%);
            background: linear-gradient(to right, #ff6a5b 0%, #ff4d7e 100%);
        }

        .pricing1 .btn-md {
            padding: 15px 30px;
            font-size: 16px;
        }

        .pricing1 .onoffswitch {
            width: 70px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            margin: 0 auto;
        }

        .pricing1 .onoffswitch-label {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 20px;
        }

        .pricing1 .onoffswitch-inner {
            width: 200%;
            margin-left: -100%;
            -webkit-transition: margin 0.3s ease-in 0s;
            -o-transition: margin 0.3s ease-in 0s;
            transition: margin 0.3s ease-in 0s;
        }

        .pricing1 .onoffswitch-inner::before,
        .pricing1 .onoffswitch-inner::after {
            display: block;
            float: left;
            width: 50%;
            height: 30px;
            padding: 0;
            line-height: 30px;
            font-size: 14px;
            color: white;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .pricing1 .onoffswitch-inner::before {
            content: "";
            padding-right: 27px;
            background-color: #2cdd9b;
            color: #FFFFFF;
        }

        .pricing1 .onoffswitch-inner::after {
            content: "";
            padding-right: 24px;
            background-color: #3e4555;
            color: #999999;
            text-align: right;
        }

        .pricing1 .onoffswitch-switch {
            width: 23px;
            margin: 6px;
            height: 23px;
            top: -1px;
            bottom: 0;
            right: 35px;
            border-radius: 20px;
            -webkit-transition: all 0.3s ease-in 0s;
            -o-transition: all 0.3s ease-in 0s;
            transition: all 0.3s ease-in 0s;
        }

        .pricing1 .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-inner {
            margin-left: 0;
        }

        .pricing1 .onoffswitch-checkbox:checked+.onoffswitch-label .onoffswitch-switch {
            right: 0px;
        }

        .pricing1 .price-badge {
            top: -13px;
            left: 0;
            right: 0;
            width: 100px;
            margin: 0 auto;
        }

        .pricing1 .badge-inverse {
            background-color: #3e4555;
        }

        .pricing1 .display-5 {
            font-size: 3rem;
            color: #263238;
        }

        .pricing1 .pricing sup {
            font-size: 18px;
            top: -20px;
        }

        .pricing1 .pricing .yearly {
            display: none;
        }

        .custom-margin-right {
            margin-right: 8px;
            /* Puedes ajustar el valor según tus necesidades */
        }
    </style>
@stop

@section('js')
    <script>
        $(".pricing1 .onoffswitch-label").click(function() {
            $(".pricing1 .monthly, .pricing1 .yearly").toggle();
        });
    </script>
@stop
