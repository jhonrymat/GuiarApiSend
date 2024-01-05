@extends('adminlte::page')

@section('title', 'Planes')

@section('content_header')
    <div class="row">
        <div class="col-md-2">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Atrás</a>
        </div>
        <div class="col-md-10 text-right">
            <h1>{{ $plan->nombre }}</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="pricing1 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h3 class="mt-3 font-weight-medium mb-1">Sé suscriptor de Guiar Go</h3>
                    <h6 class="subtitle">obtén acceso a una maravillosa herramienta para tu negocio</h6>
                    <p class="text-center">
                        has seleccionado el plan <strong>{{ $plan->nombre }}</strong> y una suscripción
                        <strong>{{ $plan->tipo }}</strong>
                        <a href="{{ url('/planes') }}" class="small">¿Desea ver otro planes?</a>
                    </p>
                </div>
            </div>
            <!-- Row  -->
            <div class="row mt-5">
                <!-- Column -->
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center card-shadow on-hover border-0 mb-4">
                        <div class="card-body font-14">
                            <h5 class="mt-3 mb-1 font-weight-medium">{{ $plan->nombre }}</h5>
                            <h6 class="subtitle font-weight-normal">For Team of 3-5 Members</h6>
                            <div class="pricing my-3">
                                <sup>$</sup>
                                <span class="monthly display-5">{{ $plan->precio }}</span>
                                @if ($plan->tipo == 'Mensual')
                                    <small class="monthly">/mo</small>
                                @else
                                    <small class="yearly">/yr</small>
                                @endif
                                <span class="d-block">Save <span class="font-weight-medium">$20</span> a Year</span>
                            </div>
                            <ul class="list-inline">
                                <li class="d-block py-2">Perfect of Small Team</li>
                                <li class="d-block py-2">Unlimited Invoices</li>
                                <li class="d-block py-2">Project Management</li>
                                <li class="d-block py-2">Project Management</li>
                                <li class="d-block py-2">&nbsp;</li>
                                <li class="d-block py-2">&nbsp;</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="card text-center card-shadow border-0 mb-4">
                        <div class="card-body font-14">
                            <h5 class="mt-3 mb-1 font-weight-medium">Seleciona un método de pago</h5>
                            <h6 class="subtitle font-weight-normal">Puede pagar con tarjeta ó a travez de Paypal</h6>
                            <ul class="nav nav-tabs nav-justified nav-pills" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link waves-effect waves-green active" id="home-tab" data-toggle="tab"
                                        href="#home" role="tab" aria-controls="home" aria-selected="true">Paypal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link waves-effect waves-green" id="profile-tab" data-toggle="tab"
                                        href="#profile" role="tab" aria-controls="profile"
                                        aria-selected="false">Otros</a>
                                </li>
                            </ul>
                            <div class="tab-content card mb-2" id="myTabContent">
                                <div class="tab-pane fade in show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-10 mx-auto text-center">
                                            <br>
                                            <div id="paypal-button-container"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">..f.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h3 class="mt-3 font-weight-medium mb-1">Esta a un paso de tomar la mejor decisión</h3>
                    <h6 class="subtitle">2024</h6>
                </div>
            </div>
        </div>
    </div>

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
    </style>
@stop

@section('js')
    <script>
        $(".pricing1 .onoffswitch-label").click(function() {
            $(".pricing1 .monthly, .pricing1 .yearly").toggle();
        });
    </script>
    <script
        src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&vault=true&intent=subscription">
    </script>
    <script>
        paypal.Buttons({
            createSubscription: function(data, actions) {
                return actions.subscription.create({
                    'plan_id': '{{ $plan->paypalId }}' // Creates the subscription
                });
            },
            onApprove: function(data, actions) {
                //fetch -> post -> verify
                const body = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    subscription_id: data.subscriptionID,
                    plan_id: {{ $plan->id }}
                };

                fetch('/paypal/suscripcion', {
                        method: 'POST', // or 'PUT'
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(body),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success){
                            alert('Te has suscripto con exito'); // Optional message given to subscriber
                            location.href = '/planes';
                        }
                    })
                    .catch(error => {
                        alert(error.message);
                    });
            }
        }).render('#paypal-button-container'); // Renders the PayPal button
    </script>
@stop
