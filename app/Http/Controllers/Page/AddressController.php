<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Model\Address;
use \Auth;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$address = Address::where('id_user', Auth::user()->id)->get();
    	return view('content.address.index', compact('address'));
    }

    public function create()
    {
    	return view('content.address.create');
    }

    public function save(Request $request)
    {
    	$address = new Address;
    	$address->name = $request->name;
    	$address->address = $request->address;
    	$address->id_user = Auth::user()->id;

    	$address->save();

    	return redirect()->route('page.address');
    }
}
