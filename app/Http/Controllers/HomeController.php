<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $searchTerm = $request->get('search');

        $vehicles = Vehicle::query();

        if($searchTerm) {
            $vehicles = $vehicles->where('plate', 'like', "%{$searchTerm}%")
                         ->orWhereHas('brand', fn($q) => $q->where('name', 'like', "%{$searchTerm}%"))
                         ->orWhereHas('owner', fn($q) => $q->where('name', 'like', "%{$searchTerm}%"))
                         ->orWhereHas('owner', fn($q) => $q->where('identification', 'like', "%{$searchTerm}%"));
        }

        $vehicles = $vehicles->paginate(10);

        return view('home', compact('vehicles'));
    }
}
