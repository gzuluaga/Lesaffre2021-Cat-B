<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTime;
use DatePeriod;
use DateInterval;
use Hash;

use App\Models\User;
use App\Models\TblAlias;
use App\Models\TblPuntuacion;

class PuntuacionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		return view('backend.listadoPuntuaciones');
    	}
    }

    public function getlistDist(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $users = User::where('tipo_user','Proveedor')
                        ->where('estado_usr',1)
                        ->get(); 

        return ['users' => $users];
    }

    public function getlistpuntuacion(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar          = $request->buscar;
        $criterio        = $request->criterio;
        $arrayFiltro     = $request->filtro;

        if ($buscar == '') {
            $puntuaciones =  DB::Table('vw_posiscion')
                            ->paginate(30);
        }else{
             $puntuaciones =  DB::Table('vw_posiscion')
                            ->where($criterio,'like','%'.$buscar.'%')
                            ->paginate(30);
        }

        return [

            'pagination' => [
                    'total'         => $puntuaciones->total(),
                    'current_page'  => $puntuaciones->currentPage(),
                    'per_page'      => $puntuaciones->perPage(),
                    'last_page'     => $puntuaciones->lastPage(),
                    'from'          => $puntuaciones->firstItem(),
                    'to'            => $puntuaciones->lastItem(),
            ],

            'puntuaciones' => $puntuaciones];
         
    }

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $puntuacion               = new TblPuntuacion;
            $puntuacion->user_id      = $request->distribuidor;
            $puntuacion->puntuacion   = $request->puntuacion;
            $puntuacion->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function ruta(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        
        if ($request) {             
            $ruta = $request->root();
            return ['ruta' => $ruta];
        }
    }


    // logica para las puntuaciones mensuales
    public function viewMensual(Request $request)
    {
        $proveedor_acumulado = DB::table('vw_posiscion')
                        ->get();

        $proveedor_mes = DB::table('vw_pocision_mes')
            ->where('fecha','=',''.Carbon::now()->format('m/Y').'')
            ->get();

        // dd($proveedor_mes);

        $calculo_mes = 0;
        $calculo_second = 0;
        foreach ($proveedor_mes as $key => $value) {
            if ($value->id_user == AUth::User()->id) {
                $calculo_mes    = $key;
                $calculo_second = $key;
            }
        }

        $calculo_mes = $calculo_mes-1;                    
        $contador_mes = 1;


        $calculo = 0;
        $calculo_acumulado_second = 0;
        foreach ($proveedor_acumulado as $key => $value) {
            if ($value->id_user == AUth::User()->id) {
                $calculo = $key;
                $calculo_acumulado_second = $key;
            }
        }
        
        $calculo = $calculo-1;                    
        $contador = 1;

        $iduser = AUth::User()->id;

        return view('backend.listadoPuntuacionesMensual',[
                        'proveedor_acumulado'       => $proveedor_acumulado,
                        'contador'                  => $contador,
                        'calculo'                   => $calculo,
                        'proveedor_mes'             => $proveedor_mes,
                        'contador_mes'              => $contador_mes,
                        'calculo_mes'               => $calculo_mes,
                        'calculo_second'            => $calculo_second,
                        'calculo_acumulado_second'  => $calculo_acumulado_second,
                        'iduser'                    => $iduser,
                    ]);
        
        
    }

   
}
