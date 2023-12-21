<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TestController extends Controller
{
    public function test() {
		$data = Product::all();
        return view('test', compact('data'));
	}
}
