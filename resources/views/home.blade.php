@extends('layouts.app')

@section('content')


<div class="container p-4 rounded shadow bg-white">
    <div class="row p-3">
         <div class="col-12 col-md-4 col-lg-4">
            <a href="{{ URL::to('distribuidores/index') }}" class="text-decoration-none">
                <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                    <i class="fas fa-user-tie fa-2x my-2"></i>
                    <div class="">
                        <h6 class="">Registrar Distibuidores</h6>
                        <p class="text-secondary m-0">Agregar y listar</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 col-lg-4">
            <a href="{{ URL::to('listpostulaciones/index') }}" class="text-decoration-none">
                <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                    <i class="fas fa-list fa-2x my-2"></i>
                    <div class="">
                        <h6 class="">Listado de Puntuaciones General </h6>
                        <p class="text-secondary m-0">Agregar y listar</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 col-lg-4">
             <a href="{{ URL::to('listpostulacionesmensual/index') }}" class="text-decoration-none">
                <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                    <i class="fas fa-clipboard-list fa-2x my-2"></i>
                    <div class="">
                        <h6 class="">Listado de Puntuaciones Mensual </h6>
                        <p class="text-secondary m-0">Agregar y listar</p>
                    </div>
                </div>
            </a>
        </div>
      
    </div>
</div>
<div class="mb-3"></div>
<div class="container p-4 rounded shadow bg-white">
    <div class="row p-3">
         <div class="col-12 col-md-4 col-lg-4">
            <a href="{{ URL::to('excel/index') }}" class="text-decoration-none">
                <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                    <i class="far fa-file-excel fa-2x my-2"></i>
                    <div class="">
                        <h6 class="">Cargar Puntuacion Excel</h6>
                        <p class="text-secondary m-0">Cargar</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-md-4 col-lg-4">
            <a href="{{ URL::to('trivia/index') }}" class="text-decoration-none">
                <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                    <i class="fas fa-tachometer-alt fa-2x my-2"></i>
                    <div class="">
                        <h6 class="">Registrar Trivia </h6>
                        <p class="text-secondary m-0">Agregar y listar</p>
                    </div>
                </div>
            </a>
        </div>
          <div class="col-12 col-md-4 col-lg-4">
            <a href="" class="text-decoration-none">
                <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                    <i class="fas fa-users fa-2x my-2"></i>
                    <div class="">
                        <h6 class="">Registro de Usuarios </h6>
                        <p class="text-secondary m-0">Agregar y listar</p>
                    </div>
                </div>
            </a>
        </div>
     
    </div>
</div>

<div class="mb-3"></div>
<div class="container p-4 rounded shadow bg-white">
    <div class="row p-3">
        <div class="col-12 col-md-4 col-lg-4">
            <a href="{{ URL::to('caledanrio/index') }}" class="text-decoration-none">
                <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                    <i class="fas fa-calendar-alt fa-2x my-2"></i>
                    <div class="">
                        <h6 class="">Ver Calendario </h6>
                        <p class="text-secondary m-0">Visualizar</p>
                    </div>
                </div>
            </a>
        </div>   
    </div>
</div>
<div class="mb-3"></div>
{{-- <div class="container p-4 rounded shadow bg-white">
    <div class="row p-3">
         <div class="col-12 col-md-6 col-lg-6">
            <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
           <div class="box-parametrizacion px-3 py-2 border rounded mb-2 text-center d-flex justify-content-between align-items-center d-sm-block">
                
            </div>
        </div>
    </div>
</div> --}}
@endsection
