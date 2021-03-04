<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Model\Category;
use \Alert;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (Auth::user()->role == 'admin') {
    		$category = Category::all();
    		return view('dashboard.core.category.index', compact('category'));
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function create()
    {
    	if (Auth::user()->role == 'admin') {
    		return view('dashboard.core.category.create');
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function save(Request $request)
    {
    	if (Auth::user()->role == 'admin') {
    		$category = new Category;
    		$category->name = $request->name;
    		$category->created_by = Auth::user()->id;
    		$category->save();

            Alert::success('Category Alert', 'Success Create New Category !!');
    		return redirect()->route('category');
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function edit($id)
    {
    	if (Auth::user()->role == 'admin') {
    		if ($id) {
	    		$category = Category::where('id', $id)->first();
	    		return view('dashboard.core.category.edit', compact('category'));
    		} else {
    			return redirect()->back();
    		}
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function update(Request $request, $id)
    {
    	if (Auth::user()->role == 'admin') {
    		if ($id) {
    			$category = Category::find($id);
    			$category->name = $request->name;
    			$category->created_by = Auth::user()->id;
    			$category->save();

                Alert::success('Category Alert', 'Success Update Category !!');
    			return redirect()->route('category');
    		} else {
                Alert::error('Category Alert', 'Failed Update Category !!');
    			return redirect()->back();
    		}
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function delete($id)
    {
    	if (Auth::user()->role == 'admin') {
    		if ($id) {
    			Category::where('id', $id)->delete();

                Alert::success('Category Alert', 'Success Delete Category !!');
    			return redirect()->route('category');
    		} else {
                Alert::error('Category Alert', 'Failed Delete Category !!');
    			return redirect()->back();
    		}
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }
}
