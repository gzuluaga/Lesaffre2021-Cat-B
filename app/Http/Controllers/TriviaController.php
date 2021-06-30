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

class TriviaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function viewtribia(Request $request)
    {
    	if ($request) {
    		return view('backend.trivia');
    	}
    }

}
