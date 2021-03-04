<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Model\Transaction;
use \Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (Auth::user()->role != 'user') {
    		$deliver = Transaction::where('id_courier', Auth::user()->id)->where('status', 1)->get();
    		$arrive = Transaction::where('id_courier', Auth::user()->id)->where('status', 2)->get();
    		$accept = Transaction::where('id_courier', Auth::user()->id)->where('status', 3)->get();
            
    		return view('dashboard.core.courier.index', compact('deliver', 'arrive', 'accept'));
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function arriveTransaction($id)
    {
    	if (Auth::user()->role != 'user') {
    		if ($id) {
    			Transaction::where('id', $id)->update([
    				'status' => 2
    			]);
    			Alert::success('Order Alert', 'Order successfully arrived !!');
                return redirect()->back();
    		} else {
    			Alert::error('Order Alert', 'Transaction not found !!');
                return redirect()->back();
    		}
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }
}
