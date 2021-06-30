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
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PuntuacionesImport;
use App\Exports\UsersExport;


use App\Models\User;
use App\Models\TblAlias;
use App\Models\TblPuntuacion;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(Request $request)
    {
    	return view('backend.excel');
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx'
        ]);

        $path = $request->file('import_file');
        $data = Excel::import(new PuntuacionesImport, $path);

        return response()->json(['message' => 'uploaded successfully'], 200);
    }


    public function export(Request $request)
    {
        return Excel::download(new UsersExport, 'users.xlsx');
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
