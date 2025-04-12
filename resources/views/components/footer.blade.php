<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container my-5">
    <!-- Footer -->
    <footer
    class="text-center text-lg-start text-white"
    style="background-color: rgb(80, 78, 70)"
    >
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="container">
            <!--Grid row-->
            <div class="row justify-content-center">
                <!--Grid column-->
                <div class="col-12 mb-4 mb-md-0 d-flex justify-content-center">
                    <h5 class="text-uppercase mb-5">Alcuni dei nostri partners</h5>
                </div>
            </div>
                <!--Grid column-->
                
                <!--Grid column-->
            <div class="row justify-content-center text-center">
                <div class="col-6 col-md-3 mb-4">
                    <h5 class="text-uppercase">Microsoft</h5>
                    
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                
                <!--Grid column-->
                <div class="col-6 col-md-3 mb-4">
                    <h5 class="text-uppercase">Apple</h5>
                    
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                
                <!--Grid column-->
                <div class="col-6 col-md-3 mb-4">
                    <h5 class="text-uppercase">Sony</h5>
                    
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                
                <!--Grid column-->
                <div class="col-6 col-md-3 mb-4">
                    <h5 class="text-uppercase">Nintendo</h5>
                    
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                {{-- <div class="col-lg-4 col-6 col-md-3 mb-4">
                    <h5 class="text-uppercase"> </h5>
                </div> --}}
                <!--Grid column-->
                
                <!--Grid column-->
                <div class="col-6 col-md-3 my-4">
                    <h5 class="text-uppercase">Adidas</h5>
                    
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                
                <!--Grid column-->
                <div class="col-6 col-md-3 my-4">
                    <h5 class="text-uppercase">H&M</h5>
                    
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                
                <!--Grid column-->
                <div class="col-6 col-md-3 my-4">
                    <h5 class="text-uppercase">Levi's</h5>
                    
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                
                <!--Grid column-->
                <div class="col-6 col-md-3 my-4">
                    <h5 class="text-uppercase">Nike</h5>
                    
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link</a>
                        </li>
                    </ul>
                </div>
                
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
        
        <hr class="mb-4" />
        
        <!-- Section: CTA -->
        @auth
        <section class="">
            <p class="d-flex justify-content-center align-items-center">
                <span class="me-3 text-warning">Vuoi disconnetterti?</span>
                <a href="{{route('logout')}}" class="btn btn-success btn-rounded"
                onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                >Clicca qui</a>
                <form 
                action="{{route('logout')}}"
                method="POST"
                id="form-logout"
                class="d-none"
                >
                @csrf
                </form>
            </p>
        </section>

        @else
            
        <section class="container d-flex justify-content-center">
            <div class="row col-12 d-flex justify-content-center align-items-center text-center">
                    <div class="col-12 col-md-3 text-warning">Vuoi creare un account?</div>
                    <div href="{{route('register')}}" class="col-12 col-md-3 btn btn-outline-custom btn-rounded btn-width-footer">Clicca qui!</div>
                    <div class="col-12 col-md-3 text-warning mt-login-button-footer">Sei già registrato?</div>
                    <div a href="{{route('login')}}" class="col-12 col-md-3 btn btn-outline-primary btn-rounded btn-width-footer">Clicca qui!</div>
                </div>
            </div>
        </section>
        @endauth
        
        <!-- Section: CTA -->
        @auth
            @if (Auth::user()->is_revisor)
        {{-- L'utente è revisore, non mostrare nulla --}}
                <p></p>
            @else
        {{-- Altrimenti mostrami il tasto per diventare revisore --}}
                <section class="">
                    <p class="d-flex justify-content-center align-items-center">
                        <span class="me-3 text-warning">Vuoi diventare revisore?</span>
                        <a href="{{ route('become.revisor') }}" class="btn btn-outline-warning btn-rounded">
                            Candidati qui!
                        </a>
                        </p>
                </section>
            @endif
        @endauth
        <!-- Section: CTA -->
        
        <hr class="mb-4" />
        
        <!-- Section: Social media -->
        <section class="mb-4 text-center">
            <!-- Facebook -->
            <a
            class="btn btn-outline-light btn-floating m-1"
            href="#!"
            role="button"
            ><i class="fab fa-facebook-f"></i
                ></a>
                
                <!-- Twitter -->
                <a
                class="btn btn-outline-light btn-floating m-1"
                href="#!"
                role="button"
                ><i class="fab fa-twitter"></i
                    ></a>
                    
                    <!-- Google -->
                    <a
                    class="btn btn-outline-light btn-floating m-1"
                    href="#!"
                    role="button"
                    ><i class="fab fa-google"></i
                        ></a>
                        
                        <!-- Instagram -->
                        <a
                        class="btn btn-outline-light btn-floating m-1"
                        href="#!"
                        role="button"
                        ><i class="fab fa-instagram"></i
                            ></a>
                            
                            <!-- Linkedin -->
                            <a
                            class="btn btn-outline-light btn-floating m-1"
                            href="#!"
                            role="button"
                            ><i class="fab fa-linkedin-in"></i
                                ></a>
                                
                                <!-- Github -->
                                <a
                                class="btn btn-outline-light btn-floating m-1"
                                href="#!"
                                role="button"
                                ><i class="fab fa-github"></i
                                    ></a>
                                </section>
                                <!-- Section: Social media -->
                            </div>
                            <!-- Grid container -->
                            
                            <!-- Copyright -->
                            <div
                            class="text-center p-3"
                            style="background-color: rgba(0, 0, 0, 0.2)"
                            >
                            © 2020 Copyright:
                            <a class="text-white" href="{{route('homepage')}}"
                            >Presto.it</a
                            >
                        </div>
                        <!-- Copyright -->
                    </footer>
                    <!-- Footer -->
                </div>
                <!-- End of .container -->