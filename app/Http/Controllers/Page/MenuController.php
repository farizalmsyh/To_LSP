<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Model\Menu;
use \App\Model\Category;

class MenuController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$category = Category::orderBy('created_at', 'ASC')->get();
    	return view('content.menu.index', compact('category'));
    }
}
