<?php

namespace App\Http\Controllers\Designation;

use App\Http\Controllers\Controller;

use App\Models\Designation as Designation;


class DesignationController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $designations = Designation::get();
        return view('designation.index', compact('designations'));
    }

}
