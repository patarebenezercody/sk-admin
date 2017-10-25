<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Skdu;
use App\Skduselesai;

class SkduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skdu');
        //
    }

    public function store(Request $request)
    {
        $data=[

            'name' => $request['name'],
            'nokk' => $request['nokk'], 
            'nohp' => $request['nohp'] 
        ];
        return Skdu::create($data);
    }

    
    public function destroy($id)
    {
        // Skdu::destroy($id);
       $skdu = Skdu::findOrFail($id);

       $data = [
          'name' => $skdu->name,
          'nohp' => $skdu->nohp,
          'nokk' => $skdu->nokk,
       ];

       Skduselesai::create($data);

       $skdu->destroy($id);
        
    }

    public function apiSkdu()
    {
        $skdu = Skdu::all();
        return DataTables::of($skdu)
        ->addColumn('action', function($skdu){
            return '<a onclick = "deleteSkdu('. $skdu->id .')" class="btn btn-warning"></i>Proses</a>';
        })->make(true);
    }
}
