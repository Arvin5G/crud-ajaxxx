<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller {

	// set index page view
	public function index() {
		return view('index');
	}

	// handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Employee::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table p-5 table-striped table-sm text-center align-middle">
            <thead class="table-primary">
                <tr>
                <th>Product Name</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Available</th>
                <th>Image</th>
				<th>Action</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                
                <td>' . $emp->first_name . '</td>
                <td class="text-muted">' . $emp->first_name . '</td>
                <td class="text-muted">' . $emp->email . '</td>
                <td class="text-muted">' . $emp->post . '</td>
                <td class="text-muted">' . $emp->phone . '</td>
				<td class="text-muted"><img src="storage/images/' . $emp->avatar . '" style="width: 80px; height: 80px;" ></td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal" style="color: #0d6efd;border-radius: 10%; "><i class="bi-pencil-square fs-5"></i></a>

                  <a href="#" id="' . $emp->id . '" class="mx-1 deleteIcon" style="color: #fff;border-radius: 10%; background-color: #dc3545; padding: 5px;"><i class="bi-trash fs-5"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<center><img src="https://cdn-icons-png.flaticon.com/128/7486/7486809.png" width="100"></center>';
			echo '<center><div class="d-flex justify-content-center"><h5 class="text-primary mt-3">No product found in database.</h5></div></center>';
		}
	}

	// handle insert a new employee ajax request
	public function store(Request $request) {
		$file = $request->file('avatar');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$empData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'avatar' => $fileName];
		Employee::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Employee::find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request) {
		$fileName = '';
		$emp = Employee::find($request->emp_id);
		if ($request->hasFile('avatar')) {
			$file = $request->file('avatar');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($emp->avatar) {
				Storage::delete('public/images/' . $emp->avatar);
			}
		} else {
			$fileName = $request->emp_avatar;
		}

		$empData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'avatar' => $fileName];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$emp = Employee::find($id);
		if (Storage::delete('public/images/' . $emp->avatar)) {
			Employee::destroy($id);
		}
	}
}