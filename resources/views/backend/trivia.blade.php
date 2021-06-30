@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Registrar Trivia</div>

                <div class="card-body">
                   <template>
                   		<trivia-component></trivia-component>
                   </template>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection