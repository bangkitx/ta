<?php

namespace App\Http\Controllers;

//use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   public function index()
    {
        //$barangs = Barang::paginate(20);
        //return view('dashboard', ['baranglist' => $barangs ]);

        $barangs = DB::table ('barangs')
        ->get();
        return view('dashboard', ['baranglist' => $barangs ]);
    }
}

