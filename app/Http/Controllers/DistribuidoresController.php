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


class DistribuidoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	if ($request) {
    		return view('backend.registrarDistribuidores');
    	}
    }

    public function listDistribuidores(Request $request)
    {
          // if(!$request->ajax()) return redirect('/');

            $buscar          = $request->buscar;
            $criterio        = $request->criterio;
            $arrayFiltro     = $request->filtro;

            if ($buscar == '') {
                $users = User::where('tipo_user','Proveedor')
                        ->where('estado_usr',1)
                        ->paginate(10); 
            }else{
                $users = User::where($criterio,'like','%'.$buscar.'%')
                        ->where('tipo_user','Proveedor')
                        ->where('estado_usr',1)
                        ->paginate(10); 
            }

            return [
                'pagination' => [
                        'total'         => $users->total(),
                        'current_page'  => $users->currentPage(),
                        'per_page'      => $users->perPage(),
                        'last_page'     => $users->lastPage(),
                        'from'          => $users->firstItem(),
                        'to'            => $users->lastItem(),
                ],
                'users'     => $users,
            ];
    }

    public function listAlias(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        if ($request) {

            $alias = tblAlias::where('estado',1)->get();

            return [
                'alias' => $alias,
            ];
        }
    }

    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $distribuidor               = new User;
            $distribuidor->name         = $request->nombres;
            $distribuidor->email        = $request->email;
            $distribuidor->alias        = $request->alias;
            $distribuidor->razon_social = $request->razonSocial;
            $distribuidor->tipo_user    = 'Proveedor';
            $distribuidor->password     = Hash::make($request->password);
            $distribuidor->estado_usr   = '1';
            $distribuidor->save();

            DB::table('tbl_aliases')->where('descripcion', $request->alias)->update(['estado' => 2]);


            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $distribuidor               = User::findOrfail($request->id);
            $distribuidor->name         = $request->nombres;
            $distribuidor->email        = $request->email;
            $distribuidor->alias        = $request->alias;
            $distribuidor->razon_social = $request->razonSocial;
            $distribuidor->tipo_user    = 'Proveedor';

            if ($request->password != '') {
                $distribuidor->password     = Hash::make($request->password);    
            }
            
            $distribuidor->estado_usr   = '1';
            $distribuidor->update();

                   


            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    
    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();

            $distribuidor               = User::findOrfail($request->id);
            $distribuidor->estado_usr   = '0';
            $distribuidor->update();

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

}
