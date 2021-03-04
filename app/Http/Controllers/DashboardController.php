<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Model\Transaction;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (Auth::user()->role == 'admin') {
            $proses = Transaction::where('status', 0)->count();
            $accept = Transaction::where('status', 3)->count();
            $cancel = Transaction::where('status', 4)->count();
    		return view('dashboard.core.dashboard.index', compact('proses', 'accept', 'cancel'));
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }
}
