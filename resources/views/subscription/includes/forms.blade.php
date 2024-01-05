<div class="pricing1 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h3 class="mt-3 font-weight-medium mb-1">Elije el plan que más se adapte a tus necesidades</h3>
                <h6 class="subtitle">Ofrecemos 100% de satisfacción y garantía de devolución de dinero.</h6>
                <div class="switcher-box mt-4 d-flex align-items-center justify-content-center">
                    <span class="font-14 font-weight-medium">MENSUAL</span>
                    <div class="onoffswitch position-relative mx-2">
                        <input type="checkbox" name="onoffswitch1" id="myonoffswitch1" class="onoffswitch-checkbox d-none"
                            >
                        <label class="onoffswitch-label d-block overflow-hidden" for="myonoffswitch1">
                            <span class="onoffswitch-inner d-block"></span>
                            <span class="onoffswitch-switch d-block bg-white position-absolute"></span>
                        </label>
                    </div>
                    <span class="font-14 font-weight-medium">ANUAL</span>
                </div>
            </div>
        </div>
        <!-- Row  -->
        <div class="row mt-5">
            <!-- Column -->
            @foreach ($productos as $producto)
                <div class="col-lg-3 col-md-6">
                    <div class="card text-center card-shadow on-hover border-0 mb-4">
                        <div class="card-body font-14">
                            <h5 class="mt-3 mb-1 font-weight-medium">{{ $producto->nombre }}</h5>
                            @foreach ($planes as $plan)
                                @if ($producto->paypalProductoId == $plan->paypaProductolId && $plan->tipo == 'Mensual')
                                    <div class="pricing">
                                        <div class="monthly" id="monthly">
                                            <h6 class="subtitle font-weight-normal">For Team of 3-5 Members</h6>
                                            <div class="pricing my-3">
                                                <sup>$</sup>
                                                <span class="display-5">{{ $plan->precio }}</span>
                                                <small class="">/mo</small>
                                                <span class="d-block">Save <span class="font-weight-medium">$20</span> a
                                                    Year</span>
                                            </div>
                                            <ul class="list-inline">
                                                <li class="d-block py-2">Perfect of Small Team</li>
                                                <li class="d-block py-2">Unlimited Invoices</li>
                                                <li class="d-block py-2">Project Management</li>
                                                <li class="d-block py-2">&nbsp;</li>
                                                <li class="d-block py-2">&nbsp;</li>
                                            </ul>
                                            <div class="bottom-btn">
                                                <form method="GET" action="{{ route('suscripcion') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id" value="{{ $plan->id }}">
                                                    <button type="submit"
                                                        class="btn btn-success-gradiant btn-md text-white btn-block">Suscribirse</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($producto->paypalProductoId == $plan->paypaProductolId && $plan->tipo == 'Anual')
                                    <div class="pricing">
                                        <div class="yearly" id="yearly">
                                            <h6 class="subtitle font-weight-normal">For Team of 3-5 Members</h6>
                                            <div class="pricing my-3">
                                                <sup>$</sup>
                                                <span class="display-5">{{ $plan->precio }}</span>
                                                <small class="">/yr</small>
                                                <span class="d-block">Save <span class="font-weight-medium">$20</span> a
                                                    Year</span>
                                            </div>
                                            <ul class="list-inline">
                                                <li class="d-block py-2">Perfect of Small Team</li>
                                                <li class="d-block py-2">Unlimited Invoices</li>
                                                <li class="d-block py-2">Project Management</li>
                                                <li class="d-block py-2">&nbsp;</li>
                                                <li class="d-block py-2">&nbsp;</li>
                                            </ul>
                                            <div class="bottom-btn">
                                                <form method="GET" action="{{ route('suscripcion') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id" value="{{ $plan->id }}">
                                                    <button type="submit"
                                                        class="btn btn-success-gradiant btn-md text-white btn-block">Suscribirse</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-3 col-md-6">
                <div class="card text-center card-shadow on-hover border-0 mb-4">
                    <div class="card-body font-14">
                        <h5 class="mt-3 mb-1 font-weight-medium">Empresarial</h5>
                        <h6 class="subtitle font-weight-normal">For Team of 3-5 Members</h6>
                        <div class="pricing my-3">
                            <sup>$</sup>
                            <span class="display-5">29</span>
                            <small class="">/hola</small>
                            <span class="d-block">Save <span class="font-weight-medium">$20</span> a Year</span>
                        </div>
                        <ul class="list-inline">
                            <li class="d-block py-2">Perfect of Small Team</li>
                            <li class="d-block py-2">Unlimited Invoices</li>
                            <li class="d-block py-2">Project Management</li>
                            <li class="d-block py-2">&nbsp;</li>
                            <li class="d-block py-2">&nbsp;</li>
                        </ul>
                        <div class="bottom-btn">
                            <a class="btn btn-success-gradiant btn-md text-white btn-block"
                                href="#f1"><span>Suscribirse</span></a>
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
