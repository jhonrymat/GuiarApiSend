<div class="pricing1 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h3 class="mt-3 font-weight-medium mb-1">Ya te encuentras suscrito!</h3>
                <h6 class="subtitle">Cuentas con acceso a esta maravillosa herramienta para tu negocio</h6>
                <p class="text-center">
                    Actualmente te encuentras suscrito al plan <strong>{{ $searchPlan->nombre }}</strong> ,
                    <strong>{{ $searchPlan->tipo }}</strong>
                </p>
            </div>
        </div>
        <!-- Row  -->
        <div class="row mt-5">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card text-center card-shadow on-hover border-0 mb-4">
                    <div class="card-body font-14">
                        <h5 class="mt-3 mb-1 font-weight-medium">{{ $searchPlan->nombre }}</h5>
                        <h6 class="subtitle font-weight-normal">For Team of 3-5 Members</h6>
                        <div class="pricing my-3">
                            <sup>$</sup>
                            {{-- Precio de plan --}}
                            <span class="monthly display-5">{{ $searchPlan->precio }}</span>
                            {{-- $plan->tipo == 'Mensual' --}}
                            @if ($searchPlan->tipo == 'Mensual')
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
                        <h5 class="mt-3 mb-1 font-weight-medium">Detalles de tu suscripción</h5>
                        <h6 class="subtitle font-weight-normal mb-4">Nombre se suscrición</h6>
                        <dl class="row mb-4">
                            <dt class="col-sm-6">Fecha de inicio:</dt>
                            <dd class="col-sm-6 mb-4">{{ $lastSubscription->started_at }}</dd>
                            @if ($lastSubscription->renewal)
                                <dt class="col-sm-6">Próxima fecha de facturación:</dt>
                                <dd class="col-sm-6">{{ $lastSubscription->next_billing }}</dd>
                            @endif
                            <dt class="col-sm-6">Membresía vigente hasta:</dt>
                            <dd class="col-sm-6">{{ $lastSubscription->finish_at }}</dd>
                        </dl>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                            @if ($lastSubscription->renewal)
                                <form action="{{ route('paypal.suscripcion.cancel') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-outline-danger custom-margin-right"
                                        onclick="return confirm('Esta seguro que desea cancelar la suscripción?');">Cancelar
                                        suscripción</button>
                                </form>
                            @endif
                            <a href="{{ url('/dashboard') }}" type="button" class="btn btn-outline-secondary">Ir a
                                dashboard</a>
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
