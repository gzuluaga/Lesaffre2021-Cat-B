@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cargar Excel</div>

                <div class="card-body">
                   <excel-component></excel-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection