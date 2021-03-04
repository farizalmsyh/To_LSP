<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\Chart;
use App\Model\Transaction;
use App\Model\MenuOnTransaction;
use \Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$proses = Transaction::where('id_user', Auth::user()->id)->where('status', 0)->get();
    	$deliver = Transaction::where('id_user', Auth::user()->id)->where('status', 1)->get();
    	$arrive = Transaction::where('id_user', Auth::user()->id)->where('status', 2)->get();
    	$accept = Transaction::where('id_user', Auth::user()->id)->where('status', 3)->get();
    	$reject = Transaction::where('id_user', Auth::user()->id)->where('status', 4)->get();

    	return view('content.transaction.index', compact('proses', 'deliver', 'arrive', 'accept', 'reject'));
    }

    public function saveTemp(Request $request)
    {
    	if ($request->id_address != null) {
    		$totalPrice = 0;
    		$chart = Chart::where('id_user', Auth::user()->id)->get();
    		$transaction = new Transaction;
    		$transaction->id_user = Auth::user()->id;
    		$transaction->id_address = $request->id_address;
    		$transaction->save();
    		foreach ($chart as $key => $value) {
    			$menu = Menu::where('id', $value->id_menu)->first();
    			$menus = new MenuOnTransaction;
    			$menus->id_user = Auth::user()->id;
    			$menus->id_transaction = $transaction->id;
    			$menus->name = $menu->name;
    			$menus->count = $value->count;
    			$menus->price = $menu->price;
    			$menus->total_price = $value->count * $menu->price;
    			$totalPrice += $menus->total_price;
    			$menus->save();
    		}
    		$transaction->price = $totalPrice;
    		$transaction->save();

    		Chart::truncate();

    		return redirect()->route('page.transaction');
    	} else {
    		return redirect()->back();
    	}
    }

    public function cancelTransaction($id)
    {
    	if ($id) {
    		Transaction::where('id', $id)->update([
    			'status' => 4
    		]);

    		return redirect()->back();
    	} else {
    		return redirect()->back();
    	}
    }
    public function acceptTransaction($id)
    {
    	if ($id) {
    		Transaction::where('id', $id)->update([
    			'status' => 3
    		]);

    		return redirect()->back();
    	} else {
    		return redirect()->back();
    	}
    }
    public function deleteTransaction($id)
    {
    	if ($id) {
    		
    		MenuOnTransaction::where('id_transaction', $id)->delete();
    		Transaction::where('id', $id)->delete();

    		return redirect()->back();
    	} else {
    		return redirect()->back();
    	}
    }
}
