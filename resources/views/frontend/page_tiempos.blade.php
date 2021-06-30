@extends('frontend.layout.index')

@section('content')
<!-- Main Wrapper Start -->
<div class="wrapper">
    <!-- Main Content Wrapper Start -->
    <main class="main-content-wrapper" style="padding-top:10%;">
        <!-- Tittle area Start -->
        <div style="position: relative;">
            <div class="paralelogramo" style="position: absolute; left: 40px; top: 40px;"></div>
            <div class="paralelogramo2" style="position: absolute; left: 35px; top: 32px;">Tiempos</div>
        </div>       
        <!-- Tittle area End -->
        <section class="homepage-slider mb--11pt5">
            <div class="element-carousel slick-right-bottom" data-slick-options='{
                "slidesToShow": 1, 
                "dots": true
            }'>
                <div class="item" style="padding-top:5%;">>
                    <div class="single-slide d-flex align-items-center bg-image"
                        data-bg-image="assets/img/slider/splash.png">
                        <div class="container">
                            <div class="row align-items-center no-gutters w-100">
                                <div class="col-lg-12 col-md-8">
                                    <div class="slider-content">
                                        <div class="slider-content__text mb--95 md-lg--80 mb-md--40 mb-sm--15">
                                            <p class="text-uppercase font-weight-light" data-animation="fadeInUp"
                                                data-duration=".3s" data-delay=".3s">El Desafío Lesaffre 2021 considera todas las compras de distribuidores realizadas entre el 1 de Julio al 30 de Octubre de 2021.<br><br>La registración y aceptación de las bases de participación deberá realizarse en: www.lesaffreplay.com/DesafioLesaffre21 antes del día 1 de Julio a las 17:00 horas.<br><br>  
                                                Al inicio de cada mes de concurso se comunicará a cada participante las cuotas de dicho periodo.<br> 10 días después de finalizado cada mes se comunicará el ranking de los distribuidores y los ganadores de los premios mensuales.<br><br>
                                                Del 1 al 10 de Noviembre se comunicará el ganador del viaje y del premio para el mejor vendedor del cuatrimestre 
                                            </p>
                                        </div>                                            
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<!-- Main Wrapper End -->
@endsection