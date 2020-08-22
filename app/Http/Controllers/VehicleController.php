<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Owner;
use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $brands = Brand::with('vehicles')->get()->sortByDesc(fn($v) => $v->vehicles->count());

        return view('vehicles.index', compact('brands'));
    }

    public function create()
    {
        $owners = Owner::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('vehicles.create', compact('owners', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'owner_id' => 'required|exists:owners,id',
            'year' => 'required|integer',
            'plate' => 'required',
        ]);

        Vehicle::create($request->except('_token'));

        return redirect()->route('home')->with([
            'status' => 'success',
            'message' => 'Se creó el registro.'
        ]);
    }
}
