<x-layout2>
    <x-navbar />

    <h1 class="text-center mt-custom text-custom text-shadow fw-bold">{{__('ui.about-us')}}</h1>
    <div class="container my-5">

        <!-- Sezione team -->
        <section class="container-fluid">
            <div class="row vh-custom">
                <!-- Colonna per il cerchio che apre le info (stile interattivo) -->
                <div class="col-12 col-md-6 text-mintGreen fs-4 d-flex align-items-center justify-content-center">
                    <div class="circle">
                        <div class="opener">
                            <i class="fa-solid fa-users-rays fa-6x"></i>
                        </div>
                        <div>
                            <h6 class="fa-mt-custom">{{__('ui.clickHere')}}</h6>
                        </div>
                    </div>
                </div>
                <!-- Colonna dove verranno mostrati i dettagli del team -->
                <div id="cardWrapper" class="col-12 col-md-6 text-mintGreen fs-4 d-flex align-items-center justify-content-center">
                    <!-- Qui il JS popolerà il contenuto dinamicamente -->
                </div>
            </div>
        </section>
    </div>

    <!-- Includi lo script JS che contiene la logica del vecchio progetto -->
    {{-- <script src="{{ asset('js/aboutUs.js') }}"></script> --}}
</x-layout2>