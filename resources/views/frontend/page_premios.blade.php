@extends('frontend.layout.index')

@section('content')
    <!-- Main Wrapper Start -->
    <div class="container-fluid">
        <div style="padding-top:10%;"></div>
        <div class="container-fluid" style="position: relative;">
            <div class="paralelogramo" style="position: absolute; left: 40px; top: 40px;"></div>
            <div class="paralelogramo2" style="position: absolute; left: 35px; top: 32px;">Premios</div>
        </div>
        <div style="padding-bottom:15%;"></div>
    </div>

    <div class="container-fluid">
        <div class="img">
            <div class=" premios d-flex align-items-center bg-image" data-bg-image="assets/img/premios/premios_new.png">
            </div>
        </div>
    </div>
            
        <!-- <main class="main-content-wrapper" style="padding-top:3%;">
            Slider area Start -->
            <!-- <section class="premios">                     
                <div class="item">
                    <div class="premios d-flex align-items-center bg-image"
                        data-bg-image="assets/img/premios/premios_new.png">
                    </div>                       
                </div>
            </section> -->
            <!-- Slider area End -->   
        <!-- </main> --> 
        <!-- Main Content Wrapper End -->
@endsection
