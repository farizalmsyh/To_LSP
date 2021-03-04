<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Chart;
use App\Model\Address;
use App\Model\Menu;
use \Auth;

class ChartController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$chart = Chart::where('id_user', Auth::user()->id)->get();
    	return view('content.chart.index', compact('chart'));
    }

    public function create()
    {
    	$menu = Menu::all();
    	return view('content.chart.create', compact('menu'));
    }

    public function save(Request $request)
    {   
        $charts = Chart::where('id_user', Auth::user()->id)->where('id_menu', $request->id_menu)->first();
        // dd($request->id_menu);
        if ($charts != null) {
            Chart::where('id_user', Auth::user()->id)->where('id_menu', $request->id_menu)->update([
                "count" => $charts->count + $request->count
            ]);
        } else {
            $chart = new Chart;
            $chart->id_menu = $request->id_menu;
            $chart->id_user = Auth::user()->id;
            $chart->count = $request->count;

            $chart->save();
        }

        return redirect()->back(); 

    }

    public function destination()
    {
        $address = Address::where('id_user', Auth::user()->id)->get();
        return view('content.chart.destination', compact('address'));
    }

    public function delete($id)
    {
        Chart::where('id', $id)->delete();

        return redirect()->back();
    }
}
