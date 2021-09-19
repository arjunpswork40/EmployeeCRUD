<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;

use App\Models\Employee as Employee;
use App\Models\Designation as Designation;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;


use Illuminate\Support\Facades\Mail;
use App\Mail\AddedAsEmployee;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Toastr;

use Illuminate\Support\Facades\Response;

class EmployeeController extends Controller
{

    public function __construct()
    {
    }

    public function index(Request $request, Employee $employee)
    {
        
        if ($request->has('name')) {
            $employee = $employee->where(function ($query) use($request) {
                $query->where('name', 'LIKE', '%'.$request->name.'%');
            });
        }
        if ($request->has('email')) {
            $employee = $employee->where(function ($query) use($request) {
                $query->where('email', 'LIKE', '%'.$request->email.'%');
            });
        }
        if ($request->has('designation_id')) {
            $employee = $employee->where(function ($query) use($request) {
                $query->where('designation_id', $request->designation_id);
            });
        }

        $employees = $employee->orderBy('created_at', 'desc')->get();
        $designations = Designation::get();
        return view('employee.index', compact('employees', 'designations'));
    }

    public function create()
    {
        $designations = Designation::get();
        return view('employee.create', compact('designations'));
    }

    public function store (EmployeeStoreRequest $request)
    {
        $imageName = null;
        if(! is_null($request->photo)){
            $imageName = time().'.'.$request->photo->extension();  
     
            $request->photo->move(public_path('photos'), $imageName);
        }
        
        $password = Str::random(12);

        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'designation_id' => $request->designation_id,
            'photo' => $imageName,
            'password' => Hash::make($password),
        ]);
        Mail::to($request->email)->send(new AddedAsEmployee([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]));

        Toastr::success('Employee added successfully');
        return redirect()->route('employee.index');

    }

    public function edit(Employee $employee)
    {
        $designations = Designation::get();
        return view('employee.edit', compact('designations', 'employee'));
    }

    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $imageName = null;
        if(! is_null($request->photo)){
            $imageName = time().'.'.$request->photo->extension();  
     
            $request->photo->move(public_path('photos'), $imageName);
        }
        

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'designation_id' => $request->designation_id,
            'photo' => $imageName,
        ]);

        Toastr::success('Employee updated successfully');
        return redirect()->route('employee.index');
    }

    public function destroy(Employee $employee) 
    {
        $employee->delete();

        return Response::json(['success' => 'Employee deleted successfully']);
    }
}
