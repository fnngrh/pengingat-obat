<?php

namespace App\Http\Controllers;
use App\Pasien;
use App\Obat;
use App\BentukObat;
use App\InteraksiObat;
use App\KontraindikasiObat;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $resepbaru=DB::table('resep')->whereDate('created_at',DB::raw('CURDATE()'))->count();
        $pasienbaru=DB::table('pasien')->whereDate('created_at',DB::raw('CURDATE()'))->count();
        $jumlahobat=Obat::count();
        $jumlahpasien=Pasien::count();
        return view('app.dashboard',compact('pasienbaru','resepbaru','jumlahobat','jumlahpasien'));
    }
    
    public function tampilanawal ()
    {
        
        return view('app.welcome');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
