<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

class PageFrontController extends Controller
{
   	public function index(Request $request)
   	{
   		if ($request) {
   			return view('frontend.page_index');
   		}
   	}

	public function objetivos(Request $request)
   	{
   		if ($request) {
   			return view('frontend.page_objetivos');
   		}
   	}

	   public function productos(Request $request)
   	{
   		if ($request) {
   			return view('frontend.page_productos');
   		}
   	}

	   public function premios(Request $request)
   	{
   		if ($request) {
   			return view('frontend.page_premios');
   		}
   	}

	   public function receta(Request $request)
   	{
   		if ($request) {
   			return view('frontend.page_receta');
   		}
   	}

	   public function aprende(Request $request)
   	{
   		if ($request) {
   			return view('frontend.page_aprende');
   		}
   	}

	   public function tiempos(Request $request)
   	{
   		if ($request) {
   			return view('frontend.page_tiempos');
   		}
   	}
	   public function bases(Request $request)
   	{
   		if ($request) {
   			return view('frontend.page_bases_y_condiciones');
   		}
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

    public function loginview(Request $request)
    {
        return view('frontend.login');
    }
}
