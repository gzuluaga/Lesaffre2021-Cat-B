@extends('frontend.layout.index')

@section('content')
<!-- Slider area Start -->
    <main class="main-content-wrapper">
            <section class="homepage-slider mb--11pt5" style="padding-top: 130px;">
                <div class="element-carousel slick-right-bottom" data-slick-options='{
                    "slidesToShow": 1, 
                    "dots": true
                }'>
                    <div class="item">
                        <div class="single-slide d-flex align-items-center bg-image"
                            data-bg-image="assets/img/slider/splash.png">
                            <div class="container">
                                <div class="row align-items-center no-gutters w-100">
                                    <div class="col-lg-6 col-md-8">
                                        <div class="slider-content">
                                            <div class="slider-content__text mb--95 md-lg--80 mb-md--40 mb-sm--15">
                                                <h3 class="text-uppercase font-weight-light" data-animation="fadeInUp"
                                                    data-duration=".3s" data-delay=".3s">Este año cuanto más <br> aprendas más cerca <br> vas a estar de ganar</h3>
                                            </div>
                                            <div class="slider-content__btn">
                                                <a href="shop.html" class="css-button" data-animation="fadeInUp">EMPEZÁ</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 offset-lg-2 col-md-4">
                                        <figure class="slider-image d-none d-md-block">
                                            <img src="{{ asset('assets/img/slider/logo_slider.png')}}" alt="Slider Image">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Slider area End -->
            
            <!-- 3 box area Start -->
            <section class="method-area mb--11pt5">
                <div class="container">                    
                    <div class="row" >
                        <div class="col-md-4 mb-sm--50">
                            <div class="text-align-center" style="max-width:50%;width:auto;height:auto;">
                                <img src="{{ asset('assets/img/brand/objetivos.png')}}" alt="Eventos">
                                <a href="http://127.0.0.1:8000/objetivos" class="product__overlay"></a>
                                <a href="{{ URL::to('objetivos') }}" class="btn-link" data-animation="fadeInUp"
                                    data-duration=".3s" data-delay=".6s">OBJETIVOS</a>
                            </div>
                        </div>

                        <div class="col-md-4 mb-sm--50">
                            <div class="text-align-center" style="max-width:50%;width:auto;height:auto;">
                                <img src="{{ asset('assets/img/brand/productos.png')}}" alt="Premios">
                                <a href="http://127.0.0.1:8000/productos" class="product__overlay"></a>
                                <a href="{{URL::to('productos')}}" class="btn-link" data-animation="fadeInUp"
                                    data-duration=".s" data-delay=".6s">PRODUCTOS</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="text-align-center" style="max-width:50%;width:auto;height:auto;">
                                <img src="{{ asset('assets/img/brand/premios.png')}}" alt="Premios">
                                <a href="http://127.0.0.1:8000/premios" class="product__overlay"></a>
                                <a href="{{URL::to('premios')}}" class="btn-link" data-animation="fadeInUp"
                                    data-duration=".3s" data-delay=".6s">PREMIOS</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-4 mb-sm--50">
                            <div class="text-align-center" style="max-width:50%;width:auto;height:auto;">
                                <img src="{{ asset('assets/img/brand/recetas.png')}}" alt="Receta">
                                <a href="http://127.0.0.1:8000/receta" class="product__overlay"></a>
                                <a href="{{URL::to('receta')}}" class="btn-link" data-animation="fadeInUp"
                                    data-duration=".3s" data-delay=".6s">RECETA</a>
                            </div>
                        </div>

                        <div class="col-md-4 mb-sm--50">
                            <div class="text-align-center" style="max-width:50%;width:auto;height:auto;">
                                <img src="{{ asset('assets/img/brand/aprende.png')}}" alt="Aprendé">
                                <a href="http://127.0.0.1:8000/aprende" class="product__overlay"></a>
                                <a href="{{URL::to('aprende')}}" class="btn-link" data-animation="fadeInUp"
                                    data-duration=".3s" data-delay=".6s">APRENDÉ</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="text-align-center" style="max-width:50%;width:auto;height:auto;">
                                <img src="{{ asset('assets/img/brand/tiempos.png')}}" alt="Tiempos">
                                <a href="http://127.0.0.1:8000/tiempos" class="product__overlay"></a>
                                <a href="{{URL::to('tiempos')}}" class="btn-link" data-animation="fadeInUp"
                                    data-duration=".3s" data-delay=".6s">TIEMPOS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 3 box area End -->
</main>
@endsection