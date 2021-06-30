@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado Puntuaciones Mensual <a href="{{ URL::to('home') }}" class="btn btn-secondary"> Atras</a></div>
                <div class="card-body">
                    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <h3><b style="color: #FFFFFF">Ranking del Mes</b></h3>
            <br>
            <div class="table-responsive">
                <table  class="table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 60%;">
                                <b>
                                    Alias
                                </b>
                            </th>
                            <th style="width: 20%;">
                                <b >
                                    Puntos x Mes
                                </b>
                            </th>
                            <th style="width: 20%;">
                                <b >
                                    Posicion Mes
                                </b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($proveedor_mes  as $index => $element)
                                
                                @if ($index == 0)
                                    
                                    @if ($element->id_user == Auth::User()->id )
                                        <tr>
                                            <td style=" color: #FFFFFF;">
                                                <div style="background: #232E84; padding: 10px; margin-right: -25px;margin-top: -15px;">
                                                    {{ $element->alias }}
                                                </div>
                                            </td>
                                            <td style=" color: #FFFFFF;">
                                                <div style="background: #232E84; padding: 10px; margin-right: -25px; margin-top: -15px;">
                                                    {{ $element->puntuacion }}
                                                </div>
                                            </td>
                                            <td style=" color: #FFFFFF;">
                                                <div style="background: #232E84; padding: 10px; margin-top: -15px;">
                                                    {{ $index+1 }}
                                                </div>
                                            </td>
                                        </tr>
                                        @break
                                    @endif


                                    <tr>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-right: -25px;margin-top: -15px;">
                                                {{ $element->alias }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-right: -25px; margin-top: -15px;">
                                                {{ $element->puntuacion }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-top: -15px;">
                                                {{ $index+1 }}
                                            </div>
                                        </td>
                                    </tr>

                                @endif
                                

                                @if ($calculo_mes == $index &&  $calculo_second != $calculo_mes && $index != 0)
                                    <tr>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-right: -25px;margin-top: -15px;">
                                                {{ $element->alias }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-right: -25px; margin-top: -15px;">
                                                {{ $element->puntuacion }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-top: -15px;">
                                                {{ $index+1 }}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                
                                @if ($element->id_user == Auth::User()->id )
                                    <tr>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #232E84; padding: 10px; margin-right: -25px;margin-top: -15px;">
                                                {{ $element->alias }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #232E84; padding: 10px; margin-right: -25px; margin-top: -15px;">
                                                {{ $element->puntuacion }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #232E84; padding: 10px; margin-top: -15px;">
                                                {{ $index+1 }}
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                        @endforeach

                        
            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <h3><b style="color: #FFFFFF">Ranking Acumulado</b></h3>
            <br>
            <div class="table-responsive">
                <table  class="table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 60%;">
                                <b >
                                    Alias
                                </b>
                            </th>
                            <th style="width: 20%;">
                                <b >
                                    Total Acumulado
                                </b>
                            </th>
                            <th style="width: 20%;">
                                <b >
                                    Posicion del General
                                </b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedor_acumulado  as $index => $element)
                                
                                @if ($index == 0)
                                    @if ($element->id_user == Auth::User()->id )
                                        <tr>
                                            <td style=" color: #FFFFFF;">
                                                <div style="background: #232E84; padding: 10px; margin-right: -25px;margin-top: -15px;">
                                                    {{ $element->alias }}
                                                </div>
                                            </td>
                                            <td style=" color: #FFFFFF;">
                                                <div style="background: #232E84; padding: 10px; margin-right: -25px; margin-top: -15px;">
                                                    {{ $element->puntuacion }}
                                                </div>
                                            </td>
                                            <td style=" color: #FFFFFF;">
                                                <div style="background: #232E84; padding: 10px; margin-top: -15px;">
                                                    {{ $index+1 }}
                                                </div>
                                            </td>
                                        </tr>
                                        @break
                                    @endif
                                    <tr>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-right: -25px;margin-top: -15px;">
                                                {{ $element->alias }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-right: -25px; margin-top: -15px;">
                                                {{ $element->puntuacion }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-top: -15px;">
                                                {{ $index+1 }}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                
                                
                                @if ($calculo == $index &&  $calculo_acumulado_second != $calculo && $index != 0)
                                    <tr>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-right: -25px;margin-top: -15px;">
                                                {{ $element->alias }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-right: -25px; margin-top: -15px;">
                                                {{ $element->puntuacion }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #595959; padding: 10px; margin-top: -15px;">
                                                {{ $index+1 }}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                
                                @if ($element->id_user == Auth::User()->id )
                                    <tr>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #232E84; padding: 10px; margin-right: -25px;margin-top: -15px;">
                                                {{ $element->alias }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #232E84; padding: 10px; margin-right: -25px; margin-top: -15px;">
                                                {{ $element->puntuacion }}
                                            </div>
                                        </td>
                                        <td style=" color: #FFFFFF;">
                                            <div style="background: #232E84; padding: 10px; margin-top: -15px;">
                                                {{ $index+1 }}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection