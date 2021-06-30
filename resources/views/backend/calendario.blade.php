@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">Calendario de Eventos</div>

                <div class="card-body">
                   <calendar-component></calendar-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection