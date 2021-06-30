@extends('frontend.layout.index')

@section('content')
<!-- Tittle area Start -->
<div style="padding-top:6%;"></div>
    <div style="position: relative;">
        <div class="paralelogramo" style="position: absolute; left: 40px; top: 40px;"></div>
        <div class="paralelogramo2" style="position: absolute; left: 35px; top: 32px;">Receta</div>
    </div>       
<!-- Tittle area End -->

<!-- Main Wrapper Start -->
<div class="wrapper">
    <!-- Main Content Wrapper Start -->
    <main class="main-content-wrapper">
        <!-- Slider area Start -->
        <section class="homepage-slider">
            <div class="element-carousel slick-right-bottom" data-slick-options='{
                "slidesToShow": 1, 
                "dots": true
            }'>
                <div class="item" style="margin-top:10%;">
                    <div class="single-slide d-flex align-items-center bg-image"
                        data-bg-image="assets/img/slider/splash.png">
                        <div class="container">
                            <div class="row align-items-center no-gutters w-100">                                    
                                <figure class="slider-image">
                                    <img src="assets/img/receta/receta_B.png">
                                </figure>
                                <p>(*) Debe superar el 85% del volumen en cada categoría para empezar a sumar puntos.</p>
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
<!-- Main Wrapper End -->
@endsection