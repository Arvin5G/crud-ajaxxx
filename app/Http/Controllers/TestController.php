<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class TestController extends Controller
{
    public function test() {

        $employees = Product::get();
        $count = Product::count();

        return view('test', compact('employees', 'count'));

	}
    public function test1() {

        $employees = Product::get();
        $count = Product::count();

        return view('test1', compact('employees', 'count'));

	}
    public function view_prod(Request $request){

		$view_prod = Product::find($request -> id);
		return response()->json($view_prod);
    }
}
