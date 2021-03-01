<?php

namespace App\Http\Controllers;
use App\EfekSampingObat;
use Illuminate\Http\Request;

class EfekSampingObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = EfekSampingObat::all();
        return $data; 
    }

    public function index()
    {
        return view('efek_samping_obat.index');
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
        $request->validate([
            'nama_efek_samping' => 'required',
        ]);

        EfekSampingObat::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_efek_samping' => 'required',
        ]);

        return EfekSampingObat::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return EfekSampingObat::find($id)->delete();
    }
}
