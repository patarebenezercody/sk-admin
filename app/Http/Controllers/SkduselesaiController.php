<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Skdu;
use App\Skduselesai;

class SkduselesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skduselesai');
    }

    // Show datatable
    public function skduselesai()
    {
        $skdu = Skduselesai::all();
        return DataTables::of($skdu)
        ->addColumn('action', function($skdu){
            // return '<a onclick = "deleteSkdu('. $skdu->id .')" class="btn btn-warning"></i>Proses</a>';
        })->make(true);
    }
}
