<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Model\Transaction;
use App\Model\MenuOnTransaction;
use App\User;
use \Alert;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (Auth::user()->role == 'admin') {
    		$proses = Transaction::where('status', 0)->get();
	    	$deliver = Transaction::where('status', 1)->get();
	    	$arrive = Transaction::where('status', 2)->get();
	    	$accept = Transaction::where('status', 3)->get();
	    	$reject = Transaction::where('status', 4)->get();
            $courier = User::where('role', 'courier')->get();
    		return view('dashboard.core.transaction.index', compact('proses', 'deliver', 'arrive', 'accept', 'reject', 'courier'));
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function acceptTransaction(Request $request, $id)
    {
        if (Auth::user()->role == 'admin') {
            if ($id) {
                if ($request->id_courier != null) {
                    $transaction = Transaction::find($id);
                    $transaction->id_courier = $request->id_courier;
                    $transaction->status = 1;
                    $transaction->save();

                    Alert::success('Transaction Alert', 'Transaction successfully accepted !!');
                    return redirect()->back();
                } else {
                    Alert::error('Transaction Alert', 'Choose Courire !!');
                    return redirect()->back();
                }
            } else {
                Alert::error('Transaction Alert', 'Transaction Not Found !!');
                return redirect()->back();
            }
        } else {
            return abort(403, 'Unauthorized');
        }
    }

    public function cancelTransaction($id)
    {
        if (Auth::user()->role == 'admin') {
            if ($id) {
                Transaction::where('id', $id)->update([
                    'status' => 4
                ]);

                Alert::success('Transaction Alert', 'Transaction successfully cancelled !!');
                return redirect()->back();
            } else {
                Alert::error('Transaction Alert', 'Transaction Not Found !!');
                return redirect()->back();
            }
        } else {
            return abort(403, 'Unauthorized');
        } 
    }

    public function deleteTransaction($id)
    {
        if (Auth::user()->role == 'admin') {
            if ($id) {
                MenuOnTransaction::where('id_transaction', $id)->delete();
                Transaction::where('id', $id)->delete();

                Alert::success('Transaction Alert', 'Transaction successfully deleted !!');
                return redirect()->back();
            } else {
                Alert::error('Transaction Alert', 'Transaction Not Found !!');
                return redirect()->back();
            }
        } else {
            return abort(403, 'Unauthorized');
        } 
    }
}
