<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProductController extends Controller {

	// set prod page view
	public function prod() {
		return view('prod');
	}

	// handle fetch all products ajax request
	public function fetchAll1() {
		$prods = Product::all();
		$output = '';
		if ($prods->count() > 0) {
			$output .= '<table id="example" class="table-hover table-bordered" style="width:100%;">
            <thead class="table-secondary" style="width:100%;">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Expiry Date</th>
                    <th>Available</th>
                    <th>Image</th>
                    <th class="disable-click">Action</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($prods as $prod1) {
				$output .= '<tr class="text-muted">
                <td id="' . $prod1->id . '" style="font-size: 1rem;">' . $prod1->id . '</td>
                <td id="' . $prod1->id . '" style="font-size: 1rem;">' . $prod1->p_name . '</td>
                <td id="' . $prod1->id . '" style="font-size: 1rem;">' . $prod1->p_unit . '</td>
                <td id="' . $prod1->id . '" style="font-size: 1rem;">&#8369; ' . number_format($prod1->p_price, 2, '.', '') . '</td>
                <td id="' . $prod1->id . '" style="font-size: 1rem;"> ' .Carbon::parse($prod1->p_xdate)->format('F j, Y'). '</td>
                <td id="' . $prod1->id . '" style="font-size: 1rem;">' . $prod1->p_available . '</td>
				<td id="' . $prod1->id . '"><img src="storage/images/' . $prod1->p_image . '" style="width: 2rem; height: 2rem;" ></td>
                <td>
                    <div class="col d-flex gap-2">
                        <a href="#" id="' . $prod1->id . '" class="btn btn-outline-secondary btn-sm editIcon w-100 d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#editProductModal"><i class="bi-pencil"></i>Edit</a>
                        <a href="#" id="' . $prod1->id . '" class="btn btn-outline-secondary btn-sm viewIcon w-100 d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#viewProductModal"><i class="bi-eye"></i>View</a>
                        <a href="#" id="' . $prod1->id . '" class="btn btn-outline-secondary btn-sm deleteIcon w-100 d-flex align-items-center justify-content-center gap-2"><i class="bi-trash"></i>Delete</a>
                    </div>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<center><img src="https://cdn-icons-png.flaticon.com/128/7486/7486809.png" width="100" style="font-size: 1rem;" class="pt-5"></center>';
			echo '<center><div class="d-flex justify-content-center pb-5"><h5 class="text-primary mt-3" style="font-size: 1rem;">No product found in database.</h5></div></center>';
		}
	}

	// handle insert a new Product ajax request
	public function store1(Request $request) {
		$file = $request->file('p_image');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$prod1Data = ['p_name' => $request->p_name, 'p_unit' => $request->p_unit, 'p_price' => $request->p_price, 'p_available' => $request->p_available, 'p_xdate' => $request->p_xdate, 'p_image' => $fileName];
		Product::create($prod1Data);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an Product ajax request
	public function edit1(Request $request) {
		$id = $request->id;
		$prod1 = Product::find($id);
		return response()->json($prod1);
	}

    // handle view an Product ajax request
	public function view1(Request $request) {
		$id = $request->id;
		$prod1 = Product::find($id);
		return response()->json($prod1);
	}

	// handle update an Product ajax request
	public function update1(Request $request) {
		$fileName = '';
		$prod1 = Product::find($request->prod_id);
		if ($request->hasFile('p_image')) {
			$file = $request->file('p_image');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($prod1->p_image) {
				Storage::delete('public/images/' . $prod1->p_image);
			}
		} else {
			$fileName = $request->prod_p_image;
		}

		$prod1Data = ['p_name' => $request->p_name, 'p_unit' => $request->p_unit, 'p_price' => $request->p_price, 'p_available' => $request->p_available, 'p_xdate' => $request->p_xdate, 'p_image' => $fileName];

		$prod1->update($prod1Data);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle delete an Product ajax request
	public function delete1(Request $request) {
		$id = $request->id;
		$prod1 = Product::find($id);
		if (Storage::delete('public/images/' . $prod1->p_image)) {
			Product::destroy($id);
		}
	}
}
