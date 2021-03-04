<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Model\Menu;
use App\Model\Category;
use \Auth;
use \Alert;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (Auth::user()->role == 'admin') {
    		$menu = Menu::all();
    		return view('dashboard.core.menu.index', compact('menu'));
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function create()
    {
    	if (Auth::user()->role == 'admin') {
    		$category = Category::all();
    		return view('dashboard.core.menu.create', compact('category'));
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function save(Request $request)
    {
    	if (Auth::user()->role == 'admin') {
    		if ($request->hasFile('picture')) {
	            $request->validate([
	                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
	            ]);
	            $file = $request->file('picture');
	            $cover = $request->name.'-('.date('Y-m-d').')('.rand(1, 100).').'.$file->getClientOriginalExtension();
	            $file->move(public_path('pict/menu'), $cover);
	        } else {
	            $cover = 'default.jpg';
	        }
	        $menu = new Menu;
	        $menu->name = $request->name;
	        $menu->id_category = $request->id_category;
	        $menu->description = $request->description;
	        $menu->price = $request->price;
	        $menu->picture = $cover;
	        $menu->created_by = Auth::user()->id;
	        $menu->save();

            Alert::success('Menu Alert', 'Success Create New Menu !!');
	        return redirect()->route('menu');
    	} else {
    		return abort(403, 'Unauthorized');
    	}
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'admin') {
            if ($id) {
                $category = Category::all();
                $menu = Menu::where('id', $id)->first();
                return view('dashboard.core.menu.edit', compact('category', 'menu'));
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
                $menu = Menu::find($id);
                if ($request->hasFile('picture')) {
                    $request->validate([
                        'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);
                    File::delete('pict/menu/'.$menu->picture);
                    $file = $request->file('picture');
                    $cover = $request->name.'-('.date('Y-m-d').')('.rand(1, 100).').'.$file->getClientOriginalExtension();
                    $file->move(public_path('pict/menu'), $cover);
                } else {
                    $cover = $menu->picture;
                }
                $menu->name = $request->name;
                $menu->id_category = $request->id_category;
                $menu->description = $request->description;
                $menu->price = $request->price;
                $menu->picture = $cover;
                $menu->created_by = Auth::user()->id;
                $menu->save();

                Alert::success('Menu Alert', 'Success Update Menu !!');
                return redirect()->route('menu');
            } else {
                Alert::error('Menu Alert', 'Failed Update Menu !!');
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
                $menu = Menu::find($id);
                File::delete('pict/menu/'.$menu->picture);
                $menu->delete();

                Alert::success('Menu Alert', 'Success Delete Menu !!');
                return redirect()->back();
            } else {
                Alert::error('Menu Alert', 'Success Delete Menu !!');
                return redirect()->back();
            }
        } else {
            return abort(403, 'Unauthorized');
        }
    }
}
