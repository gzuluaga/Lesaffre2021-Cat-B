@extends('frontend.layout.index')

@section('content')
<!-- Main Wrapper Start -->
<div class="wrapper">
    <!-- Main Content Wrapper Start -->
    <main class="main-content-wrapper">
        <!-- Slider area Start -->
        <section class="homepage-slider mb--11pt5">
            <div class="element-carousel slick-right-bottom" data-slick-options='{
                "slidesToShow": 1, 
                "dots": true
            }'>
                <div class="item" style="margin-top:10%; !important">
                <!-- Tittle area Start -->
                    <div style="position: relative;">
                        <div class="paralelogramo" style="position: absolute; left: 40px; top: 40px;"></div>
                        <div class="paralelogramo2" style="position: absolute; left: 35px; top: 32px;">Aprendé</div>
                    </div>       
                <!-- Tittle area End -->
                    <div class="single-slide d-flex align-items-center bg-image"
                        data-bg-image="assets/img/slider/splash.png">
                        <div class="container">
                            <div class="row align-items-center no-gutters w-100">
                                <div class="col-lg-6 col-md-8">
                                    <div class="slider-content">
                                        <div class="slider-content__text mb--95 md-lg--80 mb-md--40 mb-sm--15">
                                            <p class="text-uppercase font-weight-light" data-animation="fadeInUp"
                                                data-duration=".3s" data-delay=".3s" style="padding-top:15%;">
                                                Todos los meses habrán capacitaciones que permitan conocer más
                                                 a fondo los productos destacados del mes para ayudar a impulsarlos
                                                  y compartir un espacio de encuentro entre todos. 
                                                  Al final del mes se podrá contestar una trivia para sumar puntos extra.</p>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="slider-content__btn">
                                                <a href="#" class="css-button" data-animation="fadeInUp">20 puntos por asistencia</a>
                                            </div>
                                            <br>
                                            <div class="slider-content__btn">
                                                <a href="#" class="css-button" data-animation="fadeInUp">5 puntos por Trivia</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-2 col-md-4">
                                    <figure class="slider-image d-none d-md-block">
                                        <img src="assets/img/aprende/aprende.png" style="max-width:50%;width:auto;height:auto;">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider area End -->
    </main>
    <!-- Main Content Wrapper End -->
</div>
@endsection