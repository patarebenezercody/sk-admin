<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Sktm;
use App\Sktmselesai;
use Alert;

class SktmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sktm');
    }


    public function store(Request $request)
    {
        $data=
        [
            'name' => $request['name'],
            'nokk' => $request['nokk'], 
            'nohp' => $request['nohp'] 
        ];
        return Sktm::create($data);
    }

 
    public function destroy($id)
    {
        $sktm = Sktm::findOrFail($id);

        $data = [
          'name' => $sktm->name,
          'nohp' => $sktm->nohp,
          'nokk' => $sktm->nokk,
       ];

       Sktmselesai::create($data);

       $sktm->destroy($id);
    }

    public function apiSktm()
    {
        $sktm = Sktm::all();
        return DataTables::of($sktm)
        ->addColumn('action', function($sktm){
            return //'<a onclick = "editForm('. $contact->id.')"class="btn btn-warning"></i>Edit</a>'.
        '<a onclick = "deleteSktm('. $sktm->id.')"class="btn btn-danger"></i>Proses</a>';
        })->make(true);
    }

    
   
}
