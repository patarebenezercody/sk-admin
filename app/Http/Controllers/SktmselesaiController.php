<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Sktm;
use App\Sktmselesai;

class SktmselesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sktmselesai');
        
    }

    // Show datatable
    public function sktmselesai()
    {
        $sktm = Sktmselesai::all();
        return DataTables::of($sktm)
        ->addColumn('action', function($sktm){
        })->make(true);
    }
}
